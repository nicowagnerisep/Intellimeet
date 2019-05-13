<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 2019-05-07
 * Time: 19:42
 */
require '../models/dbConnect.php';


if(isset($_POST['formconnexion'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect)) {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profil.php?id=".$_SESSION['id']);
        } else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

require '../views/loginView.html';
