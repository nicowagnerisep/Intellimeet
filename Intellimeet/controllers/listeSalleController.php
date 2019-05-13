<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 2019-05-07
 * Time: 20:31
 *
 */

require '../models/dbConnect.php';

$reponse = $bdd->query('SELECT etat FROM salles');
$t = 1;
while ($donnees = $reponse->fetch()) {
    if ($donnees['etat'] == 0) {

        $color = 'green';
        switch ($t) {
            case 1:
                $colors1 = $color;
                $btns1reserver = "Réserver";
                break;
            case 2:
                $colors2 = $color;
                $btns2reserver = "Réserver";
                break;
            case 3:
                $colors3 = $color;
                $btns3reserver = "Réserver";
                break;
            case 4:
                $colors4 = $color;
                $btns4reserver = "Réserver";
                break;
            case 5:
                $colors5 = $color;
                $btns5reserver = "Réserver";
                break;
            case 6:
                $colors6 = $color;
                $btns6reserver = "Réserver";
                break;
            case 7:
                $colors7 = $color;
                $btns7reserver = "Réserver";
                break;
            case 8:
                $colors8 = $color;
                $btns8reserver = "Réserver";
                break;
        }
        $t++;

    } else {

        $color = 'red';
        switch ($t) {
            case 1:
                $colors1 = $color;
                $btns1reserver = "Annuler réservation";
                break;
            case 2:
                $colors2 = $color;
                $btns2reserver = "Annuler réservation";
                break;
            case 3:
                $colors3 = $color;
                $btns3reserver = "Annuler réservation";
                break;
            case 4:
                $colors4 = $color;
                $btns4reserver = "Annuler réservation";
                break;
            case 5:
                $colors5 = $color;
                $btns5reserver = "Annuler réservation";
                break;
            case 6:
                $colors6 = $color;
                $btns6reserver = "Annuler réservation";
                break;
            case 7:
                $colors7 = $color;
                $btns7reserver = "Annuler réservation";
                break;
            case 8:
                $colors8 = $color;
                $btns8reserver = "Annuler réservation";
                break;
        }
        $t++;
    }
}
$reponse->closeCursor();

if (isset($_POST['subs1']) AND $btns1reserver == "Réserver") {

    $msg = "L'état de la salle 1 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '1'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs1']) AND $btns1reserver == "Annuler réservation") {

    $msg = "L'état de la salle 1 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '1'");
    $insertvalsalle->execute(array($valsalle));
} else if (isset($_POST['subs2']) AND $btns2reserver == "Réserver") {

    $msg = "L'état de la salle 2 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '2'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs2']) AND $btns2reserver == "Annuler réservation") {

    $msg = "L'état de la salle 2 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '2'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs3']) AND $btns3reserver == "Réserver") {

    $msg = "L'état de la salle 3 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '3'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs3']) AND $btns3reserver == "Annuler réservation") {

    $msg = "L'état de la salle 3 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '3'");
    $insertvalsalle->execute(array($valsalle));
} else if (isset($_POST['subs4']) AND $btns4reserver == "Réserver") {

    $msg = "L'état de la salle 4 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '4'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs4']) AND $btns4reserver == "Annuler réservation") {

    $msg = "L'état de la salle 4 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '4'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs5']) AND $btns5reserver == "Réserver") {

    $msg = "L'état de la salle 5 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '5'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs5']) AND $btns5reserver == "Annuler réservation") {

    $msg = "L'état de la salle 5 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '5'");
    $insertvalsalle->execute(array($valsalle));
} else if (isset($_POST['subs6']) AND $btns6reserver == "Réserver") {

    $msg = "L'état de la salle 6 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '6'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs6']) AND $btns6reserver == "Annuler réservation") {

    $msg = "L'état de la salle 6 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '6'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs7']) AND $btns7reserver == "Réserver") {

    $msg = "L'état de la salle 7 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '7'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs7']) AND $btns7reserver == "Annuler réservation") {

    $msg = "L'état de la salle 7 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '7'");
    $insertvalsalle->execute(array($valsalle));
} else if (isset($_POST['subs8']) AND $btns8reserver == "Réserver") {

    $msg = "L'état de la salle 8 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "1";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '8'");
    $insertvalsalle->execute(array($valsalle));

} else if (isset($_POST['subs8']) AND $btns8reserver == "Annuler réservation") {

    $msg = "L'état de la salle 8 viens d'être modifié, raffraichissez la page <a href=\"listeSalleController.php\">ici";
    $valsalle = "0";
    $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = 8");
    $insertvalsalle->execute(array($valsalle));

} else {
    echo 'erreur';

}


require '../views/listeSalleView.php';
