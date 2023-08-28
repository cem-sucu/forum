<?php

$categorie = $result["data"]['categorie'];
$sujets = $result["data"]['sujets'];
?>

<h1>La liste des sujet de la catégore <?=$categorie->getCategorie()?></h1>

<?php foreach ($sujets as $sujet) { ?>
    <h2>
        <a href="?ctrl=forum&action=listMessagesSujet&id=<?=$sujet->getId()?>"><?= 
            $sujet->getTitre() ." créé le : ".$sujet->getDateCreation() ?>
        </a>    
    </h2>

    <!-- <p>créé le : <?= $sujet->getDateCreation() ?></p> -->
    <!-- <?php  var_dump($sujet->getDateCreation());?> -->
    

<?php } ?>

<h1>Ajouter nouveau sujet</h1>
<!-- le formulaire pour ajouter un nvo sujet, ne pas oublier de ajouter le id ensuite -->
<form action="index.php?ctrl=forum&action=listeCategorieSujets&id=<?=$categorie->getId() ?>" method="post">
    <label>Sujet:</label></br>
       <input type="text" name="titre" id="titre" required></br> <!-- avec required on oblige l'utilisateur a saisir une donné  -->
    <label>le message:</label></br>
        <textarea name="message" id="message" required></textarea></br> <!-- avec required on oblige l'utilisateur a saisir une donné  -->
        <input type="submit" name="submit" value="Ajouter">
</form>
