<?php
      require "BDs.php";
      $con=conect();

      $codigo=$_REQUEST['codigo'];
      $nombre=$_REQUEST['nombre'];
      $correo=$_REQUEST['correo'];
      $pass=$_REQUEST['password'];
      //$passEnc=md5($pass);
      
      
      if(empty($pass)){
            $actualizar="UPDATE participantes
                        SET nombre='$nombre', correo='$correo'
                        WHERE codigo=$codigo";
      }else{
            $actualizar="UPDATE participantes
                        SET nombre='$nombre', correo='$correo', password='$passEnc'
                        WHERE codigo=$codigo";
      }
            
      $res=$con->query($actualizar);

            header("Location: ranking.php");


?>

