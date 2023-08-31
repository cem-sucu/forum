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
    }

?>