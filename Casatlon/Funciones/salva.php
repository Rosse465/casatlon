<?php
require "BDs.php";
$con=conect();

$codigo=$_REQUEST['codigo'];
$nombre=$_REQUEST['nombre'];
$correo=$_REQUEST['correo'];
$pass=$_REQUEST['pass'];
$sexo=$_REQUEST['sexo'];

if($pass=='admin123'){
      $tipo_user=1;
      
}else{
      $tipo_user=0;
      
}

      $sql="INSERT INTO participantes
            (codigo, nombre, correo, password, sexo, tipo_user)
            VALUES ($codigo, '$nombre', '$correo', '$pass', $sexo, $tipo_user)";

      $res=$con->query($sql);

      $query="INSERT INTO carrera
            (id_participante, nombre_carrera)
            VALUES ($codigo, 'CUCEI-21')";

      $race=$con->query($query);

      header("Location: ../ranking.php");

?>