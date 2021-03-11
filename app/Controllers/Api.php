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
        $typeSearch = $this->request->getvar('typeSearch');
        $elementSearch = $this->request->getvar('element');
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

         return $this->response->setJSON($searchContact);
         }    
	}
    
    
    /******* Supprime / Suppression multiple / les id en parama **********/
    public function delete()
    {
        
    }
    /************ Modifier - Ajouter ***********/
    public function edit()
    {
        
    }
    /********* Favory param id du contact a supp *********/
    public function favory()
    {
        
    }
    

}
?>


 