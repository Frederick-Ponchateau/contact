<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class DBJquery extends BaseController
{
    public $contact = null;
    public function __construct()
    {
        $this->contact = new ContactsModel();

    }
    public function index(){

        $data= [
            'listeContact'=>$this->contact->orderBy("id",'DESC')->paginate(10)
        ];
        echo view('common/HeaderSite');
		echo view('/dbJquery', $data);
		echo view('common/FooterSite');
    }


}