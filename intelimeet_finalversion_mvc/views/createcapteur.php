<?php

session_start();
require('connectbdd.php');



require('views/isset.php');


$namesause = str_replace('_',' ', $_GET['c']);
$namesa = $_GET['c'];

if(isset($_SESSION['id'])) {
	

$requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 $requser->execute(array($_SESSION['id']));
 $user = $requser->fetch();

 
 if($user['isadmin']==1){

 	if (isset($_POST["Grandeur"]) and isset($_POST["Scale"]) and isset($_POST["DefaultValue"])){
	$grandeur = $_POST["Grandeur"];
	$scale = $_POST["Scale"];
	$defaultvalue= $_POST["DefaultValue"];
	$nomsalle_id='"'.$_GET['c'].'"';

	

	$req2= $bdd->prepare("INSERT INTO newcapt(nomsalle_id, grandeur, scale, defaultvalue ) VALUES(?,?,?,?)");
	$req2->execute(array($_GET['c'],$grandeur, $scale, $defaultvalue));
	}



?>

<html>
<head>
<?php
require('views/header.php');
?>
	
</head>
<body>

	<h1><?php echo $namesause; ?> </h1>

	<section>
<p><h1>Ajout de capteur</h1></p>

Paramétrez ci-dessous votre nouveau capteur.
Si vous ne souhaitez rien paramétrez, cliquez sur "Terminé" en bas.
<br>
 
 <ul>
 <li> <strong>Que capte votre nouveau capteur?</strong> <br>
  Répondez en un mot.
 <form  method="post">
<p>
    <input type="text" name="Grandeur" placeholder="..." />
    
</p>

</li>
<img src="views/ressources/capteurs.png" style="float:right;padding-right: 5%;" alt="Logo"/>
<li> <strong>Echelle</strong> <br>
  Indiquer l'échelle avec laquelle se mesure votre grandeur.<br> Tapez 1 si il s'agit d'une échelle unitaire, sinon tapez 100 si il s'agit d'une échelle en pourcentage.
<p>
    <input type="text" name="Scale" placeholder="..." />
    
</p>


</li>

<li> <strong>Valeur</strong><br>

Entrez la valeur par défaut que votre capteur est censée collecter en cas de non-paramétrage. 

<p>
  <input type="text" name="DefaultValue" placeholder="..." />
</p>

</li>
</ul>
<br>
<center>
    <input type="submit" class="retourbouton" value="Terminé" />
    <input type="submit" class="retourbouton" name="retourbuttonsalle" value="Retour vers les paramètres de la salle" />
</form></center>
<br>
<br>


</section>
	
</body>
<?php
//require('footer.php');
?>
</html>


 <?php   
    }else{
    	header('Location: index.php?action=goto_profil');
    }}
    else {
     header("Location: index.php?action=goto_connexion");
   }

   ?>