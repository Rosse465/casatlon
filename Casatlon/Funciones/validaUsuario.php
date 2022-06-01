<?php
    session_start();
    require "BDs.php";
    $con=conect();

    $user=$_REQUEST['user']; //correo
    $pass=$_REQUEST['pass'];
    //$passEnc=md5($pass);

    $sql="SELECT * FROM participantes
           WHERE codigo='$user' AND password='$pass'";
        
    $res=$con->query($sql);
    $num=$res->num_rows;

    if($num){
        $row=$res->fetch_array();
        $codigoU=$row["codigo"];
        $nombre=$row["nombre"];
        $correo=$row["correo"];
        $contra=$row["password"];
        $usuario=$row["tipo_user"];

        $_SESSION['codigoU']=$codigoU;
        $_SESSION['nombre']=$nombre;
        $_SESSION['correo']=$correo;
        $_SESSION['contra']=$contra;
        $_SESSION['user']=$usuario;
    }
    
    echo $num;

?>