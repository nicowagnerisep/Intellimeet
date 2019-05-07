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
  <li><a href="#">Accueil</a></li>
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

<section>
<p><h1>Bonjour et bienvenue!</h1></p>
   
<p><br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ipsum lacus. Quisque feugiat interdum cursus. Nulla fringilla arcu augue, condimentum tincidunt nisi egestas in. Aenean vel pulvinar nunc, eget bibendum mauris. Aenean ullamcorper blandit urna sit amet lacinia. Vestibulum nisi nulla, cursus quis purus sed, ullamcorper aliquam velit. Aliquam commodo sapien quis fringilla faucibus. Donec cursus nibh leo, sed elementum lorem pretium sed. Vivamus eleifend facilisis lacus facilisis aliquet. Curabitur et dolor eget ligula molestie blandit nec sit amet massa. Maecenas semper rutrum nulla vel viverra. In luctus est sit amet augue blandit eleifend. In posuere erat ut turpis lobortis, sollicitudin sollicitudin risus efficitur.
<br/><br/>
Aliquam erat volutpat. Morbi laoreet ornare leo, non pellentesque massa varius non. Proin mattis lacus at lobortis vestibulum. Integer vel leo porttitor, facilisis diam at, scelerisque enim. Sed elit nulla, luctus ut molestie sed, euismod nec nunc. In sit amet congue lectus, et condimentum tortor. Suspendisse eu quam ligula. Aliquam a odio mi. Morbi sodales vitae urna et consectetur. Curabitur sit amet purus neque. Vivamus condimentum egestas sagittis. Duis ut risus vitae lorem luctus viverra non lobortis diam. Etiam sed malesuada enim, eget consectetur lacus. Mauris vulputate eu sem eget pretium. Suspendisse rutrum, arcu sit amet tempus finibus, ipsum urna maximus nunc, ac ultricies augue arcu at ipsum. Fusce nec finibus turpis.
<br/><br/>
Ut pulvinar mi quis eros mollis venenatis quis in elit. Maecenas ipsum tellus, laoreet ac rutrum eget, pulvinar a mi. Aenean mollis viverra efficitur. Nulla facilisi. Aliquam ac magna tristique, auctor libero et, accumsan nulla. Integer eleifend ex eu purus sollicitudin, in dapibus diam cursus. Curabitur commodo vestibulum tellus, id feugiat mauris tristique vitae. Fusce bibendum eget enim nec elementum. Praesent convallis interdum tellus id ultrices. Suspendisse ut leo sit amet est bibendum ultrices sit amet sit amet dui.<br />
    </p>
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