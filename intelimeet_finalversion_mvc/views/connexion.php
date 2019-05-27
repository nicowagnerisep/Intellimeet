<?php
session_start();
require('views/connectbdd.php');



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
   header("Location: index.php?action=goto_profil");
 } else {
   $erreur1="";
 }
} else {
  $erreur2="";
}
}
?>

<html>
<head>
<?php
require ('views/header.php');
?>
</head>

<body>
  <div align="center">
   <h2>Connexion</h2>
   <br /><br />
   <form method="POST" action="">
    <input type="email" name="mailconnect" placeholder="Mail" />
    <input type="password" name="mdpconnect" placeholder="Mot de passe" />
    <br /><br />
    <input type="submit" name="formconnexion"class="retourbouton" value="Se connecter !" />
  </form>
  <?php
  require('views/isset.php');
  ?>
  <br>
  <a href="index.php?action=goto_inscription">Pas encore inscrit ?</a>
</div>
</body>

<?php
require ('views/footer.php');
?>


</html>