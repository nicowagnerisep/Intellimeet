<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', 'root');


$reponse = $bdd->query('SELECT etat FROM salles');
$t=1;
while ($donnees = $reponse->fetch())
{
  if($donnees['etat']==0){
    
    $color='green';
    switch ($t) {
    case 1:
        $colors1=$color;
        
        break;
    case 2:
        $colors2=$color;
        
        break;
    case 3:
        $colors3=$color;
        
        break;
    case 4:
        $colors4=$color;
        
        break;
    case 5:
        $colors5=$color;
        
        break;
    case 6:
        $colors6=$color;
        
        break; 
    case 7:
        $colors7=$color;
        
        break;
    case 8:
        $colors8=$color;
        
        break;    
    }
    $t++;
    
    }else{
      
      $color='red';
     switch ($t) {
    case 1:
        $colors1=$color;
        
        break;
    case 2:
        $colors2=$color;
        
        break;
    case 3:
        $colors3=$color;
        
        break;
    case 4:
        $colors4=$color;
        
        break;
    case 5:
        $colors5=$color;
        
        break;
    case 6:
        $colors6=$color;
        
        break; 
    case 7:
        $colors7=$color;
        
        break;
    case 8:
        $colors8=$color;
        
        break;    
    }
      $t++;
    }
}
$reponse->closeCursor();








}catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
<style>


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

    <form method="post"></form></div>
  <div class="salle2">Salle 2 <br>60 places<br> 
    <form method="post"></form></div>
  <div class="salle3">Salle 3 <br>40 places<br>  
    <form method="post"></form></div> 
  <div class="salle4">Salle 4 <br>40 places<br>  
    <form method="post"></form></div>
  <div class="salle5">Salle 5 <br>40 places<br>  
    <form method="post"></form></div>
  <div class="salle6">Salle 6 <br>40 places<br>  
    <form method="post"></form></div>
  <div class="salle7">Salle 7 <br>20 places<br>  
    <form method="post"></form></div> 
  <div class="salle8">Salle 8 <br>20 places<br>  
    <form method="post"></form></div>
 
</div>

<?php
    if(isset($msg)) {
        echo '<font color="red">'.$msg."</font>";
        }
?>



</body>
</html>



