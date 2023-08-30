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
class SecurityController extends AbstractController implements ControllerInterface{
    public function inscription(){
        // je creer une insatnce de la classe UtilisateurManager
        $UtilisateurManager = new UtilisateurManager();

        //si le formulaire est valide est soumis 'submit' pour la vérification
        //voir exercice forum dans teams
        if (isset($_POST['submit'])){
            // on déclare les variable et le filter_input en associant aux bonne valeur du form de register.php
            $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email =filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $motsDePasse = filter_input(INPUT_POST, "motsDePasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $motsDePasseConfirmation =filter_input(INPUT_POST, "motsDePasseConfirmation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role ="ROLE_MEMBER";
            // $now = new \DateTime();
            // $nowFormat = $now->format("Y-m-d H:i:s");

            if($pseudonyme && $email && $motsDePasse) {
                $UtilisateurManager = new UtilisateurManager();
                if(!$UtilisateurManager->findOneByEmail($email)){
                    if(!$UtilisateurManager->findOneByUser($pseudonyme)){
                        if(($motsDePasse == $motsDePasseConfirmation) and strlen($motsDePasse) >=8){
                            $motsDePassHash =self::getMotsDePasseHash($motsDePasse);
                            $UtilisateurManager->add([
                                "pseudonyme"=>$pseudonyme,
                                "email"=>$email,
                                // "dateCreation"=>$nowFormat,
                                "motsDePasse"=>$motsDePassHash,
                                "role"=>$role
                            ]);
                            $this->redirectTo("security", "login"); // login a faire pour la redirction
                        }
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR . "security/register.php",
            "data" => [ ]
        ];
    }
    private static function getMotsDePasseHash($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
}


?>