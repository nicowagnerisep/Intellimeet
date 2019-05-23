<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" >
    <title>IntelliMeet</title>
</head>

<body>


<header>

<img src="IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/>

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
      <li><a href="domisep.php">Domisep</a></li>
      <li><a href="#">Notre projet</a></li>
    </ul>
  </li>
  <li><a href="contact.php">Contact</a>
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

<section>
<p><h1>Domisep</h1></p>

Choisissez ci-dessous les facteurs que vous voulez paramétrez.
Si vous ne souhaitez rien paramétrez, cliquez sur "Terminé" en bas.
<br>
 
 <ul>
 <li> <strong>Température</strong> <br>
  Valeur par défaut : 20 degrés. Vous pouvez renseigner n'importe quelle température entre 17 et 25 degrés.
 <form action="values.php" method="post">
<p>
    <input type="text" name="Temp" placeholder="Température" />
    <input type="submit" value="Valider" />
</p>
</form>
</li>

<li> <strong>Luminosité</strong> <br>
  Entrez un pourcentage d'intensité. Valeur par défaut : 50%. <br> Vous pouvez renseigner n'importe quelle température entre 0% (lumières éteintes) et 100% (lumières au max).
 <form action="values.php" method="post">
<p>
    <input type="text" name="Lum" placeholder="Luminosité" />
    <input type="submit" value="Valider" />
</p>
</form>
</li>

<li> <strong>Ecran de projection</strong><br>

Souhaitez que l'écran de projection soit baissé?
<form action="values.php" method ="post">
<p>
  <input type="radio" name="screen" value="oui" id="oui"  /> <label for="oui">Oui</label>
  <input type="radio" name="screen" value="non" id="non" /> <label for="non">Non</label>
</p>
</form>
</li>
</ul>
<br>
<center><form action="scratch.php">
    <input type="submit" value="Terminé" />
</form></center>
<br>
<br>
Pour plus d'informations sur notre service, cliquez <strong><a= href=#>ici</a></strong>.

</section>



<footer>

<div id ="footerleft">
<a href ="legal.php"><strong>Mentions légales</strong></a>
</div>

<div id ="footermiddle">
<strong><a href="domisep.php">Domisep</a></strong>

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
<a href ="contact.php"><strong>Contact</strong></a>
</div>

</footer>

</body>

</html>