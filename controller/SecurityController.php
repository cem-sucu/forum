<?php 
// comme pour forum et Home je vais copier le namespace et les use dont j'aurzis besoin

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Entities\Categorie;
use Model\Managers\SujetManager;
use Model\Managers\MessageManager;
use Model\Managers\CategorieManager;

use Model\Managers\UtilisateurManager;

// pour  gérer les actions associées à la page d'accueil du site
class HomeController extends AbstractController implements ControllerInterface{
    public function inscription(){
        // je creer une insatnce de la classe UtilisateurManager
        $UtilisateurManager = new UtilisateurManager();

        //si le formulaire est valide est soumis 'submit' pour la vérification
        if (isset($_Post['submit'])){
            // on déclare les variable et le filter_input en associant aux bonne valeur du form de register.php
            $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $motsDePasse = filter_input(INPUT_POST, "motsDePasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $motsDePasseConfirmation =filter_input(INPUT_POST, "motsDePasseConfirmation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email =filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $role =filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        }
    }
}


?>