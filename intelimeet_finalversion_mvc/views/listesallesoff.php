<?php


session_start();
require('views/connectbdd.php');





if(isset($_SESSION['id'])){

$requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
$requser->execute(array($_SESSION['id']));
$user = $requser->fetch();
}

?>


<!-- HEADER -->

<html>
<head>
  <?php
  require('views/header.php');
  ?>
  
  <style>
    .flex-container {
      display: flex;
      flex-wrap: wrap;
      /*background-color: #f1f1f1;*/
    }
    a.accessalle{
      color: black;
      text-decoration:none;
      font-style: normal;
      z-index: 1;
    }

    
    div.accessalle{
      color:black;
      
    }




  </style>
</head>


  <!-- HEADER -->

  <body>

    <h1>Liste des salles</h1>

    <form method="POST" action="">
      <div class="flex-container">

        <!--- 1 MODIF 14/05/////////////////////-->
        <?php 

        
        



        $reqhg = $bdd->query('SELECT nomsalle FROM salles');
        while ($donneeh = $reqhg->fetch()) {

          $reqbis = $bdd->query('SELECT * FROM salles WHERE nomsalle ="'.$donneeh['nomsalle'].'"');
          $donneehbis = $reqbis->fetch();
          $name_unstick=str_replace('_',' ', $donneehbis['nomsalle']);
          



          //$reqh = $bdd->query('SELECT * FROM salles WHERE id="'.$th.'"');
          //$donneeh=$reqh->fetch();

          if(isset($_SESSION['id'])){
            if ($donneehbis['etat']=='1') {
              ?>
              <style>
                .modifdiv {
                  border-radius : 7px;
                  background-image :url(views/ressources/reupleine.png); 
                  
                  color: black;
                  background-size: cover;
                  width: 400px;
                  margin: 10px;
                  text-align: center;
                  line-height: 50px;
                  font-size: 30px;·
                }

              </style>


              <?php
              if ($user['pseudo']==$donneehbis['pseudo_id']) {
                ?>
                <div class="modifdiv" ><div class="accessalle"><a class="accessalle"  href= <?php echo "index.php?action=goto_salleN&c={$donneeh['nomsalle']}"; ?> >
                  <?php echo $name_unstick; ?> <br> <?php echo $donneehbis['nbplaces']; ?> places<br>
                  Modifier réservation <br> </a></div></div>

                  <?php 
                }else{
                  ?>
                  <div class=<?php echo $donneeh['nomsalle']; ?>><?php echo $name_unstick; ?> <br><?php echo $donneehbis['nbplaces']; ?> places<br> Réservé par <?php echo $donneehbis['pseudo_id']; ?> 
                  <br></div>

                  <?php
                } 
              }else{

                ?>
                <style>
                  .flex-container > div.<?php echo $donneeh['nomsalle'];?> {
                    border-radius : 7px;
                    background-image :url(http://espace-rosenwald.com/wp-content/uploads/2010/10/Reunion-Video.gif);
                    
                    color:black;
                    width: 400px;
                    margin: 10px;
                    text-align: center;
                    line-height: 50px;
                    font-size: 30px;
                  }
                </style>


                <div class=<?php echo $donneeh['nomsalle']; ?>><a class="accessalle"  href= <?php echo "index.php?action=goto_salleN&c={$donneeh['nomsalle']}"; ?> >
                  <?php echo $name_unstick; ?> <br><?php echo $donneehbis['nbplaces']; ?> places<br>
                  Détails de la salle<br> </a></div>

                  <?php 


                }
                
              }
              ////////////////////////
              else{
                if($donneehbis['etat']=='1') {
                  ?>
                  <style>
                    .flex-container > div.<?php echo $donneeh['nomsalle'];?> {
                      border-radius : 7px;
                      background-image :url(views/ressources/reupleine.png); 
                      /*-webkit-filter: blur(2px);*/
                      color: black;
                      background-size: cover;
                      width: 400px;
                      margin: 10px;
                      text-align: center;
                      line-height: 50px;
                      font-size: 30px;·
                    }
                  </style>



                  <div class=<?php echo $donneeh['nomsalle']; ?>><?php echo $name_unstick; ?> <br><?php echo $donneehbis['nbplaces']; ?> places<br> Réservé par <?php echo $donneehbis['pseudo_id']; ?> 
                  <br></div>

                  <?php
                }else{

                  ?>
                  <style>
                    .flex-container > div.<?php echo $donneeh['nomsalle'];?> {
                      border-radius : 7px;
                      background-image :url(http://espace-rosenwald.com/wp-content/uploads/2010/10/Reunion-Video.gif);
                      
                      color: black;
                      width: 400px;
                      margin: 10px;
                      text-align: center;
                      line-height: 50px;
                      font-size: 30px;
                    }
                  </style>



                  <div class=<?php echo $donneeh['nomsalle']; ?>><a class="accessalle"  href="index.php?action=goto_salleN&c={$donneeh['nomsalle']}" >
                    <?php echo $name_unstick; ?> <br><?php echo $donneehbis['nbplaces']; ?> places<br>
                    Détails de la salle<br> </a></div>

                    <?php 


                  }

                }
              ///////////
              }


              ?>
              <!--- 1 MODIF 14/05 /////////////////////-->
            </div>

              
              <?php
              if(isset($_SESSION['id'])){
              ?>
              <div align="center">
              <form method="post"><input type="submit" class="retourbouton" name="retourbutton" value="Retour vers le profil" /></form></div>

              <?php
              }
          


              
              if(isset($msg)) {
                echo '<font color="red">'.$msg."</font>";
              }

              ?>


            </body>

            </html>


