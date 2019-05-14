<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   
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
   <li><a href="#"><?php echo $userinfo['pseudo']; ?></a></li>
</div>

</header>

<!-- HEADER -->

   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <a href="listesalles.php">Liste des salles</a>
         











         <!-- ////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\A ENLEVER -->
       

        <br><br><form method="post"><input type="submit" name="reset" value="Reset salles"></a></form>
        <?php
        if(isset($_POST['reset'])){
        $rselection = "0";
        $insertvalsalle = $bdd->prepare("UPDATE salles SET etat= ?");
        $insertvalsalle->execute(array($rselection));
        }

        ?>
        
 
         <!-- ////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
         








         <?php
         }
         ?>
      </div>
   </body>

   <!-- FOOTER -->

<footer>

<div id ="footerleft">
Mentions légales
<br/>
Breadcrumbs 

</div>

<div id ="footermiddle">
Domisep

</div>


<div id= "footerright">

<?php
//heure
function showtime(){
date_default_timezone_set("Europe/Paris");
echo "" . date("d/m/Y") . "<br>";
echo "" . date("h:i:s");
}
showtime();
?>
<br/>
<br/>
<strong>Contact</strong>
</div>

</footer>


<!-- -->

</html>
<?php   
}
?>