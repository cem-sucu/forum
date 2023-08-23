<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/listSujet.php",
                "data" => [
                    "sujets" => $sujetManager->findAll(["date_creation", "DESC"])
                ]
            ];
        
        }

        public function listCategories(){
            $categorieManager = new CategorieManager();
            return [
                "view" => VIEW_DIR . "forum/Categorie.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["categorie", "ASC"])
                ]
                ];
        }

        

    }
