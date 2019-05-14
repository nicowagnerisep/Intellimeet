<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');

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
                        $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                        $insertmbr->execute(array($pseudo, $mail, $mdp));
                        $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
            
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
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!-- HEADER -->

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
   <li><a href="connexion.php">Login</a></li>
</div>

</header>

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
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }else if(isset($erreur1)) {
        ?>
        <script>
          alert("Vos mots de passes ne correspondent pas !");
        </script>
        <?php
        }else if (isset($erreur2)) {
          ?>
          <script>
          alert("Adresse mail déjà utilisée !");
        </script>
        
        <?php
        }else if(isset($erreur3)) {
        ?>
        <script>
          alert("Votre adresse mail n'est pas valide !");
        </script>
        <?php
        }else if (isset($erreur4)) {
          ?>
          <script>
          alert("Vos adresses mail ne correspondent pas !");
        </script>
        
        <?php
        }else if(isset($erreur5)) {
        ?>
        <script>
          alert("Pseudo déja utilisé !");
        </script>
        <?php
        }else if (isset($erreur6)) {
          ?>
          <script>
          alert("Votre pseudo ne doit pas dépasser 255 caractères !");
        </script>
        
        <?php
        }else if (isset($erreur7)) {
          ?>
          <script>
          alert("Tous les champs doivent être complétés !");
        </script>
        
        <?php
        }

         ?>
      </div>
   </body>

   <footer>

<div id ="footerleft">
Mentions légales
<br/>
Breadcrumbs 

</div>

<div id ="footermiddle">
Domisep

</div>


<div id= "footerright">

<?php
//heure
function showtime(){
date_default_timezone_set("Europe/Paris");
echo "" . date("d/m/Y") . "<br>";
echo "" . date("h:i:s");
}
showtime();
?>
<br/>
<br/>
<strong>Contact</strong>
</div>

</footer>







</html>