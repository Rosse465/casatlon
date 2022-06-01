<?php

    require "BDs.php";
    $con=conect();

    $codigo=$_REQUEST['codigo'];

    $sql="UPDATE participantes
      SET eliminado=1 AND status=0
      WHERE codigo=$codigo";

    $res=$con->query($sql);
    
    echo 1;

    /*
      $sql="DELETE Administradores WHERE id=$id";
    */
?>