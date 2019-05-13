<?php
require './controller/userControllers.php';


function userSwitch($param){

    switch ($param[2])
    {
        case 'all':
            userGetAll();
            break;
        case 'id':
            userGetById(7);
            break;
        default:
            echo 'executed default in userSwitch';

    }
}