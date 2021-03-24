<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class Api extends BaseController
{
    public $contact = null;
    public function __construct(){
        $this->contact = new ContactsModel();
    }
    /*********** List , modify and add  */    
	public function index()
	{
        /************** Recupere les données en Post ********************/
        $typeSearch = $this->request->getvar('typeSearch');
        $elementSearch = $this->request->getvar('element');
        $reponse = ['response' => false];
     $listContact = $this->contact->orderBy('last_Name','ASC')->orderBy('first_Name','ASC')->paginate(10);
        
         if(!empty($typeSearch) && !empty($elementSearch)){
		// 	//dd($this->request->getvar('search'));
		 	switch($typeSearch){
				
		 		case "recherche" :
					$searchContact = $this->contact
					->like('last_Name',$elementSearch,'both',null,true)
					->orlike('first_name',$elementSearch,'both',null,true)
					->orderBy('last_Name','ASC')
                    ->orderBy('first_Name','ASC')
                    ->paginate(6);
                    
		 			break;

		 		default;

            }    
        } 
        if(isset($searchContact)){
            $reponse = ['response' => true];
            return $this->response->setJSON($searchContact);
        }
        return $this->response->setJSON($listContact);   
	}
    
    
    /******* Supprime / Suppression multiple / les id en parama **********/
    public function delete()
    {
        /************* 1-Je recupere l'id du contact  supprimé
         * *********** 2-Si il existe je passe au 3
         * ************ 3-Je fais ma requette pour supp
         *************** 4-l'etat de la suppression 
         ******************************************************/
        /*** 1 ***/
        $idContact = $this->request->getvar('id');
        $delete = ['response' => false];
        /*** 2 ***/
        if($idContact){
        /*** 3 ***/
        $this->contact->where('id', $idContact)->delete();
        /*** 4 ***/
        $delete = ['response' => true];
        }
        return $this->response->setJSON($delete);
    }
    /************ Modifier - Ajouter ***********/
    public function edit()
    {
         /***************************************************************************
        ****** 1- je recupere l'id **********
         ****** 2- je verifie si la saisie exisite si oui si non msg erreur ******
         ****** 3- Je je fait ma requete pour modifie ********
         ******   *********
        ****************************************************************************/
        /*** 1 ***/
        $etatAction = [
            "reponses" => false 
        ];
        $rules = [
            'id'          => 'required',
            'name'          => 'required|min_length[3]|max_length[20]',
            'phone'         => 'required|min_length[3]|max_length[20]'
            
        ];
        
        /*** 2 ***/
        if($this->validate($rules)){
            $id = $this->request->getvar("id");
            
            $data = [
                'first_Name'     => $this->request->getvar("name"),

                'phone'    => $this->request->getvar("phone")
                
            ];
            
            
            $contactID = $this->contact->where("id",$id)->first();
            
            if($this->request->getvar("email")!= ''){
                $data["email"] = 
                    $this->request->getvar("email");
            }
            
            /********Je vérifie l'existance en base de l'id de ma saisie*****************/
            if($contactID){
                

                    $this->contact->where("id",$id)
                                    ->set($data)
                                    ->update();
    
                                    $etatAction = [
                                        "reponse"=>true,
                                        "action" => "l'utisateur a été modifié"
                                    ];
                

            }else{/********* Si elle existe pas en base msg d'erreur ****************/
                $etatAction["error"]["id"]["msg"]= "Id is no avialible";
                $etatAction["error"]["id"]["system"] = false;
            } 

        }else{/********* Si il y a pas de saisie dans mes champs msg d'erreur ****************/
            if(empty($contactID["id"])){
                
                $etatAction["error"]["id"]["msg"]= "No id";
                $etatAction["error"]["id"]["system"] = false;
            }
            if(empty($this->request->getvar("name"))){
                $etatAction["error"]["name"]["msg"]= "No name";
                $etatAction["error"]["name"]["system"] = false;
            }
                if(empty($this->request->getvar("phone"))){
                $etatAction["error"]["phone"]["msg"]= "No phone";
                $etatAction["error"]["phone"]["system"] = false;
            }
        }    
        return $this->response->setJSON($etatAction);

           
    }
    /********* Favory param id du contact a supp *********/
    public function favory()
    {
        /***************************************************************************
        ****** 1- je recupere l'id **********
         ****** 2- je verifie si il exisite si oui ******
         ****** 3- Je je fait ma requete pour verifier si il est favory et je modifie ********
         ****** 4- j'affiche si oui et je modifie  pareil pour non  *********
        ****************************************************************************/
        /*** 1 ***/
        $id = $this->request->getvar("id");
        /*** 2 ***/
        if(isset($id)){
        /*** 3 ***/
            $contactID = $this->contact->where("id",$id)->first();
            
            if($contactID){
           
                /*** 4 ***/
                    if($contactID["favory"] == "Yes" || $contactID["favory"] == null )
                    {   
                        
                         $this->contact->where("id",$id)
                                ->set("favory" , "No")
                                ->update();
                                return $this->response->setJSON(["reponse"=>true]);
                    }//END test favory = yes
                    if($contactID["favory"] == "No")
                    {    
                       
                        $this->contact->where("id",$id)
                                ->set("favory", "Yes")
                                ->update();
                                return $this->response->setJSON(['reponse'=>true]);
                    }//END test favory = no
                    return $this->response->setJSON(['reponse'=>false]);
            }
        }
    }
            /**********************************************
             * ************  La fonction doit créee un nouveau contact
             * ************ 1- elle reçoit les informations en post : le nom (type string) ,prenom(type string) ,image (type image),
             * ************ company (type number), le job(type string), email(type email), telephone(type number numero valide) ,notes(type string)
             * ************ 2- on retourne que le contact a été crée par true 
             * ************ on doit dire pourquoi la tache a echoué  
             * ************ deux champs obligatoire nom et numéros de téléphone
             */
    public function create()
    {
        $etatAction = [
            "reponses" => false 
        ];
        $name = $this->request->getvar("name");
        $last_name = $this->request->getvar("prenom");
        $phone = $this->request->getvar("phone");
        
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'prenom'        => 'required|min_length[3]|max_length[20]',
            //'phone'         => 'required|min_length[3]|max_length[20]'
            
        ];
        if($this->validate($rules)){
            $data = [
                'first_Name'     => $name,
                'last_Name'   => $last_name,
                'phone'    => $phone
                
            ];
            $this->contact->save($data);
            $etatAction= ['responses' => true ] ;
            
            $this->response->setJSON(['name' => $name , 'phone' => $phone]);
                   
            
        }else{
            if(empty($name)){
                $etatAction["error"]["name"]["msg"]= "No name";
                $etatAction["error"]["name"]["system"] = false;
            }
                if(empty($phone)){
                $etatAction["error"]["phone"]["msg"]= "No phone";
                $etatAction["error"]["phone"]["system"] = false;
            }
        }
        return $this->response->setJSON($etatAction);


    }
    

}
?>


 