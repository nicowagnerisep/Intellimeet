<?php
require './model/dbConnect.php';


function roomGetAll()
{
    $users = dbConnect::query('SELECT * FROM user');
    require './view/userView.php';
}

function roomGetById($id)
{
    $user = dbConnect::query('SELECT * FROM user WHERE id_user='.$id)[0];
    var_dump($user);
    require './view/singleUser.php';
}

