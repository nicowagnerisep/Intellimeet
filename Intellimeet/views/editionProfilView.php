
<html>
<head>
    <title>TUTO PHP</title>
    <meta charset="utf-8">
</head>
<body>
<div align="center">
    <h2>Edition de mon profil</h2>
    <div align="left">
        <form method="POST" action="" enctype="multipart/form-data">
            <label>Pseudo :</label>
            <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
            <label>Mail :</label>
            <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
            <label>Mot de passe :</label>
            <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
            <label>Confirmation - mot de passe :</label>
            <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
            <input type="submit" value="Mettre à jour mon profil !" />
        </form>
        <?php if(isset($msg)) { echo $msg; } ?>
    </div>
</div>
<?php
if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
    ?>
    <br />
    <a href="profil.php">Retour vers le profil</a>
    <?php
}
?>

</body>
</html>