<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste des catégories</h1>

<?php
foreach($categories as $categorie ){

    ?>
    <p><?=$categorie->getId()?></p>
    <p><?=$categorie->getCategorie()?></p>
    <?php
}


  
