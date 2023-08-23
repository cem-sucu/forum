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

        public function lesSujetDuneCategorie($categorie_id) {
            $sql = "SELECT s.*, c.categorie 
                    FROM sujet s 
                    INNER JOIN categorie c ON s.id_categorie = c.id_categorie
                    WHERE s.id_categorie = :categorie_id
                    ORDER BY s.date_creation DESC";
            $params = [":categorie_id" => $categorie_id];
        
            return $this->getMultipleResults(
                DAO::select($sql,  ["id"=>$categorie_id]), 
                $this->className);
        }
    }

?>