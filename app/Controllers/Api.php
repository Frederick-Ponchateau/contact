<?php

namespace App\Controllers;

use App\Models\ContactsModel;

class Api extends BaseController
{
	public function index()
	{
        $contact = new ContactsModel();
        $listContact = $contact->orderBy('last_Name','ASC')->orderBy('first_Name','ASC')->paginate(6);
        echo json_encode($listContact);
		
	}
}
