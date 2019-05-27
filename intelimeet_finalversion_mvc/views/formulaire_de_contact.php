	<?php
	session_start();
	dbConnect();

	if(isset($_POST['mailform']))
	{
		if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
		{
			$header="MIME-Version: 1.0\r\n";
			$header.='Content-Type:text/html; charset="uft-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';
			$mail=htmlspecialchars($_POST['mail']);
			$texte=htmlspecialchars($_POST['message']);
			$req= $bdd->prepare("INSERT INTO messages(mail, texte) VALUES(?,?)");
			$req->execute(array($mail, $texte));
			$reqticket = $bdd->query("SELECT * FROM messages ");

			$nbticket=$reqticket->rowCount();
			$texte = $texte."<br><br>mail de l'expéditeur : ".$mail."<br>pseudo : ".$_POST['nom']."<br>ticket : ".$nbticket;
			$textuser="Bonjour ".$_POST['nom'].",<br><br>

			Nous avons bien reçus votre message et nous le traîterons dans les plus brefs delais. Il faut compter environ deux jours afin que nous revenions vers vous pour vous apporter une réponse.<br>
			L'équipe Intellimeet vous remercie pour votre message et vous recontacteras bientôt.<br><br>

			Cordialement,
			l'équipe Intellimeet<br><br>

			numéro de ticket : ".$nbticket."";


			mail("intellimeet2021@gmail.com", "CONTACT - Monsite.com", $texte, $header);
			$msg="Votre message a bien été envoyé !";
			mail($mail, "SAV Intellimeet - Accusé de réception TICKET[".$nbticket."]", $textuser, $header);
		}
		else
		{
			$msg="Tous les champs doivent être complétés !";
		}
	}
	?>
	<title>formulaire de contact</title>
	<html>
	<head>
	<?php
	require('views/header.php');
	?>
	
</head>






	<body >
		<div align="center">
		<h2>Formulaire de contact </h2>
		<br>
		<br>
		<class align= "center">
		Pour toute assistance ou remarque, merci d'utiliser ce formulaire, nous vous répondrons dans les plus brefs délais.</class><br>
		

<br><br>
		<div class="page">
     <form method="post">
  <div class="page__demo">
    <label class="field a-field a-field_a1 page__field">
      <input name="nom" class="field__input a-field__input" placeholder="e.g. Thomas" required >
      <span class="a-field__label-wrap">
        <span class="a-field__label">Pseudo</span>
      </span>
    </label>&nbsp;&nbsp;&nbsp;&nbsp;

    <label class="field a-field a-field_a2 page__field">
      <input name="mail" class="field__input a-field__input" placeholder="e.g. thomas@gmail.com" required>
      <span class="a-field__label-wrap">
        <span class="a-field__label">Votre email</span>
      </span>
    </label> <br><br><br>
    <label class="field a-field a-field_a3 page__field">
      <textarea name="message" rows="60" cols="50" class="field__input a-field__input" placeholder="ici votre texte" required></textarea>
      <span class="a-field__label-wrap">
        <span class="a-field__label">Commentaire</span>
      </span>
    </label><br><br><br>
  </div>
</div><br>

					

          
					<button class="demande-admin" value="Envoyer "  name="mailform"/>Envoyer <img src="views/ressources/planeimg.png" height="25" width="25" align="center">
				</button></form><br><br>


				
				
				<?php
				if(isset($msg))
				{
					echo $msg;
				}
				?>
			</div>
		</div>
		</body>
		<?php
		require('views/footer.php');
		?>
		</html>