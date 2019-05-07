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
<p><h1>Mentions Légales</h1></p>
   
<form action="#" method="post">
<input type="checkbox" name="check_list[0]" value="Température"><label>Température</label><br/>
<input type="checkbox" name="check_list[1]" value="Luminosité"><label>Luminosité</label><br/>
<input type="checkbox" name="check_list[2]" value="Présence"><label>Présence</label><br/>
<input type="checkbox" name="check_list[3]" value="L'écran de projection"><label>Ecran de projection (cochez si vous en avez besoin)</label><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
echo "Vous avez choisi de paramétrez les facteurs suivants:". "</br>"; 
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
}
}
}


?>   

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