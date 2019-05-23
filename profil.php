<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
 $getid = intval($_GET['id']);
 $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
 $requser->execute(array($getid));
 $userinfo = $requser->fetch();
 require('isset.php');

 if(isset($_POST['adminbtn'])){
  $adminreq=1;
  $req= $bdd->prepare("UPDATE membres SET adminreq =? WHERE mail = '".$userinfo['mail']."'");
  $req->execute(array($adminreq));
}



?>

<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" >
  <title>IntelliMeet</title>
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
      <li><a href="#">Réunions en cours</a></li>
      <li><a href="userdefaults.php">Mes paramètres</a></li>
    </ul>
  </li>
  <li><a href="intellimeet.php">Notre équipe</a>
  </li>
  <li><a href="formulaire_de_contact.php">Contact et SAV</a>
  </li>


</ul>
</div>

    <div id="login">
      <ul>
       <li><a href="#"><?php echo $userinfo['pseudo']; ?></a></li>
       <li><a href="deconnexion.php"> Déconnexion </a></li>


  
     </div>

     <script>
      function demandeAdmin(){


        alert("Demande d'admin envoyée");
      }

    </script> 

  </header>





  <body>
    <div align="center">
     <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
     <br /><br />
     Pseudo = <?php echo $userinfo['pseudo']; ?>
     <br />
     Mail = <?php echo $userinfo['mail']; ?>
     <br />
     Type de compte = <?php if($userinfo['isadmin']==1){echo "<font color='gold'>administrateur </font>";}else{echo "<font color='lime'>utilisateur</font>";} ?>
     <br />
     <?php
     if($userinfo['id'] == $_SESSION['id']) {
           // isset($_SESSION['id']) AND 
       ?>
       <br />
       <a href="editionprofil.php">Editer mon profil</a>
       <a href="deconnexion.php">Se déconnecter</a>
       <a href="listesalles.php">Liste des salles</a>
       <a href="listesalleMODIFENCOURS.php">Liste des salles en edit </a>


       <?php
       if($userinfo['adminreq']==1){
        echo "<br />\n <font color='red'><I>Demande admin envoyée </I></font><br />\n";
      }else if($userinfo['isadmin']!=1){
        ?>
        <form method="post"><button class="adminbtn" name="adminbtn" value="Demande pour devenir admin" onclick= "demandeAdmin()">Demande pour devenir admin</button></form>

        <?php

      }
      if($userinfo['isadmin']==1){
       ?>

       <div align="center">
         <p> demandes d'admin : </p><br>
         <?php
         $t=1;
         $btn="addbtn";
         $reqb = $bdd->query('SELECT * FROM membres');

         while ($data = $reqb->fetch()) {
           if($data['adminreq']==1){
             echo  '<font color="red">'.$data['mail'] . "</font><br />\n";
             ?>
             <form method='post'><button class='addbtn' name=<?php echo $data['id'];?> > ... </button></form>
             <?php
             if(isset($_POST[$data['id']])){
              echo "Voulez-vous vraiment modifer l'état de l'utilisateur {$data['mail']} en admin ?"."<br />\n";

            }



          }
          $t++;


        }




        ?>




      </div>



      <?php
    }  
  }
  ?>
</div>
</body>
<?php 
require('footer.php');
?>

</html>
<?php   
}
?>