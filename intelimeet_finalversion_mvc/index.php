<?php

define("ROOT",__DIR__ );
require ROOT . "/controller/controller.php";



if (isset($_GET["action"])) {
    $action = htmlspecialchars($_GET["action"]); // Petite fonction de sécurité

    switch ($action) {
        case 'goto_connexion':
            gotoconnexion();
            break;

        case 'goto_createcapteur':
            gotocreatecapteur();
            //createcapteur.php?c={$namesa}
            break;
        case 'goto_createroom':
            gotocreateroom();
            break;

        case 'goto_deconnexion':
            gotodeconnexion();


            break;
        case 'goto_editionprofil':
            gotoeditionprofil();
            break;

        case 'goto_formulaire_de_contact':
            gotoformulairedecontact();
            break;
        case 'goto_inscription':
            gotoinscription();
            break;

        case 'goto_intellimeet':
            gotointellimeet();
            break;
        case 'goto_legal':
            gotolegal();
            break;

        case 'goto_listesallesoff':
            gotolistesallesoff();
            
            break;
        case 'goto_profil':
            gotoprofil();
            
            break;

        case 'goto_salleN':

            gotosalleN();

            
            //header('Location: salleN.php?c='.$namesa); ->salleN & createcapteur
            break;
        case 'goto_scratch':
            gotoscratch();
            break;


////////////////\\\\\\\\\\\\\\\\\\\\\\\\///////////////////\\\\\\\\\\\\\\\\\////\\//\//\/\/\\\//\//\\\\//\\\\/\/\/
        /*
        case 'goto_login':
            goTologin();
            break;

        case 'goto_accueil':
            goToaccueil();
            break;

        case 'goto_change_mdp':
            goTochangemdp();
            break;

        case 'goto_prefCookies':
            goToprefCookies();
            break;

        case 'goto_prefNotifications':
            goToprefNotifications();
            break;

        case 'goto_recupmdp':
            goTorecupmdp();
            break;

        case 'goto_inscription':
            goToinscription();
            break;

        case 'goto_roomView':
            goToroomView();
            break;

        case 'goto_ajoutAppareil':
            goToAjoutAppareil();
            break;

        case 'goto_contact':
            goToContact();
            break;

        case 'goto_sav':
            goToSAV();
            break;

        case 'goto_submitSAV':
            goToSubmitSAV();
            break;

        case'goto_userslist':
            seeUserslist();

        case"add_user":
            addUser();
            break;

        case "login_user":
            loginUser();
            break;

        case "logout_user":
            logoutUser();
            break;
        case "change_mdp":
            changeMdp();
            break;

        case "goto_faqBoitier":
            GoToFAQBoitier();
            break;

        case "goto_faqSite":
            GoToFAQSite();
            break;

        case "goto_faqCompte":
            GoToFAQCompte();
            break;

        case "addProblem":
            addSAV();
            break;*/
////////////////\\\\\\\\\\\\\\\\\\\\\\\\///////////////////\\\\\\\\\\\\\\\\\////\\//\//\/\/\\\//\//\\\\//\\\\/\/\/
       


        default :
            //echo "Erreur 404";
        gotoconnexion();
            break;
    }
   }
   else{/*
    if (logCookieSet()==TRUE) {
        loginUser();
    }
    else{*/
        gotoscratch();
    //}

    }
?>


