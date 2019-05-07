<?php


session_start();



$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');
$getid = intval($_GET["id'"]);
$requser1 = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser1->execute(array($getid));
$userinfo = $requser1->fetch();

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();


  $reponse = $bdd->query('SELECT etat FROM salles');
  $t=1;
  while ($donnees = $reponse->fetch())
  {
    if($donnees['etat']==0){
      
      $color='green';
      switch ($t) {
      case 1:
          $colors1=$color;
          $btns1reserver="Réserver";
          break;
      case 2:
          $colors2=$color;
          $btns2reserver="Réserver";
          break;
      case 3:
          $colors3=$color;
          $btns3reserver="Réserver";
          break;
      case 4:
          $colors4=$color;
          $btns4reserver="Réserver";
          break;
      case 5:
          $colors5=$color;
          $btns5reserver="Réserver";
          break;
      case 6:
          $colors6=$color;
          $btns6reserver="Réserver";
          break; 
      case 7:
          $colors7=$color;
          $btns7reserver="Réserver";
          break;
      case 8:
          $colors8=$color;
          $btns8reserver="Réserver";
          break;    
      }
      $t++;
      
      }else{
        
        $color='red';
       switch ($t) {
      case 1:
          $colors1=$color;
          $btns1reserver="Annuler réservation";
          break;
      case 2:
          $colors2=$color;
          $btns2reserver="Annuler réservation";
          break;
      case 3:
          $colors3=$color;
          $btns3reserver="Annuler réservation";
          break;
      case 4:
          $colors4=$color;
          $btns4reserver="Annuler réservation";
          break;
      case 5:
          $colors5=$color;
          $btns5reserver="Annuler réservation";
          break;
      case 6:
          $colors6=$color;
          $btns6reserver="Annuler réservation";
          break; 
      case 7:
          $colors7=$color;
          $btns7reserver="Annuler réservation";
          break;
      case 8:
          $colors8=$color;
          $btns8reserver="Annuler réservation";
          break;    
      }
        $t++;
      }
  }
  

  if(isset($_POST['subs1']) AND $btns1reserver=="Réserver") {

  	$msg = "L'état de la salle 1 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '1'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs1']) AND $btns1reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 1 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '1'");
      $insertvalsalle->execute(array($valsalle));
  }else if (isset($_POST['subs2'])AND $btns2reserver=="Réserver") {

  	$msg = "L'état de la salle 2 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '2'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs2'])AND $btns2reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 2 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '2'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs3'])AND $btns3reserver=="Réserver") {

  	$msg = "L'état de la salle 3 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '3'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs3'])AND $btns3reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 3 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '3'");
      $insertvalsalle->execute(array($valsalle));
  }else if (isset($_POST['subs4'])AND $btns4reserver=="Réserver") {

  	$msg = "L'état de la salle 4 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '4'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs4'])AND $btns4reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 4 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '4'");
      $insertvalsalle->execute(array($valsalle));

  }else if(isset($_POST['subs5'])AND $btns5reserver=="Réserver") {

  	$msg = "L'état de la salle 5 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '5'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs5'])AND $btns5reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 5 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '5'");
      $insertvalsalle->execute(array($valsalle));
  }else if (isset($_POST['subs6'])AND $btns6reserver=="Réserver") {

  	$msg = "L'état de la salle 6 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '6'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs6'])AND $btns6reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 6 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '6'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs7'])AND $btns7reserver=="Réserver") {

  	$msg = "L'état de la salle 7 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '7'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs7'])AND $btns7reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 7 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '7'");
      $insertvalsalle->execute(array($valsalle));
  }else if (isset($_POST['subs8'])AND $btns8reserver=="Réserver") {

  	$msg = "L'état de la salle 8 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '8'");
      $insertvalsalle->execute(array($valsalle));

  }else if (isset($_POST['subs8'])AND $btns8reserver=="Annuler réservation") {

  	$msg = "L'état de la salle 8 viens d'être modifié, raffraichissez la page <a href=\"listesalles.php\">ici";
  	$valsalle="0";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '8'");
      $insertvalsalle->execute(array($valsalle));

  }
  
  ?>


<!-- HEADER -->

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" > 
    <title>IntelliMeet</title>
    <style>

/*:root {
  
  --colors2: red;
  --colors3: green;
  --colors4: green;
  --colors5: green;
  --colors6: red;
  --colors7: green;
  --colors8: red;
} */

.flex-container {
  display: flex;
  flex-wrap: wrap;
  /*background-color: #f1f1f1;*/
}

.flex-container > div.salle1 {
  border-radius : 7px;
  background-color: <?php echo $colors1; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
}
.flex-container > div.salle2 {
  border-radius : 7px;
  background-color: <?php echo $colors2; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}
.flex-container > div.salle3 {
  border-radius : 7px;
  background-color: <?php echo $colors3; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}
.flex-container > div.salle4 {
  border-radius : 7px;
  background-color: <?php echo $colors4; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}
.flex-container > div.salle5 {
  border-radius : 7px;
  background-color: <?php echo $colors5; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}
.flex-container > div.salle6 {
  border-radius : 7px;
  background-color: <?php echo $colors6; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}
.flex-container > div.salle7 {
  border-radius : 7px;
  background-color: <?php echo $colors7; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}
.flex-container > div.salle8 {
  border-radius : 7px;
  background-color: <?php echo $colors8; ?>;
  color: white;
  width: 400px;
  margin: 10px;
  text-align: center;
  line-height: 50px;
  font-size: 30px;
  
}

</style>

</head>

<body>


<header>

<li><a href="scratch.php"><img src="IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/></a></li>




<!-- <li><a href="?click=1"><img src="IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/></a></li>
<?php
        if (isset($_GET["click"])) {
                 

        header('Location: profil.php?id='.$_SESSION['id']);
        }
      
?> -->

<div id="menu">
<ul>
  <li><a href="scratch.php">Accueil</a></li>
  <li><a href="#">Réserver</a>
  <ul>
      <li><a href="listesalles.php">Réserver une salle</a></li>
      <li><a href="listesallesoff.php">Accéder au planning</a></li>
    </ul></li>
  <li><a href="#">Mes réunions</a>
   <ul>
      <li><a href="#">Réunions à venir</a></li>
      <li><a href="#">Historique</a></li>
      <li><a href="#">Mes paramètres</a></li>
    </ul>
  </li>
  <li><a href="#">Notre équipe</a>
   <ul>
      <li><a href="#">Domisep</a></li>
      <li><a href="#">Notre projet</a></li>
    </ul>
  </li>
  <li><a href="#">Contact</a>
   <ul>
      <li><a href="#">SAV</a></li>
      <li><a href="#">Propositions et remarques</a></li>
    </ul>
  </li>


</ul>
</div>

<div id="login">
<ul>
   <!--<form method="post"><input type="submit" name="retourbutton" value=<?php echo $user['pseudo']; ?>></form> -->
   <li><a href="?click=1"><?php echo $user['pseudo']; ?></a></li>
   
   


<?php
        if(isset($_POST['retourbutton'])){
        header('Location: profil.php?id='.$_SESSION['id']);
        }else if (isset($_GET["click"])) {
        header('Location: profil.php?id='.$_SESSION['id']);
        }
      
?>
</div>

</header>

<!-- HEADER -->






<body>

<h1>Liste des salles</h1>

<div class="flex-container">


  <div class="salle1">Salle 1 <br>60 places<br> 

    <form method="post"><input type="submit" name="subs1" value=<?php echo $btns1reserver; ?>></a></form></div>
  <div class="salle2">Salle 2 <br>60 places<br> 
    <form method="post"><input type="submit" name="subs2" value=<?php echo $btns2reserver; ?>></a></form></div>
  <div class="salle3">Salle 3 <br>40 places<br>  
    <form method="post"><input type="submit" name="subs3" value=<?php echo $btns3reserver; ?>></a></form></div> 
  <div class="salle4">Salle 4 <br>40 places<br>  
    <form method="post"><input type="submit" name="subs4" value=<?php echo $btns4reserver; ?>></a></form></div>
  <div class="salle5">Salle 5 <br>40 places<br>  
    <form method="post"><input type="submit" name="subs5" value=<?php echo $btns5reserver; ?>></a></form></div>
  <div class="salle6">Salle 6 <br>40 places<br>  
    <form method="post"><input type="submit" name="subs6" value=<?php echo $btns6reserver; ?>></a></form></div>
  <div class="salle7">Salle 7 <br>20 places<br>  
    <form method="post"><input type="submit" name="subs7" value=<?php echo $btns7reserver; ?>></a></form></div> 
  <div class="salle8">Salle 8 <br>20 places<br>  
    <form method="post"><input type="submit" name="subs8" value=<?php echo $btns8reserver; ?>></a></form></div>
  
 
</div>

<form method="post"><input type="submit" name="retourbutton" value="Retour vers le profil" /></form>

<?php
    if(isset($msg)) {
        echo '<font color="red">'.$msg."</font>";
        }
      
?>


</body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>



