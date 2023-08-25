<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\MessageManager;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        public function messagesParSujets($id){
            $sql = "SELECT m.texte, m.dateCreation, m.utilisateur_id
                    FROM message m
                    WHERE m.sujet_id = :id
                    ORDER BY m.dateCreation ASC;";
        }


    }

?>