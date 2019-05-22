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
<p><h1>Mes paramètres</h1></p>

Choisissez ci-dessous les facteurs par défaut que vous souhaitez avoir au moment de la réservation de votre salle.<br>
Ces valeurs seront automatiquement appliquées à votre salle lorsque vous la réservez.
Si vous ne souhaitez rien paramétrez, cliquez sur "Terminé" en bas. <br>
<br>
 
 <ul>
 <li> <strong>Température</strong> <br>
  Valeur par défaut : 20 degrés. Vous pouvez renseigner n'importe quelle température entre 17 et 25 degrés.
 <form action="values.php" method="post">
<p>
    <input type="text" name="TempUserFav" placeholder="Température" />
    
</p>

</li>
<img src="capteurs.png" style="float:right;padding-right: 5%;" alt="Logo"/>
<li> <strong>Luminosité</strong> <br>
  Entrez un pourcentage d'intensité. Valeur par défaut : 50%. <br> Vous pouvez renseigner n'importe quelle température entre 0% (lumières éteintes) et 100% (lumières au max).
 
<p>
    <input type="text" name="LumUserFav" placeholder="Luminosité" />
    
</p>


</li>

<li> <strong>Ecran de projection</strong><br>

Souhaitez que l'écran de projection soit baissé?

<p>
  <input type="radio" name="screenUserFav" value="1" id="oui"  /> <label for="oui">Oui</label>
  <input type="radio" name="screenUserFav" value="0" id="non" /> <label for="non">Non</label>
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