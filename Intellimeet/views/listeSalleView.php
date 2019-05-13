<!DOCTYPE html>
<html>
<head>
    <style>

        /*:root {

          --colors2: red;
          --colors3: green;
          --colors4: green;
          --colors5: green;
          --colors6: red;
          --colors7: green;
          --colors8: red;
        } */

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            /*background-color: #f1f1f1;*/
        }

        .flex-container > div.salle1 {
            border-radius : 7px;
            background-color: <?php echo $colors1; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;
        }
        .flex-container > div.salle2 {
            border-radius : 7px;
            background-color: <?php echo $colors2; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }
        .flex-container > div.salle3 {
            border-radius : 7px;
            background-color: <?php echo $colors3; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }
        .flex-container > div.salle4 {
            border-radius : 7px;
            background-color: <?php echo $colors4; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }
        .flex-container > div.salle5 {
            border-radius : 7px;
            background-color: <?php echo $colors5; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }
        .flex-container > div.salle6 {
            border-radius : 7px;
            background-color: <?php echo $colors6; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }
        .flex-container > div.salle7 {
            border-radius : 7px;
            background-color: <?php echo $colors7; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }
        .flex-container > div.salle8 {
            border-radius : 7px;
            background-color: <?php echo $colors8; ?>;
            color: white;
            width: 400px;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            font-size: 30px;

        }

    </style>
</head>
<title>Liste des salles</title>
<body>

<h1>Liste des salles</h1>

<div class="flex-container">


    <div class="salle1">Salle 1 <br>60 places<br>

        <form method="post"><input type="submit" name="subs1" value=<?php echo $btns1reserver; ?>></a></form></div>
    <div class="salle2">Salle 2 <br>60 places<br>
        <form method="post"><input type="submit" name="subs2" value=<?php echo $btns2reserver; ?>></a></form></div>
    <div class="salle3">Salle 3 <br>40 places<br>
        <form method="post"><input type="submit" name="subs3" value=<?php echo $btns3reserver; ?>></a></form></div>
    <div class="salle4">Salle 4 <br>40 places<br>
        <form method="post"><input type="submit" name="subs4" value=<?php echo $btns4reserver; ?>></a></form></div>
    <div class="salle5">Salle 5 <br>40 places<br>
        <form method="post"><input type="submit" name="subs5" value=<?php echo $btns5reserver; ?>></a></form></div>
    <div class="salle6">Salle 6 <br>40 places<br>
        <form method="post"><input type="submit" name="subs6" value=<?php echo $btns6reserver; ?>></a></form></div>
    <div class="salle7">Salle 7 <br>20 places<br>
        <form method="post"><input type="submit" name="subs7" value=<?php echo $btns7reserver; ?>></a></form></div>
    <div class="salle8">Salle 8 <br>20 places<br>
        <form method="post"><input type="submit" name="subs8" value=<?php echo $btns8reserver; ?>></a></form></div>


</div>

<?php
if(isset($msg)) {
    echo '<font color="red">'.$msg."</font>";
}
?>
<br><br>
<a href="profil.php">Retour profil</a>

</body>
</html>