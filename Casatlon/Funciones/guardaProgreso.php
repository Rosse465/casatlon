<?php
require "BDs.php";
$con=conect();

$fecha=date("Y-m-d");
$dia=date("d");
$mes=date("m");
$ano=date("Y");

$codigo=$_REQUEST['codigo'];
$distancia=$_REQUEST['distancia'];
$tiempo=$_REQUEST['tiempo'];
$carrera=$_REQUEST['carrera'];

$carrera_txt="CUCEI-21";


$velocidad=$distancia/$tiempo;

      $sql="UPDATE participantes
            SET distancia=$distancia, tiempo=$tiempo, velocidad=$velocidad
            WHERE codigo=$codigo";

      $res=$con->query($sql);

      $query="UPDATE carrera
            SET nombre_carrera=$ano
            WHERE codigo=$codigo";

      $race=$con->query($query);

      $form="INSERT INTO formulario
            (cod_user, distancia, tiempo)
            VALUES ($codigo, $distancia, $tiempo)";

      $formu=$con->query($form);
      
      //echo $res;
      header('Location: ../ranking.php');


?>