<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class Formulaire extends BaseController
{
    public function index()
    {
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
            "nom"=> "required",
            "prenom"=> "required"
        ];

        if($this->validate($rule))
        {
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