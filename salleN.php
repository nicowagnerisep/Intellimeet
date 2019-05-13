<?php


session_start();



$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');
$getid = intval($_GET['id']);
$requser1 = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser1->execute(array($getid));
$userinfo = $requser1->fetch();
$numbersalle = $_GET['c'];

if(isset($_SESSION['id'])) {
 $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 $requser->execute(array($_SESSION['id']));
 $user = $requser->fetch();


 $reponse = $bdd->query('SELECT * FROM salles WHERE id="'.$numbersalle.'"');
 $donnees = $reponse->fetch();



   /*/if($_GET['c']==1){
      $rselection = "1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET selectedroom = ? WHERE id = '1'");
      $insertvalsalle->execute(array($rselection));
      
   
   }elseif ($_GET['c']==2) {
      $rselection = "1";
      $insertvalsalle = $bdd->prepare("UPDATE salles SET selectedroom = ? WHERE id = '2'");
      $insertvalsalle->execute(array($rselection));
      
     
    } /*/







    if ($donnees['etat']==0) {
      $color='green';
      $btns1reserver="Réserver";

    }else {
      $color='red';
      $btns1reserver="Déréserver";

    }

    if(isset($_POST['subs']) AND $btns1reserver=="Réserver") {

      $msg = "L'état de la salle 1 viens d'être modifié, raffraichissez la page <a href=\"salleN.php?c={$numbersalle}\">ici";
      $valsalle="1";
      $nomhote=$user['pseudo'];
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '".$numbersalle."'");
      $insertvalsalle->execute(array($valsalle));
      $insertvalsalle = $bdd->prepare("UPDATE salles SET pseudo_id = ? WHERE id = '".$numbersalle."'");
      $insertvalsalle->execute(array($nomhote));


    }else if (isset($_POST['subs']) AND $btns1reserver=="Déréserver") {

      $msg = "L'état de la salle 1 viens d'être modifié, raffraichissez la page <a href=\"salleN.php?c={$numbersalle}\">ici";
      $valsalle="0";
      $nomhote='';
      $insertvalsalle = $bdd->prepare("UPDATE salles SET etat = ? WHERE id = '".$numbersalle."'");
      $insertvalsalle->execute(array($valsalle));
      $insertvalsalle = $bdd->prepare("UPDATE salles SET pseudo_id = ? WHERE id = '".$numbersalle."'");
      $insertvalsalle->execute(array($nomhote));
    }

    ?>


    <!-- HEADER -->

    <html>
    <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="style.css" > 
      <title>IntelliMeet</title>
      <style >
        .btn1{
          background-color: <?php echo $color; ?>;
        }      

      </style>


    </head>

    <body>


      <header>

        <li><a href="scratch.php"><img src="IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/></a></li>




<!-- <li><a href="?click=1"><img src="IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/></a></li>
<?php
        if (isset($_GET["click"])) {
                 

        header('Location: profil.php?id='.$_SESSION['id']);
        }
      
        ?> -->

        <div id="menu">
          <ul>
            <li><a href="scratch.php">Accueil</a></li>
            <li><a href="#">Réserver</a>
              <ul>
                <li><a href="listesalles.php">Réserver une salle</a></li>
                <li><a href="listesallesoff.php">Accéder au planning</a></li>
              </ul></li>
              <li><a href="#">Mes réunions</a>
               <ul>
                <li><a href="#">Réunions à venir</a></li>
                <li><a href="#">Historique</a></li>
                <li><a href="#">Mes paramètres</a></li>
              </ul>
            </li>
            <li><a href="#">Notre équipe</a>
             <ul>
              <li><a href="#">Domisep</a></li>
              <li><a href="#">Notre projet</a></li>
            </ul>
          </li>
          <li><a href="#">Contact</a>
           <ul>
            <li><a href="#">SAV</a></li>
            <li><a href="#">Propositions et remarques</a></li>
          </ul>
        </li>


      </ul>
    </div>

    <div id="login">
      <ul>
       <!--<form method="post"><input type="submit" name="retourbutton" value=<?php echo $user['pseudo']; ?>></form> -->
       <li><a href="?click=1"><?php echo $user['pseudo']; ?></a></li>




       <?php
       if(isset($_POST['retourbutton'])){
        header('Location: profil.php?id='.$_SESSION['id']);
      }else if (isset($_GET["click"])) {
        header('Location: profil.php?id='.$_SESSION['id']);
      }else if (isset($_POST['retourbuttonsch'])){
        header('Location: listesalles.php?id='.$_SESSION['id']);
      }

      




        /*/else if (isset($_GET["link3"])) {
        header('Location: listesallesoff.php');
        }
       
        /if (isset($_POST['retourbutton']) OR isset($_GET["click"]) OR (isset($_GET["link1"]))OR (isset($_GET["link2"]))
        OR (isset($_GET["link3"]))) {
        $rselection = "0";
        $insertvalsalle = $bdd->prepare("UPDATE salles SET selectedroom = ?");
        $insertvalsalle->execute(array($rselection));
        }
        // ALTERNATIVE :  SUR CHAQUE DéBUT DE PAGE METTRE LE CODE CI-DESSUS /*/

        ?>
      </div>

    </header>

    <!-- HEADER -->

    <body>

      <h1><?php echo $donnees['nomsalle']; ?> </h1>

      <div class="flex-container">


        <div align="center "class="sallen"><br>60 places<br> capteurs[...]

          <form method="post"><input type="submit" name="subs" class="btn1" value=<?php echo $btns1reserver; ?>></a></form></div>



        </div>

        <form method="post"><input type="submit" name="retourbutton" value="Retour vers le profil" /></form>
        <form method="post"><input type="submit" name="retourbuttonsch" value="Retour vers la liste des salles" /></form>

        <?php
        if(isset($msg)) {
          echo '<font color="red">'.$msg."</font>";
        }


        ?>


      </body>
      </html>
      <?php   
    }
    else {
     header("Location: connexion.php");
   }

   ?>



