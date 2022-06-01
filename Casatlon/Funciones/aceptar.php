<?php

    require "BDs.php";
    $con=conect();

    $codigo=$_REQUEST['codigo'];

    $sql="UPDATE participantes
      SET aceptado=1
      WHERE codigo=$codigo";

    $res=$con->query($sql);
    
    echo 1;

    /*
      $sql="DELETE Administradores WHERE id=$id";
    */
?>