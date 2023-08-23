<?php

    $sujets = $result["data"]['sujets'];
    $categorie = $result["data"]['categorie']

?>

<h1>La liste des sujet de la catégore <?=$categorie->getCategorie()?></h1>

<?php foreach ($sujets as $sujet) { ?>
    <h2><?= $sujet->getTitre() ?></h2>
    <p>créé le : <?= $sujet->getDate_creation() ?></p>
<?php } ?>
