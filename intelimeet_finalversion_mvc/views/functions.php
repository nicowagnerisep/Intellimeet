
<script type="text/javascript">


        //document.getElementById("del").style.visibility = "hidden";


        function getConfirmation() {
               //var txt;

               var retVal = confirm("VOULEZ VOUS VRAIMENT SUPPRIMER LA SALLE ? CECI ENTRAÎNERA LA SUPPRESSION DE TOUTES LES DONNÉES RELATIVES À CELLE-CI ");
               if( retVal == true ) {


                  //txt= "Enrez votre mot de passe pour finaliser la supression";
                  //document.getElementById("del").innerHTML = txt;
                  
                  //document.getElementById("del").style.visibility = "visible";
                  
                  //var txt='true';
                  //<?php  $vardel; ?>=txt; 
                  alert("Salle supprimée");
                  //<?php
                  

                  //$delreq = $bdd->prepare('DELETE * FROM salles WHERE nomsalle ="'.$namesa.'"');
                  //?>
                  
                  

                  return true;

              } else {
              	alert("Manoeuvre annulée la salle n'a pas été supprimée.");
              }

          }
          function getConfirmationOk() {
          	alert("Salle supprimée");
          }
          function getConfirmationNo(){
          	alert("Manoeuvre annulée la salle n'a pas été supprimée");

          }

          function modifEtat(){


          	alert("L'état de la salle viens d'être modifié");
          }

          function demandeAdmin(){


          	alert("Demande d'admin envoyée");
          }
          

      </script> 
      <!-- //////////////////////////////// SCRIPT \\\\\\\\\\\\\\\\\\\\-->

