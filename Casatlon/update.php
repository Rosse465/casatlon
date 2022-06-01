<?php

//elimina logicamente
require "Funciones/BDs.php";
$con=conect();

//recibe variables
$codigo=$_REQUEST['codigo'];
$nombre=$_REQUEST['nombre'];
$correo=$_REQUEST['correo'];
$pass=$_REQUEST['password'];
$sexo=$_REQUEST['sexo'];
$passEnc=md5($pass);

$sql="UPDATE participantes
      SET nombre='$nombre', Correo='$correo', password='$passEnc', sexo=$sexo
      WHERE codigo=$codigo";

$res=$con->query($sql);

header("Location: ranking.php");

?>