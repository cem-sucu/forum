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
        $utilisateurManager = new UtilisateurManager();

        //si le formulaire est valide est soumis 'submit' pour la vérification
        //voir exercice forum dans teams
        if (isset($_POST['submit'])){
            // on déclare les variable et le filter_input en associant aux bonne valeur du form de register.php
            $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email =filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $motsDePasse = filter_input(INPUT_POST, "motsDePasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $motsDePasseConfirmation =filter_input(INPUT_POST, "motsDePasseConfirmation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role ="ROLE_MEMBER";

            // var_dump("$pseudonyme");
            // var_dump("$email");
            // var_dump("$motsDePasse");
            // var_dump("$motsDePasseConfirmation");
            // var_dump("$role");die;

            // $now = new \DateTime();
            // $nowFormat = $now->format("Y-m-d H:i:s");

            // je vérifie si les champs requis (pseudonyme, email, mots de passe) ont été remplis
            if($pseudonyme && $email && $motsDePasse) {
                $utilisateurManager = new UtilisateurManager();
                // Si l'adresse e-mail nest pas déjà utilisée par un autre utilisateur
                if(!$utilisateurManager->findOneByEmail($email)){
                    // Si le pseudo n'est pas deja utilisé par un autre utilisateur
                    if(!$utilisateurManager->findOneByUser($pseudonyme)){
                         // Si les mots de passe saisis correspondent et sont d'une longueur d'au moins 8 caractères
                        if(($motsDePasse == $motsDePasseConfirmation) and strlen($motsDePasse) >=8){
                            // ici jehache le mot de passe pour stockage sécurisé
                            $motsDePassHash =self::getMotsDePasseHash($motsDePasse);

                            // et j'ajoute un nouvel utilisateur à la BDD avec les informations fournie
                            $utilisateurManager->add([
                                "pseudonyme"=>$pseudonyme,
                                "email"=>$email,
                                // "dateCreation"=>$nowFormat,
                                "motsDePasse"=>$motsDePassHash,
                                "role"=>$role
                            ]);
                            // je le redirige a login une fois la connexion validé
                            $this->redirectTo("security", "login"); // login a faire pour la redirction
                        } else {
                            echo " <p style='background-color:red; color:white;'>Votre mots de passe est trop court, il faut minimun 8 caractèeres !</p>";
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

    public function connexion(){
        //je vcrée une instance de UtilisateurManager pour gérer les opérations liées aux utilisateur
        $utilisateurManager = new UtilisateurManager();

        //je vérifie si le formulaire a été soumis
        if(isset($_POST["submit"])){
            // Récupère et filtre l'email et le mot de passe
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $motsDePasse = filter_input(INPUT_POST, 'motsDePasse', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump("$email");
            // var_dump("$$motsDePasse");die;

            if($email && $motsDePasse){ // si c'est valide je continue
                // var_dump("le mot de passe et le email : c'est validé");

                // je chherche un utilisateur dans la base de données par son adresse e-mail avec la methode findOneByEmail.
                $dbUser= $utilisateurManager->findOneByEmail($email);
                // var_dump($dbUser);die;

                if($dbUser && password_verify($motsDePasse, $dbUser->getMotsDePasse())){
                    // var_dump("mots de passe et email : ok");

                    // Défini lutilisateur en session et en indiquant qu'il est connecté.
                    Session::setUser($dbUser);
                    // echo '<pre>';
                    // var_dump($dbUser);die;
                    // echo '</pre>';

                    // et je le redirige vers la liste des sujets des catégories du forum.
                    $this->redirectTo('security', 'viewProfile');
                }else{
                    // sinon je dirigie vers la page login car mauvais mots de passe
                    $this->redirectTo('security', 'login');
                }
            }
        }
        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }
}


?>