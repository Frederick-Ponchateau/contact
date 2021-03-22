<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class Exercice extends BaseController
{
    public function index($id=null,$nom=null,$age=null,$sexe=null){
        
        //<w²echo $id." - ".$nom." a: ".$age." ans\n ";
        if($age>=18){
            echo "Tu est majeur ";
        }else{
            echo "Tu est mineur ";

        }
        switch($sexe){
            case "homme": 
                echo "Je suis homme ";
            break;
            case "femme" : 
                echo "Je suis une femme ";
            break;
            default:
            echo "non présisé ";
        }
        $data = [
            "id" => $id,
            "nom" => $nom,
            "age" => $age,
            "sexe" => $sexe 
        ];


        echo view("/exercice",$data);
    }

}