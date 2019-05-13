<?php

define('PROJECT_PATH','/fun');

$url = $_SERVER['REQUEST_URI'];
$relativeUrl = str_replace(PROJECT_PATH, '',$url);
$param = explode('/', $relativeUrl);;

//var_dump($param);


switch ($param[1]) {
    case 'users':
        require './switch/userSwitch.php';
        userSwitch($param);
        break;
    case 'rooms':
        require './switch/roomSwitch.php';
        roomSwitch($param);
        break;
    default:
        echo 'default executed';


}