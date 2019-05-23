<?php
if((isset($_GET['id']) AND $_GET['id'] > 0)) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch(); ?>
<div id="login">
<ul>
   <li><a href="?click=1"><?php echo $userinfo['pseudo']; ?></a></li>
</div>
<?php 
} else if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch(); 
   
?> 
<div id="login">
<ul>
   <li><a href="?click=1"> <?php echo $user['pseudo']; ?> </a></li>
   <li><a href="deconnexion.php"> Déconnexion </a></li>
   

  
</div>
<?php 
}else{
?>
<div id="login">

<ul>
  <li><a href="connexion.php">Connexion</a></li>
    <li><a href="inscription.php">Inscription</a></li>
</div>
<?php
}

require('isset.php');

?>