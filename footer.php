<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <title>IntelliMeet</title>
</head>

<body>

<footer>

<div id ="footerleft">
<a href ="legal.php"><strong>Mentions légales</strong></a>
</div>

<div id ="footermiddle">
<strong><a href="intellimeet.php">Intellimeet</a></strong>

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
<a href ="formulaire_de_contact.php"><strong>Contact</strong></a>
</div>

</footer>

</body>

</html>