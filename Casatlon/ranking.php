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

    <title>Rankings</title>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos-ranking.css">
    
</head>
    
<body>
    
    <section class="INDEX">
        
        <a href="progreso.php"><p id="link" style="padding: 20px;">Ingresar información de carrera</p></a>
        

        <table>
            <tr><td colspan="5" style="font-size: 30px"><b>Carrera CUCEI-21</b></td></tr>
            <tr>
                <td>&nbsp&nbspId &nbsp&nbsp</td>
                <td>Nombre completo</td>
                <td>Distancia</td>
                <td>Tiempo</td>
                <td>Velocidad</td>
            </tr>

            <?php
            
                $sql="SELECT * FROM participantes
                    WHERE tipo_user=0 AND codigo!='' AND aceptado=1";

                $res=$con->query($sql);
                $cont=0;
                $pos=0;
                while($row=$res->fetch_array()){
                    $codigo=$row["codigo"];
                    $nombre=$row["nombre"];
                    $distancia=$row["distancia"];
                    $tiempo=$row["tiempo"];
                    $velocidad=$row["velocidad"];
                    
            

            
                echo "<tr id=\"row$cont\">
                
                    <td class='datos'>$codigo</td>
                    <td class='datos'> $nombre</td>
                    
                    <td class='datos'>$distancia metros</td>

                    <td class='datos'>$tiempo minutos</td>
                    <td class='datos'>$velocidad m/m</td>
                
                </tr>";
            
                $cont++;
            }
        ?>

        </table>
        </section>
</body>



</html>