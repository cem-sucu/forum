<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\SujetManager;

    class SujetManager extends Manager{

        protected $className = "Model\Entities\Sujet";
        protected $tableName = "sujet";


        public function __construct(){
            parent::connect();
        }

        // la requete SQL pour selectionner en fonction du ID le ou les sujet d'une catégorie
        public function lesSujetDuneCategorie($id) {
            $sql = "SELECT s.titre, s.dateCreation, s.utilisateur_id, s.id_sujet
                    FROM sujet s
                    WHERE s.categorie_id = :id
                    ORDER BY s.dateCreation ASC;";
        
            return $this->getMultipleResults(
                DAO::select($sql,  ["id"=>$id]), 
                $this->className);
        }


        // la requete SQL pour ajouter des sujet
        public function ajouterSujet(){
            $sql = "INSERT INTO sujet (titre, categorie_id, utilisateur_id) 
                    VALUES ('un sujet crée', '1','1');";

            return $this->insert(
                DAO::select($sql),
                $this->className
            );
        }
    };

?>