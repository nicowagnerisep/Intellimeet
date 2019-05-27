<?php

require "model/model.php";



function gotoconnexion(){
    require "views/connexion.php";
}



function gotocreatecapteur(){
    require "views/createcapteur.php";
}
            //createcapteur.php?c={$namesa}

function gotocreateroom(){
    require "views/createroom.php";
}

function gotodeconnexion(){
    require "views/deconnexion.php";
}

function gotoeditionprofil(){
    require "views/editionprofil.php";
}

function gotoformulairedecontact(){
    require "views/formulaire_de_contact.php";
}

function gotoinscription(){
    require "views/inscription.php";
}

function gotointellimeet(){
    require "views/intellimeet.php";
}

function gotolegal(){
    require "views/legal.php";
}

function gotolistesallesoff(){
    
    require "views/listesallesoff.php";
}
            //header('Location: listesallesoff.php?id='.$_SESSION['id']); ->isset retoursch

function gotoprofil(){
    require "views/profil.php";
}
            //header("Location: profil.php?id=".$_SESSION['id']);

function gotosalleN(){
    $_GET['action']="salle_1";
    require "views/salleN.php";
}
            //salleN.php?c={$donneeh['nomsalle']} ->listesallesoff
            //header('Location: salleN.php?c='.$namesa); ->salleN & createcapteur

function gotoscratch(){
require "views/scratch.php";
}




////////////////\\\\\\\\\\\\\\\\\\\\\\\\///////////////////\\\\\\\\\\\\\\\\\////\\//\//\/\/\\\//\//\\\\//\\\\/\/\/

/*
function goTochangemdp() {
	require "views/changemenytMDP.php";
}

function goToprefCookies() {
	require "views/prefCookies.php";
}

function goToprefNotifications() {
	require "views/prefNotifications.php";
}

function goToaccueil() {
	require "views/accueil.php";
}

function goTorecupmdp() {
	require "views/MdpOublie.php";
}

function goTologin() {
	require "views/login2.php";
}

function goToinscription() {
	require "views/inscription.php";
}

function goToSAV(){
    $data = getSAV();
    require "views/sav.php";
}

function goToSAVDetails($num){
    $data = getSAVDetails($num);
    require "views/savDetails.php";
}

function goToroomView(){
    require "views/room-view.php";
}

function seeUsersList() {
    $data = getUsers();
    require "views/users.php";
}

function goToContact() {
    require "views/contact.php";
}

function goToFAQBoitier() {
    $data = getFAQBoitier();
    require "views/faq.php";
}

function goToFAQCompte() {
    $data = getFAQCompte();
    require "views/faq.php";
}

function goToFAQSite() {
    $data = getFAQCompte();
    require "views/faq.php";

}


function logoutUser(){
    session_start();
    $_SESSION = array();

    setcookie("autoLog", "");
    setcookie("login", "");
    setcookie("mdp", "");
    echo "déconnexion";
    session_destroy();
    header("refresh:2;url=index.php?action=goto_login");

}
function addUser(){
	if (($_POST["nom"] && $_POST["prenom"] && $_POST["tel"] && $_POST["email"] && $_POST["mdp"] && $_POST["confirm_mdp"] && $_POST["acceptTerms"]) && ($_POST["mdp"] === $_POST["confirm_mdp"])) {

        $mdp_hache = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $tel = htmlspecialchars($_POST["tel"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = htmlspecialchars($mdp_hache);
        $confirm_mdp = htmlspecialchars($_POST["confirm_mdp"]);

        insertUser($nom, $prenom, $tel, $email, $mdp);

        require "views/add_user_success.php";
    }
    else {
        require "views/add_user_fail.php";
    }
}

function logCookieSet(){
    if(isset($_COOKIE["login"]) && isset($_COOKIE["mdp"]) && isset($_COOKIE["autoLog"])){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

function autoLog(){
    if (($_POST["autoLog"])){
        return TRUE;
    }
    else{
        return FALSE;
    }
}


function loginUser(){
    try{

        if(logCookieSet()==TRUE){
            $resultat = getUserlog($_COOKIE["login"]);
            $Correct = password_verify($_COOKIE["mdp"], $resultat["mot_de_passe"]);
        }


        elseif ($_POST["email"] && $_POST["log_mdp"]) {
            $resultat = getUserlog($_POST["email"]);
            $Correct = password_verify($_POST["log_mdp"], $resultat["mot_de_passe"]);
        }

        else {
            require ('views/noUser.php');
        }

        if (!$resultat){
            echo 'mot de passe ou identifiant incorrect!';
        }
        else{
            if ($Correct) {
                session_start();
                $_SESSION['id'] = $resultat['idUtilisateur'];
                $_SESSION['prenom'] = $resultat['prenom'];
                $_SESSION['email'] = $_POST["email"];
                echo 'Vous êtes connecté !';
                if (autoLog()==TRUE) {
                    setcookie("autoLog", $_POST["autoLog"], time()+60*10, null, null, false, true);
                    setcookie("login", $_POST["email"], time()+60*10, null, null, false, true);
                    setcookie("mdp", $_POST["log_mdp"], time()+60*10, null, null, false, true);
                }
                header("refresh:2;url=index.php?action=goto_accueil");
                //echo $_SESSION['id'];
                //echo $_SESSION['prenom'];
                //echo $_SESSION['email'];

                //echo $_COOKIE["login"];
            }
            else {
                goTologin();
                echo "mot de passe ou identifiant incorrect!";

                //header("refresh:1;url=index.php?action=goto_login");
            }
        }
    }

    catch (Exception $e) {
        echo $e->getMessage();
    }
}




function changeMdp(){
    session_start();
    if($_POST["ancien_mdp"] && $_POST["nouveau_mdp"] === $_POST["confirm_mdp"])

        $resultat = getUserlog($_SESSION["email"]);
    $Correct = password_verify($_POST["ancien_mdp"], $resultat["mot_de_passe"]);

    if($Correct){
        $mdp_hache = password_hash($_POST["nouveau_mdp"], PASSWORD_DEFAULT);
        $nouveau_mdp = htmlspecialchars($mdp_hache);
        replaceMdp($_SESSION["email"],$nouveau_mdp);
        echo "mot de passe changé";
        echo '<br>';
        header("refresh:2;url=index.php?action=goto_accueil");

    }
    else{
        echo "non changé";

    }

}



function addSAV(){
    if(isset($_SESSION['email'])){
        if($_POST["numClient"] && $_POST["typeProbleme"] && $_POST["details"] ){

            $numClient = htmlspecialchars($_POST["numClient"]);
            $typeProbleme = htmlspecialchars($_POST["typeProbleme"]);
            $details = htmlspecialchars($_POST["details"]);
            $email = $_SESSION['email'];

            insertSAV($typeProbleme, $details);

        } else {
            echo "Erreur";
        }

    } else {
        if($_POST["email"] && $_POST["numClient"] && $_POST["typeProbleme"] && $_POST["details"] ){

            $numClient = htmlspecialchars($_POST["numClient"]);
            $typeProbleme = htmlspecialchars($_POST["typeProbleme"]);
            $details = htmlspecialchars($_POST["details"]);
            $email = htmlspecialchars($_POST["email"]);

            insertSAV($typeProbleme, $details);

        } else {
         echo "Erreur";
     }
 }

} */














