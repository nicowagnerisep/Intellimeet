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

if (isset ($_POST["Temp"])){
	$temp=$_POST["Temp"];
	echo "temp = userdefined";
	try {
	$req1 = $bdd->prepare("INSERT INTO controlvalues(temp) VALUES (?)");
	$req1->execute(array($temp));
	}	
	catch (Exception $e){
		echo $e;
	}
} else {
	$temp=20;
	echo "temp = default";
	$req2 = $bdd->prepare("INSERT INTO controlvalues(temp) VALUES (?)");
	$req2->execute(array($temp));
}



if (isset ($_POST["Lum"])){
	$lum=$_POST["Lum"];
	echo "lum = userdefined";
	$req3 = $bdd->prepare("INSERT INTO controlvalues(lum) VALUES (?)");
	$req3->execute(array($lum));
} else {
	$lum=50;
	echo "lum = default";
	$req4 = $bdd->prepare("INSERT INTO controlvalues(lum) VALUES (?)");
	$req4->execute(array($lum));
}



if (isset ($_POST["screen"])){
	$screen=$_POST["screen"];
	echo "screen = userdefined";
	$req5 = $bdd->prepare("INSERT INTO controlvalues(screen) VALUES (?)");
	$req5->execute(array($screen));
} else {
	$screen=0;
	echo "screen = default";
	$req6 = $bdd->prepare("INSERT INTO controlvalues(screen) VALUES (?)");
	$req6->execute(array($screen));
}

?>

</body>

</html>
