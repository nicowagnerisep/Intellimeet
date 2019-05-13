<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

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
   <li><a href="connexion.php">Login</a></li>
   <li><a href="inscription.php">Sign Up</a></li>
</div>

</header>

<!-- HEADER -->


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
        if(isset($erreur1)) {
        ?>
        <script>
          alert("Mauvais mail ou mot de passe !");
        </script>
        <?php
        }else if (isset($erreur2)) {
          ?>
          <script>
          alert("Tous les champs doivent être complétés !");
        </script>
        
        <?php
        }



        ?>
         <br>
         <a href="inscription.php">Pas encore inscrit ?</a>
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