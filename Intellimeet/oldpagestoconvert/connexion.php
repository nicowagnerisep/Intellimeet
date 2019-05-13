<?php
#DONE



#$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

require '../models/dbConnect.php';

?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
         <br>
         <a href="inscription.php">Pas encore inscrit ?</a>
      </div>
   </body>
</html>