<?php
session_start();
require('connexionbdd.php');
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

		

		mail("intellimeet2021@gmail.com", "CONTACT - Monsite.com", $texte, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>

<html>
	<?php
	require('header.php');
	?>
</head>

<body>




	<body  align="center">
		<h2>Formulaire de contact !</h2>
		<div class="bodythomasv">
		<form method="POST" action="">
			<input type="text" name="nom" placeholder="Votre pseudo" style="width:190px" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
			<input type="email" name="mail" placeholder="Votre email" style="width:190px" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
			<textarea name="message" placeholder="Votre message" style="width:260px; height: 150px"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
			<input type="submit" value="Envoyer !" style="width:90px; height: 70px" name="mailform"/>
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
	</div>
	</body>
	<?php
	require('footer.php');
	?>
</html>