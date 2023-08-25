<?php
$sujet = $result["data"]["sujet"];
$messages = $result['data']["messages"];
?>

<h1><?=$sujet->getTitre() ?></h1>

<?php
// ici je vérifie le tableau si c'est différent de NUULL je retourne le message trouvé, sinon si c'est NULL alors je renvoie le mssage non trouvé
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