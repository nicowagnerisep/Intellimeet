<?php
session_start();
require "connectbdd.php";



if(isset($_SESSION['id'])) {
 $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 $requser->execute(array($_SESSION['id']));
 $user = $requser->fetch();
 if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      //$pseudo = htmlspecialchars($_POST['newpseudo']);

  $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
  $reqpseudo->execute(array($_POST['newpseudo']));
  $pseudoexist = $reqpseudo->rowCount();
  
  if($pseudoexist == 0) {

    $newpseudo = htmlspecialchars($_POST['newpseudo']);
    $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
    $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
    header('Location: index.php?action=goto_profil');
  }else{
   $msg = "Pseudo déjà utilisée !";

 }
} 


if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {

      //$mail = htmlspecialchars($_POST['newmail']);
  $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
  $reqmail->execute(array($_POST['newmail']));
  $mailexist = $reqmail->rowCount();
  if($mailexist == 0) {

    $newmail = htmlspecialchars($_POST['newmail']);
    $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
    $insertmail->execute(array($newmail, $_SESSION['id']));
    header('Location: index.php?action=goto_profil');
  }else{
    $msg = "Adresse mail déjà utilisée !";

  }
}    

if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
  $mdp1 = sha1($_POST['newmdp1']);
  $mdp2 = sha1($_POST['newmdp2']);
  if($mdp1 == $mdp2) {
   $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
   $insertmdp->execute(array($mdp1, $_SESSION['id']));
   header('Location: index.php?action=profil');
 }else{
   $msg = "Vos deux mdp ne correspondent pas !";
 }

}

?>

<html>
<head>
  <?php
  require('views/header.php');
  ?>
</head>

<body>
  <div align="center">
   <h2>Edition de mon profil</h2>

   <form method="POST" action="" enctype="multipart/form-data">
    <table>
      <tr>
       <td align="right">
         <label>Pseudo :</label>
       </td>
       <td>
         <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" />
       </td>
     </tr>
     <tr>
     </tr>
     <tr>
     </tr>
     <tr>
      <td align="right">
       <label>Mail :</label>
     </td>
     <td>
       <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" />
     </td>
   </tr>
   <tr>
     </tr>
     <tr>
     </tr>
   <tr>
    <td align="right">
     <label>Mot de passe :</label>
   </td>
   <td>
     <input type="password" name="newmdp1" placeholder="Mot de passe"/>
   </td>
 </tr>
 <tr>
     </tr>
     <tr>
     </tr>
 <tr>
  <td align="right">
   <label>Confirmation - mot de passe :</label>
 </td>
 <td>
   <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" />
 </td>
</tr>
<tr>
     </tr>
<tr>
  <td align="right">
   <input type="submit" class="retourbouton"value="Mettre à jour mon profil !" /> 
 </td>

  <td align="right">
   <input type="submit" class="retourbouton" name="retourbutton" value="Retour vers le profil" />
 </td>
</tr>

</table>

</form>

<?php if(isset($msg)) { echo $msg; } 
require('views/isset.php');

?>



</div>

</body>

<?php
require('views/footer.php');
?>


</html>
<?php   
}
else {
 header("Location: index.php?action=goto_connexion");
}
?>