<?php
require "connectbdd.php";

if($user['isadmin']==1){
  require('views/headeradmin.php');
  
}else{
  require('views/headernormal.php');
  
}










