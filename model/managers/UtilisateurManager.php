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
            FROM utilisateur u
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
            FROM  utilisateur u
            WHERE pseudonyme = :pseudonyme";

            return $this->getOneorNullResult(
                DAO::select($sql, ['pseudonyme ' => $pseudonyme], false),
                $this->className
            );
        }

        public function connexion(){
            $UtilisateurManager = new UtilisateurManager();

            if(isset($_POST["submit"])){
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $motsDePasse = filter_input(INPUT_POST, 'motsDePasse', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($email && $motsDePasse){
                    $dbUser= $UtilisateurManager->findOneByEmail($email);

                    if($dbUser && password_verify($motsDePasse, $dbUser->getMotsDePasse())){
                        Session::setUser($dbUser);
                        $this->redirectTo('forum', 'listCategorieSujets');
                    }else{
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