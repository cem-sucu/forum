<link rel="stylesheet" href="./public/css/listMessageSujet.css">
<?php
$sujet = $result["data"]["sujet"];
$messages = $result['data']["messages"];
?>

<h1><?=$sujet->getTitre() ?></h1>

<?php
// ici je vérifie le tableau si c'est différent de NUULL je retourne le message trouvé, sinon si c'est NULL alors je renvoie le mssage non trouvé
if ($messages !== null) { 
    foreach($messages as $message){
        // var_dump($message->getId());die;
        ?>
        <div class="messageContenu">
            <h3><?=$message->getUtilisateur()->getPseudonyme() ?></h3>
            <p>message créé :<?=$message->getDateCreation()?></p>
            <!-- <p><?=$message->getId() ?></p> -->
            <p><?=$message->getTexte() ?></p>
            <form action="index.php?ctrl=forum&action=supprimerMessageUtilisateur&id=<?= $message->getId() ?>" method="post">
                <input type="submit" name="submit" value="Supprimer">
            </form>

        </div>
        <?php
    }
} else {
    echo "<p>Aucun message trouvé.</p>";
}

?>

<h1>Ajouter un nouveau message</h1>
<form action="index.php?ctrl=forum&action=listMessagesSujet&id=<?=$sujet->getId() ?>" method="post">
    <label>Message</label><br>
    <textarea name="message" id="message" required></textarea><br>
    <input type="submit" name="submit" value="Ajouter">
</form>