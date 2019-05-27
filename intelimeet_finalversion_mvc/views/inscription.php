<?php




if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      
      if($pseudolength <= 255) {
         $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
         $reqpseudo->execute(array($pseudo));
         $pseudoexist = $reqpseudo->rowCount();
            
         if($pseudoexist == 0) {
         
            if($mail == $mail2) {
            
               if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                  $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                  $reqmail->execute(array($mail));
                  $mailexist = $reqmail->rowCount();
            
                  if($mailexist == 0) {
            
                     if($mdp == $mdp2) {
                        $isadmin=0;
                        $adminreq=0;
                        $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse,isadmin,adminreq) VALUES(?, ?, ?,?,?)");
                        $insertmbr->execute(array($pseudo, $mail, $mdp, $isadmin,$adminreq));
                        $erreur = "Votre compte a bien été créé ! <a href=\"index.php?action=goto_connexion\">Me connecter</a>";
            
                     } else {
                        $erreur1 = "";//"Vos mots de passes ne correspondent pas !";
                     }
            
                  } else {
                     $erreur2 = "";//"Adresse mail déjà utilisée !";
                  }
            
               } else {
                  $erreur3 = "";//Votre adresse mail n'est pas valide !";
               }
         
            } else {
               $erreur4 = "";//"Vos adresses mail ne correspondent pas !";
            }
         }else{
            $erreur5 = "";//"Pseudo déja utilisé !";
        }    
      
      } else {
         $erreur6 = "";//"Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   
   } else {
      $erreur7 = "";//"Tous les champs doivent être complétés !";
   }
}


?>

<!-- HEADER -->

<html>
<head>
  <?php
    require('views/header.php');
    ?>
</head>

<!-- HEADER -->

   <body>
      <div align="center">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td >
                     <br />
                     <input type="submit" name="forminscription" class="retourbouton"value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         //require('isset.php');

         ?>
      </div>
   </body>
   <?php
   require('views/footer.php');
   ?>

</html>