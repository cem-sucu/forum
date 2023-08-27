<?php

$categories = $result["data"]['categories']; //-> Cela récupère le tableau de categories à partir des données passées à la vue et le stocke dans la variable $categories.
    
?>

<h1>liste des catégories</h1>

<?php
foreach($categories as $categorie ){ // ici je parcour chaque element dans le tableau $categories

    ?>
    <!-- <p><?=$categorie->getId()?></p> pour le id-->
    <p><li><?=$categorie->getCategorie()?></li></p>
    <a href="?ctrl=forum&action=listeCategorieSujets&id=<?=$categorie->getId()?>">Voir les sujets</a>

    <?php
}


  
