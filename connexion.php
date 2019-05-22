<?php
session_start();

require ('connexionbdd.php');


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
require ('header.php');
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
    <input type="submit" name="formconnexion" value="Se connecter !" />
  </form>
  <?php
  require('isset.php');
  ?>
  <br>
  <a href="inscription.php">Pas encore inscrit ?</a>
</div>
</body>

<?php
require ('footer.php');
?>


</html>