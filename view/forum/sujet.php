<?php 


$sujets = $result["data"]["sujets"];
?>

<h1>Les sujerts</h1>

<?php
foreach($sujets as $sujet){
    ?>
    <!-- <p><?=$sujet->getId()?></p> -->
    <p><?=$sujet->getTitre()?></p>
    <?php
}
?>