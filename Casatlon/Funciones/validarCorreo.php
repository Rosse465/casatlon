<?php
require "BDs.php";
$con=conect();

$codigo=$_REQUEST['codigo'];
$correo=$_REQUEST['correo'];
$ban=0;

    $query="SELECT * FROM participantes
    WHERE (correo= '$correo' AND codigo != $codigo)";

    $res=$con->query($query);
    $num=$res->num_rows;
    
    echo $num;
  
?>