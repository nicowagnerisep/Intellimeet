<?php


function dbConnect()
{
    try {
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

if(isset($_SESSION['id'])){


//$getid = intval($_GET['id']);
$requser1 = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
//$requser1->execute(array($getid));
$userinfo = $requser1->fetch();
return $userinfo;


}
return $bdd;
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
}

////////////////\\\\\\\\\\\\\\\\\\\\\\\\///////////////////\\\\\\\\\\\\\\\\\////\\//\//\/\/\\\//\//\\\\//\\\\/\/\/
/*
function getUsers()
{
        $db = dbConnect();
        $data = $db->query('SELECT * FROM Utilisateur');

        return $data;

}
function replaceMdp($email, $new_mdp){
    $db=dbConnect();
    $req = $db->prepare("UPDATE Utilisateur SET mot_de_passe = :new_mdp WHERE email = :email");
    $req->bindParam(":new_mdp", $new_mdp);
    $req->bindParam(":email", $email);
    return $req->execute();
}


function insertUser($nom, $prenom, $tel, $email, $mdp){
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO Utilisateur(nom, prenom, mot_de_passe, email, numero_tel) VALUES(:nom, :prenom, :mot_de_passe , :email ,:numero_tel)");

    $req->bindParam(":nom", $nom);
    $req->bindParam(":prenom", $prenom);
    $req->bindParam(":mot_de_passe", $mdp);
    $req->bindParam(":email", $email);
    $req->bindParam(":numero_tel", $tel);


    return $req->execute();
    //$req->closeCursor();
}

function getUserlog($email){
    $db=dbConnect();
    $req = $db->prepare("SELECT idUtilisateur, prenom, mot_de_passe FROM Utilisateur WHERE email = :email");
    $req->bindParam(":email", $email);
    $req->execute();
    $resultat = $req->fetch();
    return $resultat;

}

function getFAQCompte(){
    $db=dbConnect();
    $data = $db->query("SELECT TitreFAQ, ContenuFAQ FROM faq WHERE typeFAQ = 'Compte'");
    return $data;
}

function getFAQBoitier(){
    $db=dbConnect();
    $data = $db->query("SELECT TitreFAQ, ContenuFAQ FROM faq WHERE typeFAQ = 'Boitier'");
    return $data;
}

function getFAQSite(){
    $db=dbConnect();
    $data = $db->query("SELECT TitreFAQ, ContenuFAQ FROM faq WHERE typeFAQ = 'Site'");
    return $data;
}

function getSAV(){
    $db=dbConnect();
    $data = $db->query("SELECT DateSAV, TypeProbleme, NumeroTicket, Resolution FROM sav");
    return $data;
}

function getSAVDetails($numero){
    $db=dbConnect();
    $data = $db->query("SELECT DateSAV, TypeProbleme, Resolution, Details FROM sav WHERE NumeroTicket = $numero ");
    return $data;
}

function insertSAV($TypeProbleme, $Details){
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO sav(DateSAV, TypeProbleme, NumeroTicket, Resolution, Details) VALUES(:DateSAV, :TypeProbleme, :NumeroTicket, :Resolution, :Details)");
    $date = date("d/m/Y");
    $Resolution = 0;
    $numeroTicket = date("dmYhi");
    $req->bindParam(":DateSAV",$date);
    $req->bindParam(":TypeProbleme",$TypeProbleme);
    $req->bindParam(":NumeroTicket",$NumeroTicket);
    $req->bindParam(":Details",$Details);
    $req->bindParam(":Resolution",$Resolution);

    return $req->execute();
}

function resoudreSAV($numero){
    $req = $db->prepare("UPDATE sav SET Resolution = :etat WHERE NumeroTicket = :numero");
    $req->bindParam(":etat", 1);
    $req->bindParam(":numero", $numero);

    return $req->execute();
}

?>*/
