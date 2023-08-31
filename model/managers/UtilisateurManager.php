<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\UtilisateurManager;

    class UtilisateurManager extends Manager{

        protected $className = "Model\Entities\Utilisateur";
        protected $tableName = "utilisateur";


        public function __construct(){
            parent::connect();
        }

        // methode similaire a manger.php dans app
        public function findOneByEmail($email)
        {
            $sql = "SELECT *
            FROM ".$this->tableName." u
            WHERE email = :email";

            return $this->getOneorNullResult(
                DAO::select($sql, ['email' => $email], false),
                $this->className
            );
        }

        // methode similaire a manger.php dans app
        public function findOneByUser($pseudonyme)
        {
            $sql = "SELECT *
            FROM  ".$this->tableName." u
            WHERE pseudonyme = :pseudonyme";

            return $this->getOneorNullResult(
                DAO::select($sql, ['pseudonyme' => $pseudonyme], false),
                $this->className
            );
        }

        public function connexion(){
            //je vcrée une instance de UtilisateurManager pour gérer les opérations liées aux utilisateur
            $utilisateurManager = new UtilisateurManager();

            //je vérifie si le formulaire a été soumis
            if(isset($_POST["submit"])){
                // Récupère et filtre l'email et le mot de passe
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $motsDePasse = filter_input(INPUT_POST, 'motsDePasse', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($email && $motsDePasse){ // si c'est valide je continue
                    // je chherche un utilisateur dans la base de données par son adresse e-mail avec la methode findOneByEmail.
                    $dbUser= $utilisateurManager->findOneByEmail($email);
                    if($dbUser && password_verify($motsDePasse, $dbUser->getMotsDePasse())){
                        // Défini lutilisateur en session et en indiquant qu'il est connecté.
                        Session::setUser($dbUser);
                        // et je le redirige vers la liste des sujets des catégories du forum.
                        $this->redirectTo('forum', 'listCategorieSujets');
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