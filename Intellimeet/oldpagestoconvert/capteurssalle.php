<?php

session_start();

require '../models/dbConnect.php';
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 2019-05-07
 * Time: 13:45
 */

$req = $bdd->query('SELECT * FROM capteurs');

while ($capteurs=$req->fetch()){

    echo'<h1>Capteur '.$capteurs.['nom'].' de la salle #'.$capteurs['salle_id'].'</h1>';

}


function addCapteur($db,$nom,$etat,$salle){
    $req=$db->prepare('INSERT INTO db_tp_training(nom,etat,salle_id) VALUES (:nom,:etat,:salle)');

    $req->execute(
        array(
            'nom'=>$nom,
            'etat'=>$etat,
            'salle'=>$salle

        )

    );

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des capteurs</title>

</head>
<body>

<form method="post" action="" >
    <input type="text" name="nom" placeholder="nom du capteur"/>
    <input type="checkbox" name="etat" />
    <input type="text" name="salle" placeholder="id de la salle"/>

    <input type="submit" value="envoyer">
    <?php
    addCapteur($bdd,$_POST['nom'],$_POST['etat'],$_POST['salle']);
    ?>






</form>

</body>
</html>





