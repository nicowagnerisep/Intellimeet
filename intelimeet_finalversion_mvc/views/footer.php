<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="views/css/style.css">
    <title>IntelliMeet</title>
</head>

<body>

<footer>

<div id ="footerleft">
<a href ="index.php?action=goto_legal"><strong>CGU</strong></a>
</div>

<div id ="footermiddle">
<strong><a href="index.php?action=goto_intellimeet">Intellimeet</a></strong>

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
<a href ="index.php?action=goto_formulaire_de_contact"><strong>Contact</strong></a>
</div>

</footer>

</body>

</html>