
<?php




session_start();
require('connectbdd.php');


require('views/isset.php');
$header="MIME-Version: 1.0\r\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
//require('functions.php');
$clef=rand(0, 100);
$textemail="Ci-joint votre clé sonore pour l'accès à la salle : ".$clef."<br>L'équipe Intellimeet."; // a relier a la bdd 


$namesause = str_replace('_',' ', $_GET['c']);
$namesa = $_GET['c'];

if(isset($_SESSION['id'])) {
 $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 $requser->execute(array($_SESSION['id']));
 $user = $requser->fetch();


 $reponse = $bdd->query('SELECT * FROM salles WHERE nomsalle="'.$namesa.'"');
 $donnees = $reponse->fetch();


 if ($donnees['etat']==0) {
  $color_reserve='demande-admin';
  $btns1reserver="Réserver la salle";


}else {
  $color_reserve='red';
  $btns1reserver="Déréserver la salle";

}

if(isset($_POST['subs']) AND $btns1reserver=="Réserver la salle") {


  $valsalle="1";
  $nomhote=$user['pseudo'];
  $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE nomsalle = '".$namesa."'");
  $insertvalsalle->execute(array($valsalle));
  $insertvalsalle = $bdd->prepare("UPDATE salles SET pseudo_id = ? WHERE nomsalle = '".$namesa."'");
  $insertvalsalle->execute(array($nomhote));
  header('Location: index.php?action=goto_salleN&c='.$namesa);
  mail($user['mail'], "Votre réservation - Intellimeet", $textemail, $header);



}else if (isset($_POST['subs']) AND $btns1reserver=="Déréserver la salle") {


  $valsalle="0";
  $nomhote='';
  $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE nomsalle = '".$namesa."'");
  $insertvalsalle->execute(array($valsalle));
  $insertvalsalle = $bdd->prepare("UPDATE salles SET pseudo_id = ? WHERE nomsalle = '".$namesa."'");
  $insertvalsalle->execute(array($nomhote));
  header('Location: index.php?action=goto_salleN&c='.$namesa);


}else if(isset($_POST['delbtn'])){



}


    //CAPTEURS 



if (isset ($_POST["Temp"]) and ($_POST["Temp"])>17 and ($_POST["Temp"])<25 ){
  $temp=$_POST["Temp"];
  
} else {
  $temp=20;
}



if (isset ($_POST["Lum"])){
  $lum=$_POST["Lum"];
  
} else {
  $lum=50;
  
}



if (isset ($_POST["screen"])){
  $screen=$_POST["screen"];
  
  
} else {
  $screen=0;
  
}


$req= $bdd->prepare("UPDATE controlvalues SET temp =? WHERE nomsalle_id = '".$namesa."'");
$req->execute(array($temp));
$req= $bdd->prepare("UPDATE controlvalues SET lum = ? WHERE nomsalle_id = '".$namesa."'");
$req->execute(array($lum));
$req= $bdd->prepare("UPDATE controlvalues SET screen = ? WHERE nomsalle_id = '".$namesa."'");
$req->execute(array($screen));

if(isset($_POST['capteurbtn'])){


$msg="valeurs entrées enregistrées";





}




/*if (isset ($_POST["Temp"]) OR isset ($_POST["Lum"]) OR isset ($_POST["screen"])) {
  $msgcap = "Données enregistrées";
  
} else if(isset ($_POST['capteurbtn']) AND empty($_POST["Temp"]) AND empty($_POST["Lum"]) AND empty($_POST["screen"])){
  $msgcap = "Données par défaut enregistrées";
} */




 /////////////////// 



?>
<!-- ///////////////:-->







<!-- HEADER -->

<html>
<head>

  <?php
  require('views/header.php');
  ?>

  <style >
    .btn1{
      background-color: <?php echo $color; ?>;
    }  
    a.createcapt{
      color: white;
      text-decoration:none;
      font-style: normal;
    }    

  </style>
  <script>
    function modifEtat(){


      alert("L'état de la salle viens d'être modifié");
    }
    function getConfirmationOk() {
            alert("Salle supprimée");
          }
          function getConfirmationNo(){
            alert("Manoeuvre annulée la salle n'a pas été supprimée");

          }
          function confirm(){
            alert("VOULEZ VOUS VRAIMENT SUPPRIMER LA SALLE ? CECI ENTRAÎNERA LA SUPPRESSION DE TOUTES LES DONNÉES RELATIVES À CELLE-CI");
          }
  </script>


</head>

<body>

  <section>

    <p><h1>Intellimeet <?php echo $namesause." : ".$donnees['nbplaces']; ?> places</h1></p>
    <div align=<?php if($user['isadmin']==1){echo "center";}else{echo "left";}?>>
      <table>
        <tr>
          <td>
    <form method="post"><button  name="subs" value="test" onclick= "modifEtat()" class=<?php echo $color_reserve; ?>><?php echo $btns1reserver; ?></button></form>
  </td>
    <?php
    if($user['isadmin']==1){
     ?>


     <td>
      <form method="post">
        <button class="red" name="delbtn" onclick= "confirm()">SUPPRIMER CETTE SALLE</button>
      </td>
    </tr>
  </table>




        <?php
        if(isset($_POST['delbtn'])){
          ?>


          <button class="demande-admin"name="confirmdelbtn" onclick= "getConfirmationOk()">CONFIRMER</button>

          <button class="red" name="annuldelbtn" onclick= "getConfirmationNo()">ANNULER</button></form>

          <?php
        }


      }//is admin ?
      ?>
      <br>
      <br>
    </div>
      Choisissez ci-dessous les facteurs que vous voulez paramétrez.
      Si vous ne souhaitez rien paramétrez, cliquez sur "Terminé" en bas.
      <br>
      

      <ul>
        <li> <strong>Température</strong> <br>
          Valeur par défaut : 20 degrés. Vous pouvez renseigner n'importe quelle température entre 17 et 25 degrés.
          
            <p>
              <form method="post">
              <input type="text" name="Temp" placeholder="Température" /></form>

            </p>

          </li>

          <img src="views/ressources/capteurs.png" style="float:right;padding-right: 5%;"/>

          <li> <strong>Luminosité</strong> <br>
            Entrez un pourcentage d'intensité. Valeur par défaut : 50%. <br> Vous pouvez renseigner n'importe quelle température entre 0% (lumières éteintes) et 100% (lumières au max).

            <p><form method="post">
              <input type="text" name="Lum" placeholder="Luminosité" /></form>

            </p>

          </li>

          <li> <strong>Ecran de projection</strong><br>

            Souhaitez que l'écran de projection soit baissé?

            <p><form method="post">
              <input type="radio" name="screen" value="1" id="oui"  /> <label for="oui">Oui</label>
              <input type="radio" name="screen" value="0" id="non" /> <label for="non">Non</label>
            </form>
            </p>

          </li>
        </form>
          <!--- CAPTEURS SUPPLEMENTAIRES ? -->
          <?php
          $reqcapt = $bdd->query('SELECT * FROM newcapt WHERE nomsalle_id = "'.$namesa.'"');
          while($donneescapt = $reqcapt->fetch()){
            $t=1;
            ?>
            <li> <strong><?php  echo $donneescapt['grandeur']?></strong> <br>

              <p>
                <input type="text" name="Lum" placeholder=<?php  echo $donneescapt['grandeur']?> />

              </p>

            </li>

            <?php


            $t++;
          } 
        // fin while 

        /*
        $reqcaptbis = $bdd->query('SELECT * FROM newcapt WHERE nomsalle_id = "'.$namesa.'"');
        $tb=1;
        while($tb<$t){
        if(isset($_POST[$tb])){
          //$bdd->query('DELETE FROM newcapt WHERE id ="'.$donneescapt['id'].'"');
          $bdd->query('DELETE FROM newcapt WHERE id ="3" ');
          


    header('Location: profil.php?id='.$_SESSION['id']);


        }
        $tb=$tb+2;
      }//while     */




      if($user['isadmin']==1){
        $donneescaptbtn="b".$donneescapt['id'];
        ?>

        <form method="post"><button class="red" name="delcapt">supprimer capteur(s) additionnel(s)</button></form>

        <?php
        if(isset($_POST['delcapt'])){
          $bdd->query('DELETE FROM newcapt WHERE nomsalle_id ="'.$namesa.'"');
          
          


          //header('Location: salleN.php?c='.$namesa);
          //header('Location: index.php?action=goto_salleNc='.$namesa);
          header("Refresh:0");


        }
      }
      ?>




      <!--- CAPTEURS SUPPLEMENTAIRES FIN -->



    </ul>
    <br>
    
      <form method="post"><input type="submit" class="retourbouton" name="capteurbtn" value="Terminé" />
    </form>
    <?php
    if(isset($msg)){
    echo $msg;
    }

    ?>
    <br>
    <br>




    <?php
    ///////////////// 
    if(isset($_POST['confirmdelbtn'])){
    //echo "ok";
      $bdd->query('DELETE FROM salles WHERE nomsalle ="'.$namesa.'"');
      $bdd->query('DELETE FROM controlvalues WHERE nomsalle_id ="'.$namesa.'"');


      header('Location: index.php?action=goto_profil');


    }

    ?>
    
  </section>



  <?php
  if (isset($msgcap)){
    echo $msgcap;
  }
  ?>




  <div class="flex-container">


    




      










            <!--
              <form method="post"><input type="submit" onclick= "window.location.reload();" name="subs" class="btn1" value=<?php echo $btns1reserver; ?>></a></form> -->






              <br>
              <br>

            </div>



          </div>
          <div align="center">
            <form method="post">
              <table>
                <tr>
                  <td>
                    <input type="submit" class="retourbouton" name="retourbutton" value="Retour vers le profil" />
                  </td>
                  <td>
                    <input type="submit" class="retourbouton" name="retourbuttonsch" value="Retour vers la liste des salles" />
                  </td>

                  <?php

       // isadmin($user,delroom()); //affiche leboutton si admin 

                  if($user['isadmin']==1){
                   ?>
  <!--
    <form method="post"><button name="delbtn" onclick= "getConfirmation()">SUPPRIMER CETTE SALLE</button></form>
  -->
  <td>
    <form method="post">
    <button type="submit" class="retourbouton" name="createcapt" value="" /><a class="createcapt"href=<?php echo 'index.php?action=goto_createcapteur&c='.$namesa; ?>>Créer un capteur +</a></button>
    
    </form>

  </td>
</tr>
</table>
</form>
</div>

<?php

        }//admin ?


        ?>



        
        
        <br>
        <br>


        

        
    </body>





    </html>
    <?php   
  }
  else {
   header("Location: index.php?action=goto_connexion");
 }

 ?>
