<?php

$categorie = $result["data"]['categorie'];
$sujets = $result["data"]['sujets'];
?>

<h1>La liste des sujet de la catégore <?=$categorie->getCategorie()?></h1>

<?php foreach ($sujets as $sujet) { ?>
    <h2><?= $sujet->getTitre() ?></h2>
    <p>créé le : <?= $sujet->getDateCreation() ?></p>

    <!-- <?php  var_dump($sujet->getDateCreation());?> -->
    

<?php } ?>
