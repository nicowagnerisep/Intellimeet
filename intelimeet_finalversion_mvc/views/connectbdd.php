<?php
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