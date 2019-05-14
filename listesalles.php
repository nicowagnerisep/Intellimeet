<?php


session_start();



$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');
$getid = intval($_GET['id']);
$requser1 = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser1->execute(array($getid));
$userinfo = $requser1->fetch();



if(isset($_SESSION['id'])) {
   
   
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   $reqh1 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="1"');
   $donneeh1=$reqh1->fetch();
   $hote1=$donneeh1['pseudo_id'];
   
   $reqh2 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="2"');
   $donneeh2=$reqh2->fetch();
   $hote2=$donneeh2['pseudo_id'];
   
   $reqh3 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="3"');
   $donneeh3=$reqh3->fetch();
   $hote3=$donneeh3['pseudo_id'];
   
   $reqh4 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="4"');
   $donneeh4=$reqh4->fetch();
   $hote4=$donneeh4['pseudo_id'];
   
   $reqh5 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="5"');
   $donneeh5=$reqh5->fetch();
   $hote5=$donneeh5['pseudo_id'];
   
   $reqh6 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="6"');
   $donneeh6=$reqh6->fetch();
   $hote6=$donneeh6['pseudo_id'];
   
   $reqh7 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="7"');
   $donneeh7=$reqh7->fetch();
   $hote7=$donneeh7['pseudo_id'];
   
   $reqh8 = $bdd->query('SELECT pseudo_id FROM salles WHERE id="8"');
   $donneeh8=$reqh8->fetch();
   $hote8=$donneeh8['pseudo_id'];


  $reponse = $bdd->query('SELECT * FROM salles');
  $t=1;
  while ($donnees = $reponse->fetch())
  {
    if($donnees['etat']==0){
      
      $color='green';
      switch ($t) {
      case 1:
          $colors1=$color;
          
          
          break;
      case 2:
          $colors2=$color;
          
          
          break;
      case 3:
          $colors3=$color;
          
          
          break;
      case 4:
          $colors4=$color;
          
          
          break;
      case 5:
          $colors5=$color;
          
          
          break;
      case 6:
          $colors6=$color;
          
          
          break; 
      case 7:
          $colors7=$color;
        
          
          break;
      case 8:
          $colors8=$color;
          
          
          break;    
      }
      $t++;
      
      }else{
        
        $color='red';
       switch ($t) {
      case 1:
          $colors1=$color;
          
         break;
      case 2:
          $colors2=$color;
          
          
          break;
      case 3:
          $colors3=$color;
          
          
          break;
      case 4:
          $colors4=$color;
          
          
          break;
      case 5:
          $colors5=$color;
          
          
          break;
      case 6:
          $colors6=$color;
          
          
          break; 
      case 7:
          $colors7=$color;
          
          
          break;
      case 8:
          $colors8=$color;
          
          
          break;    
      }
        $t++;
      }
  }
  

  
  
  ?>


<!-- HEADER -->

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" > 
    <title>IntelliMeet</title>
    <style>



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
a.accessalle{
  color: white;
  text-decoration:none;
  
  
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

<form method="POST" action="">
<div class="flex-container">

<?php 

  

  if ($colors1=='red') {
    if ($user['pseudo']==$hote1) {
?>
  <div class="salle1"><a class="accessalle"  href="salleN.php?c=1">Salle 1 <br>60 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle1">Salle 1 <br>60 places<br> Réservé par <?php echo $hote1; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle1"><a class="accessalle"  href="salleN.php?c=1">Salle 1 <br>60 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!--- 1-->
<?php 

  

  if ($colors2=='red') {
    if ($user['pseudo']==$hote2) {
?>
  <div class="salle2"><a class="accessalle"  href="salleN.php?c=2">Salle 2 <br>60 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle2">Salle 2 <br>60 places<br> Réservé par <?php echo $hote2; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle2"><a class="accessalle"  href="salleN.php?c=2">Salle 2 <br>60 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!-- 2-->
<?php 

  

  if ($colors3=='red') {
    if ($user['pseudo']==$hote3) {
?>
  <div class="salle3"><a class="accessalle"  href="salleN.php?c=3">Salle 3 <br>60 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle3">Salle 3 <br>60 places<br> Réservé par <?php echo $hote3; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle3"><a class="accessalle"  href="salleN.php?c=3">Salle 3 <br>60 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!---3 -->
<?php 

  

  if ($colors4=='red') {
    if ($user['pseudo']==$hote4) {
?>
  <div class="salle4"><a class="accessalle"  href="salleN.php?c=4">Salle 4 <br>40 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle4">Salle 4 <br>40 places<br> Réservé par <?php echo $hote4; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle4"><a class="accessalle"  href="salleN.php?c=4">Salle 4 <br>40 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!-- 4-->
<?php 

  

  if ($colors5=='red') {
    if ($user['pseudo']==$hote5) {
?>
  <div class="salle5"><a class="accessalle"  href="salleN.php?c=5">Salle 5 <br>40 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle5">Salle 5 <br>40 places<br> Réservé par <?php echo $hote5; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle5"><a class="accessalle"  href="salleN.php?c=5">Salle 5 <br>40 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!---5 -->
<?php 

  

  if ($colors6=='red') {
    if ($user['pseudo']==$hote6) {
?>
  <div class="salle6"><a class="accessalle"  href="salleN.php?c=6">Salle 6 <br>40 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle6">Salle 6 <br>40 places<br> Réservé par <?php echo $hote6; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle6"><a class="accessalle"  href="salleN.php?c=6">Salle 6 <br>40 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!-- 6-->
<?php 

  

  if ($colors7=='red') {
    if ($user['pseudo']==$hote7) {
?>
  <div class="salle7"><a class="accessalle"  href="salleN.php?c=7">Salle 7 <br>30 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle7">Salle 7 <br>30 places<br> Réservé par <?php echo $hote7; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle7"><a class="accessalle"  href="salleN.php?c=7">Salle 7 <br>30 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!---7 -->
<?php 

  

  if ($colors8=='red') {
    if ($user['pseudo']==$hote8) {
?>
  <div class="salle8"><a class="accessalle"  href="salleN.php?c=8">Salle 8 <br>30 places<br>
  Modifier réservation <br> </a></div>
  
<?php 
  }else{
?>
  <div class="salle8">Salle 8 <br>30 places<br> Réservé par <?php echo $hote8; ?> <br></div>
  
<?php
} 
  }else{
  
?>
  <div class="salle8"><a class="accessalle"  href="salleN.php?c=8">Salle 8 <br>30 places<br>
  Détails de la salle<br> </a></div>

 <?php 


}
?>
<!-- 8-->



</div></form>

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



