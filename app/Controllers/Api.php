<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class Api extends BaseController
{
    /*********** List , modify and add  */    
	public function index()
	{
        $contact = new ContactsModel();
        $listContact = $contact->orderBy('last_Name','ASC')->orderBy('first_Name','ASC')->paginate(6);
        echo json_encode($listContact);
		
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


 