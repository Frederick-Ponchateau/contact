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
        // $listContact = $this->contact->orderBy('last_Name','ASC')->orderBy('first_Name','ASC')->paginate(6);
        
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
        if($searchContact){
            $reponse = ['response' => true];
            return $this->response->setJSON($searchContact);
        }
        return $this->response->setJSON($reponse);   
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
        $id = $this->request->getvar('id');
        /*** 2 ***/
        if($id){
        /*** 3 ***/
            $favory = $this->contact->where('id',$id)->first();
            $fav = [ 'reponse' => $favory["favory"]];
            if($fav['reponse'] == 'No')
            {
                // $this->contact->where('id',$id)
                //         ->set()
                //         ->update();
                return $this->response->setJSON($favory["favory"]);
            }
            return $this->response->setJSON($fav);
        }
    }
    

}
?>


 