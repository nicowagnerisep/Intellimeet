<?php
session_start();
try{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');


$getid = intval($_GET['id']);
$requser1 = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser1->execute(array($getid));
$userinfo = $requser1->fetch();


$reponse = $bdd->query('SELECT etat FROM salles');
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
$reponse->closeCursor();








}catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
?>

<!-- HEADER -->

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" >
    <title>IntelliMeet</title>
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
      <li><a href="#">Accéder au planning</a></li>
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

<?php 
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch(); 
   
?> 
<div id="login">
<ul>
   <li><a href="?click=1"> <?php echo $user['pseudo']; ?> </a></li>
</div>
<?php 
}else{
?>
<div id="login">

<ul>
  <li><a href="connexion.php">Login</a></li>
    <li><a href="inscription.php">Sign Up</a></li>
</div>
<?php
}

    
        if (isset($_GET["click"])) {
        header('Location: profil.php?id='.$_SESSION['id']);
        }
      

?>
</header>

<!-- HEADER -->
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

</style>
</head>
	
<body>

<h1>Liste des salles</h1>

<div class="flex-container">


  <div class="salle1">Salle 1 <br>60 places<br> 

    <form method="post"></form></div>
  <div class="salle2">Salle 2 <br>60 places<br> 
    <form method="post"></form></div>
  <div class="salle3">Salle 3 <br>40 places<br>  
    <form method="post"></form></div> 
  <div class="salle4">Salle 4 <br>40 places<br>  
    <form method="post"></form></div>
  <div class="salle5">Salle 5 <br>40 places<br>  
    <form method="post"></form></div>
  <div class="salle6">Salle 6 <br>40 places<br>  
    <form method="post"></form></div>
  <div class="salle7">Salle 7 <br>20 places<br>  
    <form method="post"></form></div> 
  <div class="salle8">Salle 8 <br>20 places<br>  
    <form method="post"></form></div>
 
</div>

<?php
    if(isset($msg)) {
        echo '<font color="red">'.$msg."</font>";
        }
?>


<a href="scratch.php">Retour</a>

</body>
</html>



