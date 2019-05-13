<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 2019-05-07
 * Time: 19:48
 */

require '../models/dbConnect.php';

try{
    if(isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
        $pseudolength = strlen($pseudo);

        if($pseudolength <= 255) {
            $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
            $reqpseudo->execute(array($pseudo));
            $pseudoexist = $reqpseudo->rowCount();

            if($pseudoexist == 0) {

                if($mail == $mail2) {

                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                        $reqmail->execute(array($mail));
                        $mailexist = $reqmail->rowCount();

                        if($mailexist == 0) {

                            if($mdp == $mdp2) {
                                $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                                $insertmbr->execute(array($pseudo, $mail, $mdp));
                                $erreur = "Votre compte a bien été créé ! <a href=\"loginController.php\">Me connecter</a>";

                            } else {
                                $erreur = "Vos mots de passes ne correspondent pas !";
                            }

                        } else {
                            $erreur = "Adresse mail déjà utilisée !";
                        }

                    } else {
                        $erreur = "Votre adresse mail n'est pas valide !";
                    }

                } else {
                    $erreur = "Vos adresses mail ne correspondent pas !";
                }
            }else{
                $erreur = "Pseudo déja utilisé !";
            }

        } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }

    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


require '../views/signupView.php';
