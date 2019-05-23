<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" >
    <title>IntelliMeet</title>
</head>

<body>


<?php
require ('header.php');
?>

<section>
<p><h1>Ajout de capteur</h1></p>

Paramétrez ci-dessous votre nouveau capteur.
Si vous ne souhaitez rien paramétrez, cliquez sur "Terminé" en bas.
<br>
 
 <ul>
 <li> <strong>Que capte votre nouveau capteur?</strong> <br>
  Répondez en un mot.
 <form action="values.php" method="post">
<p>
    <input type="text" name="Grandeur" placeholder="..." />
    
</p>

</li>
<img src="capteurs.png" style="float:right;padding-right: 5%;" alt="Logo"/>
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
    <input type="submit" value="Terminé" />
</form></center>
<br>
<br>
Pour plus d'informations sur notre service, cliquez <strong><a= href=#>ici</a></strong>.

</section>



<?php
require ('footer.php');
?>

</body>

</html>