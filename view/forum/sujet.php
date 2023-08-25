<?php 


$sujets = $result["data"]["sujets"];
?>

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