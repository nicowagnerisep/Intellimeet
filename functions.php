<?php


function isadmin($user,$fct){
	if($user['isadmin']==1){
		$fct();
	}
}



function delroom(){



	?>
	<form method="post"><button name="delbtn" onclick= "getConfirmation()">SUPPRIMER CETTE SALLE</button></form>

	<?php


}



function capteurs(){

	?>



	<p><h1>Domisep</h1></p>

	Choisissez ci-dessous les facteurs que vous voulez paramétrez.
	Si vous ne souhaitez rien paramétrez, cliquez sur "Terminé" en bas.
	<br>

	<ul>
		<li> <strong>Température</strong> <br>
			Valeur par défaut : 20 degrés. Vous pouvez renseigner n'importe quelle température entre 17 et 25 degrés.
			<form method="post">
				<p>
					<input type="text" name="Temp" placeholder="Température" />

				</p>

			</li>

			<img src="capteurs.png" style="float:right;padding-right: 5%;"/>

			<li> <strong>Luminosité</strong> <br>
				Entrez un pourcentage d'intensité. Valeur par défaut : 50%. <br> Vous pouvez renseigner n'importe quelle température entre 0% (lumières éteintes) et 100% (lumières au max).

				<p>
					<input type="text" name="Lum" placeholder="Luminosité" />

				</p>

			</li>

			<li> <strong>Ecran de projection</strong><br>

				Souhaitez que l'écran de projection soit baissé?

				<p>
					<input type="radio" name="screen" value="1" id="oui"  /> <label for="oui">Oui</label>
					<input type="radio" name="screen" value="0" id="non" /> <label for="non">Non</label>
				</p>

			</li>
		</ul>
		<br>
		<center>
			<input type="submit" name="capteurbtn" value="Terminé" />
		</form></center>
		<br>
		<br>
		Pour plus d'informations sur notre service, cliquez <strong><a= href=#>ici</a></strong>.



		<?php

	}



	?>
	<!-- //////////////////////////////// SCRIPT \\\\\\\\\\\\\\\\\\\\-->
	<script type = "text/javascript">

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

                  return true;

              } else {
              	alert("Manoeuvre annulée la salle n'a pas été supprimée.");
              }

          }

          function modifEtat(){


          	alert("L'état de la salle viens d'être modifié");
          }

      </script> 
      <!-- //////////////////////////////// SCRIPT \\\\\\\\\\\\\\\\\\\\-->

