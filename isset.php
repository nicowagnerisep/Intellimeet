<?php
if(isset($erreur1)) {
  ?>
  <script>
    alert("Mauvais mail ou mot de passe !");
  </script>
  <?php
}else if (isset($erreur2)) {
  ?>
  <script>
    alert("Tous les champs doivent être complétés !");
  </script>

  <?php
}
else if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>"; //compte bien crée incription.php

          }else if(isset($erreur8)) {
            ?>
            <script>
              alert("Vos mots de passes ne correspondent pas !");
            </script>
            <?php
          }else if (isset($erreur7)) {
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
          }else if(isset($_POST['retourbutton'])){
            header('Location: profil.php?id='.$_SESSION['id']);   
          }else if (isset($_GET["click"])) {
            header('Location: profil.php?id='.$_SESSION['id']);
          }else if (isset($_POST['retourbuttonsch'])){
            header('Location: listesalles.php?id='.$_SESSION['id']);
          } 

          else if(isset($erreur13)) {
            echo $erreur13;
          }else if(isset($erreur9)) {
            ?>
            <script>
              alert("Vous n'avez pas entré un nombre valide dans la deuxième case");
            </script>
            <?php
          }else if (isset($erreur10)) {
            ?>
            <script>
              alert("Nom de salle déjà utilisée !");
            </script>

            <?php
          }else if(isset($erreur11)) {
            ?>
            <script>
              alert("Le nom de la salle ne doit pas dépasser 255 caractères");
            </script>
            <?php
          }else if (isset($erreur12)) {
            ?>
            <script>
              alert("Tous les champs doivent être complétés !");
            </script>
            <?php
          }

          ?>



