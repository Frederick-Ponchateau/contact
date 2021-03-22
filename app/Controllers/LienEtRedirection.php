<?php
namespace App\Controllers;

use App\Models\ContactsModel;

class LienEtRedirection extends BaseController
{
    public function index($page=null)
    {
        switch($page)
        {
            case "accueil" : 
               return redirect()->to("/LienEtRedirection/accueil");
            break;
            case "boutique" : 
                return redirect()->to("/LienEtRedirection/boutique");
             break;
             default:
             echo "index";
        }
        
       
    }
    public function accueil()
    {
        echo "Je suis dans l'Accueil";
        echo "<a href=".base_url("LienEtRedirection/boutique").">Boutique</a>";

    }
    public function boutique()
    {
        echo "Je suis dans la boutique";
        echo "<a href=".base_url("LienEtRedirection/accueil").">Accueil</a>";
        

    }
}