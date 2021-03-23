<?php

namespace App\Controllers;
use App\Models\ContactsModel;

class BaseDeDonner extends BaseController
{
    public $contact = null;
    public function __construct()
    {
        $this->contact = new ContactsModel();

    }
    public function index()
    {
       
        $data= [
            'listeContact'=>$this->contact->orderBy("id",'DESC')->paginate(10)
        ];

            echo view('bdd',$data);
    }
    public function delete($id=null)
    {
        if($id){
            $this->contact->where("id",$id)->delete();
        }

    }
}

?>