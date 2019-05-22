<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" >
    <title>IntelliMeet</title>
</head>

<body>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=control', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if (isset ($_POST["Temp"]) and ($_POST["Temp"])>17 and ($_POST["Temp"])<25 ){
	$temp=$_POST["Temp"];
	echo "temp = userdefined";
} else {
	$temp=20;
}



if (isset ($_POST["Lum"])){
	$lum=$_POST["Lum"];
	echo "lum = userdefined";
} else {
	$lum=50;
	echo "lum = default";
}



if (isset ($_POST["screen"])){
	$screen=$_POST["screen"];
	echo "screen = userdefined";
	
} else {
	$screen=0;
	echo "screen = default";
}

$req= $bdd->prepare("INSERT INTO controlvalues(temp, lum, screen) VALUES(?,?,?)");
$req->execute(array($temp, $lum, $screen));


if (isset($_POST["Grandeur"]) and isset($_POST["Scale"]) and isset($_POST["DefaultValue"])){
	$grandeur = $_POST["Grandeur"];
	$scale = $_POST["Scale"];
	$defaultvalue= $_POST["DefaultValue"];
	$req2= $bdd->prepare("INSERT INTO newcapt(grandeur, scale, defaultvalue) VALUES(?,?,?)");
	$req2->execute(array($grandeur, $scale, $defaultvalue));
}




?>

</body>

</html>
