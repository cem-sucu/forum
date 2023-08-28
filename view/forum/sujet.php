<?php 

$categorie = $result["data"]['categorie'];
$sujets = $result["data"]["sujets"];
?>

<h1>Ajouter nouveau sujet</h1>
<!-- le formulaire pour ajouter un nvo sujet, ne pas oublier de ajouter le id ensuite -->
<form action="index.php?ctrl=forum&action=ajouterSujet&id" method="post">
    <label>Sujet:</label></br>

       <input type="text" name="Titre" id="titre" required></br> <!-- avec required on oblige l'utilisateur a saisir une donné  -->
    <label>le message:</label></br>
        <textarea name="message" id="message" required></textarea></br> <!-- avec required on oblige l'utilisateur a saisir une donné  -->
        <input type="submit" name="submit" value="Ajouter">
</form>


<h1>Les sujerts</h1>

<?php
foreach($sujets as $sujet){
    ?>
    <a href="?ctrl=forum&action=listMessagesSujet&id=<?=$sujet->getId()?>"><?= 
            $sujet->getTitre() ." créé le : ".$sujet->getDateCreation() ?>"
        </a>  
    <!-- <p><?=$sujet->getId()?></p> -->
    <p><?=$sujet->getTitre()?></p>


    <?php


}
?>

