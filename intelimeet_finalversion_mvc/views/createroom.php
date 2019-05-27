<?php


session_start();
require('connectbdd.php');





if(isset($_SESSION['id'])) {
 $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 $requser->execute(array($_SESSION['id']));
 $user = $requser->fetch();

 if(isset($_POST['formcreation'])) {
   $nomsalle = htmlspecialchars($_POST['salleN']);
   $nomsalle_pur = strtolower(str_replace(' ','_', $nomsalle));
   $nbplaces = htmlspecialchars($_POST['nbplacesn']);
   $etat='0';
   $pseudoid='';
   
   if(!empty($_POST['salleN']) AND !empty($_POST['nbplacesn']) ) {
    $lennomsalle = strlen($nomsalle);
    
    if($lennomsalle <= 255) {
     $reqnomsalle = $bdd->prepare("SELECT * FROM salles WHERE nomsalle = ?");
     $reqnomsalle->execute(array($nomsalle_pur));
     $nomsalleexist = $reqnomsalle->rowCount();
     
     if($nomsalleexist == 0) {

      if(filter_var($nbplaces, FILTER_VALIDATE_INT)) {
        $insertroom = $bdd->prepare("INSERT INTO salles(nomsalle,etat,pseudo_id, nbplaces) VALUES(?,?,?,?)");
        $insertroom->execute(array($nomsalle_pur,$etat,$pseudoid,$nbplaces));
        $erreur13 = "La salle {$nomsalle} a bien été créee !";

      } else {
                  $erreur9 = "";//Vous n'avez pas entré un nombre dans la deuxième case
                }
              }else{
            $erreur10 = "";//nom salle  déja utilisé 
          }    
        } else {
         $erreur11 = "";//le nom de la salle ne doit pas dépasser 255 caractères 
       }
     } else {
      $erreur2 = "";//"Tous les champs doivent être complétés !";
    }
  }
  $nomsalle_id="{$nomsalle_pur}";
  $temp=20;
  $lum=50;
  $screen=0;
  $req= $bdd->prepare("INSERT INTO controlvalues(temp, lum, screen,nomsalle_id) VALUES(?,?,?,?)");
  $req->execute(array($temp, $lum, $screen, $nomsalle_id));
  ?>

  <!-- HEADER -->
  <html>
  <head>
    <?php
    require('views/header.php');
    ?>
    
  </head>

</header>

<!-- HEADER -->

<body>
  <div align="center">
   <h2>Création d'une salle</h2>
   <br /><br />
   <form method="POST" action="">
    <table>
     <tr>
      <td align="right">
       <label for="salleN">Veuillez saisir le nom de la nouvelle salle :</label>
     </td>
     <td>
       <input type="text" placeholder="Salle n" id="salleN" name="salleN" />
     </td>
   </tr>
   <tr>
    <td align="right">
     <label for="nbplaces">Indiquez le nombre de places disponilbles dans la nouvelle salle : </label>
   </td>
   <td>
     <input type="number" placeholder="30" id="nbplaces" name="nbplacesn"/>
   </td>
 </tr>
 <tr>
  <td></td>
  <td align="center">
   <br />
   <input type="submit" name="formcreation" value="Créer" />
 </td>
</tr>

</table>
</form>

<?php
//require('views/isset.php');
?>
</div>




</body>

<?php
require('views/footer.php');
?>

</html>
<?php   
}
else {
 header("Location: index.php?action=goto_connexion");
}

?>



