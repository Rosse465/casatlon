<?php 
    require "Funciones/lista_admins.php"; include "menu.php";

    session_start();
    if(!isset($_SESSION['codigoU'])){
        echo " 
            <script>
                window.location='index.php';
            </script>";   
        
    }

?>

<html>

<head>

    <title>Detalles del Admin</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <style type="text/css">
        a:link, a:visited, a:active {
            text-decoration:none;
        }
    </style>

</head>
    
<body style=" text-align: center">

    <section style="height: 45vh; background: url('css/img-perfil.png') no-repeat center top; background-size: cover; padding-top: 400px;">
    <a href="ranking.php" style="font-size: 20px; color: #fff;">Regresar a los rankings</a>
    
    
    <table style="border: solid 1px; width: 50%; margin: auto; background-color:#E3FBFD; margin-top: 70px;">
        <tr style="height: 50px;">
            <td style="text-align: center; font-size: 30px; border: solid 1px">Nombre completo</td>
            <td style="text-align: center; font-size: 30px; border: solid 1px">Correo</td>
            <td style="text-align: center; font-size: 30px; border: solid 1px">Sexo</td>
            <td style="text-align: center; font-size: 30px; border: solid 1px">Código</td>

        </tr>

        <?php
            
            $codigo=$_SESSION['codigoU'];
            $con=conect();

            $sql="SELECT * FROM usuarios
                WHERE codigo=$codigo";

            $res=$con->query($sql);

            while($row=$res->fetch_array()){
                $nombre=$row["nombre"];
                $correo=$row["correo"];
                $sexo=$row["sexo"];
                $sexo_txt=($sexo==1)?'Masculino':'Femenino';
            }

        
        echo "<tr>
            
            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$nombre </td>
            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$correo</td>

            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$sexo_txt</td>

            <td style='text-align: center; border: solid 1px; font-size: 25px;'>$codigo</td>
                        
            </td>

            </tr>";
        
       ?>

    </table>
    </section>
</body>

</html>