<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\MessageManager;
    use Model\Managers\SujetManager;
    use Model\Managers\CategorieManager;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        // la requete SQL pour trouver, récupérer les message par sujet par le :id
        public function messagesParSujets($id){
            $sql = "SELECT m.texte, m.dateCreation, m.utilisateur_id
                    FROM message m
                    WHERE m.sujet_id = :id
                    ORDER BY m.dateCreation ASC;";

        return $this->getMultipleResults( // pour renvoyer plusieur resultat
            DAO::select($sql, ["id"=>$id]),
            $this->className);
        }

        // la requete pour ajouter des message
        // INSERT INTO message (texte, sujet_id, utilisateur_id) 
        // VALUES ('cest quoi un tacos ??', '13','1');

        public function ajouterMessage(){
            $sql = "INSERT INTO message (texte, sujet_id, utilisateur_id) 
                    VALUES ('cest quoi un tacos ??', '13','1')";
            
            return $this->insert(
                DAO::select($sql),
                $this->classNAme
            );
        }


    };

?>