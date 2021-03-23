<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class Formulaire extends BaseController
{
    public function index()
    {
        $this->contact = new ContactsModel();
      // echo $this->request->getvar("email");
        // $rule = 
        // [
        //     "email"=> "required"
        // ];
        // if($this->validate($rule))
        // {
        //     echo "email is ok";
        // }else{

            
        // }
        // $data = 
        // [
        //     "validation"=> $this->validator
        // ];
        
        $rule = 
        [
            "nom"=> "required|min_length[3]|max_length[20]",
            "prenom"=> "required|min_length[3]|max_length[20]",
            "email"=> 'required|min_length[6]|max_length[50]|valid_email|is_unique[contacts.email]'
        ];

        if($this->validate($rule))
        {
            $dataSave = [
                'last_Name' => $this->request->getvar("nom"),
                'first_Name' => $this->request->getvar("prenom"),
                'email' =>$this->request->getvar("email")
            ];
            $this->contact->save($dataSave);

            echo " ok";
        }

        
        
        $data = 
                [
                    "validation"=> $this->validator,
                    "request"=>$this->request
                ];

        echo view("/formulaire", $data);


    }
}