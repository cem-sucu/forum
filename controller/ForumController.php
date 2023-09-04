<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use App\SecurityController;
    use Model\Entities\Categorie;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategorieManager;
    use Model\Managers\UtilisateurManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/categorie.php",
                "data" => [
                    "sujets" => $sujetManager->findAll(["dateCreation", "DESC"])
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

        //l'affichage ici de la liste des catégories du forum et.
        // j'utilise le $id d'une catégorie en paramètre et j'utilise le CategorieManager pour récupérer les informations de cette catégorie. Ensuite, j'utilise le SujetManager pour récupérer tous les sujets de cette catégorie. Les données de la catégorie et des sujets je les affiche avec VIEW_DIR a la vue listeCategorieSujets.php que je créée dans le dossier view/forum.
        public function listeCategorieSujets($id){
            $categorieManager = new CategorieManager();
            $categorie = $categorieManager->findOneById($id);
            $sujetManager = new SujetManager();
            $sujets = $sujetManager->lesSujetDuneCategorie($id);
            $messageManager = new MessageManager();

            //pour le formulaire d'un ajout de sujet et d'un message 
            if(isset($_POST["submit"])) {

                // JE vérifie si l'utilisateur est connecté et j'associe la variable $utilisateur_id à getUser() donc la personne qui est connécté
                if (Session::getUser()) {
                    var_dump("l'user a bien etait recup félicitation continue comme ca");die;
                    $utilisateur_id = Session::getUser()->getId();
                } else {
                    // si la personne essaie d'écrire un message je le redirige vers la page d'accueil
                    echo "vous devez être connecté pour pouvoir écrire un message";
                    $this->redirectTo('security', 'connexion');
                    exit;
                }
                // ajout de mon nouveau sujet
                if(isset($_POST['titre']) && (!empty($_POST['titre']))){
                    $titre=filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $message=filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $now = new \DateTime();
                    $nowFormat = $now->format("Y-m-d H:i:s");
                
                if($titre && $message &&$utilisateur_id){
                    $addSujet = $sujetManager->add([
                        "titre"=>$titre,
                        "dateCreation"=>$nowFormat,
                        "utilisateur_id"=>$utilisateur_id,
                        "verouiller"=>"0",
                        "categorie_id"=>$id, 
                    ]);
                    $messageManager->add([
                        "texte"=>$message,
                        "dateCreation"=>$nowFormat,
                        "sujet_id"=>$addSujet,
                        "utilisateur_id"=>$utilisateur_id,
                   
                    ]);
                    }
                     //nouvelle méthode de redirection
                    $this->redirectTo("forum", "listeCategorieSujets", $id);
                    
                    //ancienne methode de redirection
                    // header("Location:index.php?ctrl=forum&action=listeCategorieSujets&id=$id");
                    exit;
                };
            };

            return [
                "view" => VIEW_DIR . "forum/listeCategorieSujets.php",//le cheimin
                "data" => [ //le tableau associatif contenant les données
                    "categorie" => $categorie,
                    "sujets" => $sujets,
                ]
            ];
        }


        // j'affiche ici les messages d'un sujet spécifique. je met le  $id d'un sujet en paramètre et j'utilise le SujetManager pour récupérer les informations de ce sujet. Ensuite, j'utilise le MessageManager pour récupérer tous les messages de ce sujet. Les données du sujet et des messages sont transmises à la vue listMessagesSujet.php . 
        public function listMessagesSujet($id){
            $sujetManager = new SujetManager();
            $sujet = $sujetManager->findOneById($id);
            $messageManager = new MessageManager();
            $messages = $messageManager->messagesParSujets($id);

            //pour le formulaire d'ajout d'un message dans un sujet
            if(isset($_POST["submit"])) {

                 // Je vérifie si l'utilisateur est connecté et j'associe la variable $utilisateur_id à getUser() donc la personne qui est connécté
                if (Session::getUser()) {
                    $utilisateur_id = Session::getUser()->getId();
                } else {
                    // si la personne essaie d'écrire un message je le redirige vers la page d'accueil
                    $this->redirectTo('security', 'connexion');
                    exit;
                }

                // ajout de mon nouveau message
                if(isset($_POST["message"]) && (!empty($_POST["message"]))){
                    $message=filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $now= new \DateTime();
                    $nowFormat = $now->format("Y-m-d H:i:s");
                
                if($message && $utilisateur_id){
                    $sujetId = $sujetManager->findOneById($id)->getId();
                    $messageManager->add([
                        "texte"=>$message,
                        "dateCreation"=>$nowFormat,
                        "sujet_id"=>$sujetId,
                        "utilisateur_id"=>$utilisateur_id,
                    ]);
                    };
                    //nouvelle méthode de redirection
                    $this->redirectTo("forum", "listMessagesSujet", $id);

                    //ancienne methode de redirection
                    // header("Location:index.php?ctrl=forum&action=listMessagesSujet&id=$id");
                    exit;
                };
            }

            return [
                "view" => VIEW_DIR."forum/listMessagesSujet.php",
                "data" => [
                    "sujet" => $sujet,
                    "messages" =>$messages,
                ]
                ];
        }        


        
    }
