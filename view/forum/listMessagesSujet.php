<?php
$sujet = $result["data"]["sujet"];
$messages = $result['data']["messages"];
?>

<h1><?=$sujet->getTitre() ?></h1>

<?php
if ($messages !== null) {
    foreach($messages as $message){
        ?>
        <h3><?=$message->getUtilisateur()->getPseudonyme() ?></h3>
        <p>message créé :<?=$message->getDateCreation() ?></p>
        <p><?=$message->getTexte() ?></p>
        <?php
    }
} else {
    echo "<p>Aucun message trouvé.</p>";
}

?>