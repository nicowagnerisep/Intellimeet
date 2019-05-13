<?php
session_start();


echo '<h1><a href="oldpagestoconvert/capteurssalle.php">GESTION DES CAPTEURS</a></h1>';

echo '<h1><a href="controllers/loginController.php">login</a></h1>';
define('PROJECT_PATH', '/Intellimeet');


$url = $_SERVER['REQUEST_URI'];

$param=parse_url($url);



switch ($url){
    case '':

}
