<?php
require "BDs.php";
$con=conect();

$distancia=$_REQUEST['distancia'];
$tiempo=$_REQUEST['tiempo'];
$velocidad=($distancia/$tiempo);

$ban=0;

    if($velocidad < 730){
        echo 0;
    }else{
        echo 1;
    }
    
?>