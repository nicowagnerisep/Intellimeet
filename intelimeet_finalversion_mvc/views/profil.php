<?php
session_start();
require "connectbdd.php";




if(isset($_SESSION['id'])){
 $getid = intval($_SESSION['id']);
 $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
 $requser->execute(array($getid));
 $userinfo = $requser->fetch();
 require('views/isset.php');

 if(isset($_POST['adminbtn'])){
  $adminreq=1;
  $req= $bdd->prepare("UPDATE membres SET adminreq =? WHERE mail = '".$userinfo['mail']."'");
  $req->execute(array($adminreq));
  header('Location: index.php?action=goto_profil');
}



?>

<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="views/css/style.css" >
  <title>IntelliMeet</title>
</head>

<body>


  <header>


    <li><a href="index.php?action=goto_scratch"><img src="views/ressources/IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/></a></li>
<!-- <li><a href="?click=1"><img src="IntelliMeet_Logo_JPG_New.jpg" class="imageheader" height="100%"" alt="Logo"/></a></li>
<?php
        if (isset($_GET["click"])) {
                 
        header('Location: profil.php?id='.$_SESSION['id']);
        }
      
        ?> -->


        <div id="menu">
<ul>
  <li><a href="index.php?action=goto_scratch">Accueil</a></li>
  <li><a href="index.php?action=goto_listesallesoff">Réserver</a>
    <?php
    if($userinfo['isadmin']==1){

    ?>
    <ul>

           <li> <a href="index.php?action=goto_createroom"><span>Ajouter une salle</span></a></li>
          </ul>
    <?php
  }
    ?>
  <li><a href="index.php?action=goto_intellimeet">Notre équipe</a>
  </li>
  <li><a href="index.php?action=goto_formulaire_de_contact">Contact et SAV</a>
  </li>


</ul>
</div>

    <div id="login">
      <ul>
       <li><a href="#"><?php echo $userinfo['pseudo']; ?></a></li>
       <li><a href="index.php?action=goto_deconnexion"> Déconnexion </a></li>


  
     </div>
     <style>
     <?php
     require('views/css/stylebouton.css');
     ?>
   </style>

    

  </header>





  <body>
    <div align="center">
     <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
     <br /><br />
     Pseudo = <?php echo $userinfo['pseudo']; ?>
     <br /><br>
     Mail = <?php echo $userinfo['mail']; ?>
     <br /><br>
     Type de compte = <?php 
     if($userinfo['isadmin']==1)
      {echo "<font color='gold'>administrateur <br><br></font>";}
     else{echo "<font color='lime'>utilisateur</font>";} ?>
     
     <?php
     if($userinfo['adminreq']==1){
        $msg= "<br />\n <font color='red'><I>Demande admin envoyée </I></font><br />\n";
      }else if($userinfo['isadmin']!=1){
        ?>
        <form method="post"><button class="adminreq" name="adminbtn" value="Demande pour devenir admin" onclick= "demandeAdmin()">Demande pour devenir admin</button></form>

        <?php

      }
     if(isset($msg)){
      echo $msg;
     }
     ?>
     <?php
     if($userinfo['id'] == $_SESSION['id']) {
           // isset($_SESSION['id']) AND 
       ?>
       <br />
       <a href="index.php?action=goto_editionprofil">Editer mon profil</a>
       <a href="index.php?action=goto_deconnexion">Se déconnecter</a>
       
       <a href="index.php?action=goto_listesallesoff">Liste des salles </a>


       <?php
      if($userinfo['isadmin']==1){
       ?>

       <div align="center">
         <p> demandes d'admin : </p><br>
         <?php
         $t=1;
         $btn="addbtn";
         $reqb = $bdd->query('SELECT * FROM membres');

         while ($data = $reqb->fetch()) { ////////// boucle 
           if($data['adminreq']==1){

             echo  '<font color="red">'.$data['mail'] . "</font><br />\n";
             ?>

             <!--<form method='post'><button class='addbtn' name=<?php echo $data['id'];?> > ... </button></form>-->
             
             
              <table>
                <tr>
                  <td><!---checkbox-->
              <input type="checkbox" id="checkbox"  name="checkad" value=<?php echo $data['id'];?> />
            </td>
            <td>
              <label for="checkbox">autoriser</label>
            </td>
          </tr>
        </table>

             <?php
             
             if($_POST['checkad']==$data['id']){
              $valreq=0;
              $insertadminvalue = $bdd->prepare("UPDATE membres SET adminreq = ? WHERE id =  '".$data['id']."'");
              $insertadminvalue->execute(array($valreq));
              $valadmin=1;
              $insertadminvalue = $bdd->prepare("UPDATE membres SET isadmin = ? WHERE id =  '".$data['id']."'");
              $insertadminvalue->execute(array($valadmin)); 
              //echo "checbox".$data['id'];


             }
             

          } //si demande d'admin 
          $t++;


        }// boucle while 



        ?>
        <form method="post"><input type="submit" class="retourbouton" name ="addadminbtn" value="Approuver les demandes sélectionnées" /></form>



      </div>



      <?php
    }

    //checkbox back 

    


  } //condition session = nom profil 
  ?>
</div>
</body>
<?php 
require('views/footer.php');
?>

</html>
<?php   
}else {
   header("Location: index.php?action=goto_connexion");
 }
?>