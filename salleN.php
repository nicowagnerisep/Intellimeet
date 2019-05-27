
<?php




session_start();


require('connexionbdd.php');
require('isset.php');
require('functions.php');


$namesause = str_replace('_',' ', $_GET['c']);
$namesa = $_GET['c'];

if(isset($_SESSION['id'])) {
 $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 $requser->execute(array($_SESSION['id']));
 $user = $requser->fetch();


 $reponse = $bdd->query('SELECT * FROM salles WHERE nomsalle="'.$namesa.'"');
 $donnees = $reponse->fetch();


    if ($donnees['etat']==0) {
      $color='green';
      $btns1reserver="Réserver";

    }else {
      $color='red';
      $btns1reserver="Déréserver";

    }

    if(isset($_POST['subs']) AND $btns1reserver=="Réserver") {

      
      $valsalle="1";
      $nomhote=$user['pseudo'];
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE nomsalle = '".$namesa."'");
      $insertvalsalle->execute(array($valsalle));
      $insertvalsalle = $bdd->prepare("UPDATE salles SET pseudo_id = ? WHERE nomsalle = '".$namesa."'");
      $insertvalsalle->execute(array($nomhote));


    }else if (isset($_POST['subs']) AND $btns1reserver=="Déréserver") {

      
      $valsalle="0";
      $nomhote='';
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE nomsalle = '".$namesa."'");
      $insertvalsalle->execute(array($valsalle));
      $insertvalsalle = $bdd->prepare("UPDATE salles SET pseudo_id = ? WHERE nomsalle = '".$namesa."'");
      $insertvalsalle->execute(array($nomhote));
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
      require('header.php');
      ?>
      
      <style >
        .btn1{
          background-color: <?php echo $color; ?>;
        }      

      </style>

      
    </head>

    <body>

      <section>
        <?php
          isadmin($user,capteurs); // afficher capteurs si admin 
        
        ?>
    
  </section>



  <?php
  if (isset($msgcap)){
    echo $msgcap;
  }
  ?>


<h1><?php echo $namesause; ?> </h1>

      <div class="flex-container">


        <div align="center "class="sallen"><br><?php echo $donnees['nbplaces']; ?> places<br> N capteurs[...]

          

          
            <form method="post"><button class="btn1" name="subs" value="test" onclick= "modifEtat()"><?php echo $btns1reserver; ?></button></form>
          



          





            <!--
          <form method="post"><input type="submit" onclick= "window.location.reload();" name="subs" class="btn1" value=<?php echo $btns1reserver; ?>></a></form> -->






          <br>
          <br>
          
        </div>
          


        </div>

        <form method="post"><input type="submit" name="retourbutton" value="Retour vers le profil" /></form>
        <form method="post"><input type="submit" name="retourbuttonsch" value="Retour vers la liste des salles" /></form>
        
        <?php
        
        isadmin($user,delroom); //affiche leboutton si admin 
        ?>
        <br>
        <br>
       

        <?php

        if(isset($msg)) {
          echo $msg;
        }
        ?>

        <!--
        <div class="divdel" id="del">
        <form method="POST" action="">
        <input name="mdpconnect" type="password" />
        <input type="submit" name="delresult" value="SUPPRIMER" />
        </form>
        </div> -->

     
      
      

      </body>





      </html>
      <?php   
    }
    else {
     header("Location: connexion.php");
   }

   ?>



