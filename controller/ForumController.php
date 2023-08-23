<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategorieManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/sujet.php",
                "data" => [
                    "sujets" => $sujetManager->findAll(["date_creation", "DESC"])
                ]
            ];
        
        }

        public function Categories(){
            $categorieManager = new CategorieManager();
            // en ajoutant $categorie on peut faire la mem chose avec une deuxieme methode
            $categories = $categorieManager->findAll(["categorie", "ASC"]);
            return [
                "view" => VIEW_DIR . "forum/categorie.php",
                "data" => [
                    // "categories" => $categorieManager->findAll(["categorie", "ASC"])
                    "categories" => $categories
                ]
                ];
            }

        

    }
