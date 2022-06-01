<?php 

    require "Funciones/lista_admins.php"; include "menu.php"; 

    session_start();
    //if(!isset($_SESSION['codigoU']) && $_SESSION['user']!=1)
    
    if( $_SESSION['user'] != 1 ){
        echo " 
            <script>
                alert('No eres un usuario válido');
                window.location='ranking.php';
            </script>";   
 //       header("Location: index.php");
        
        
    }


?>
<html>

<head>

    <title>Admin</title>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos-admin.css">
    
    <script>
        function aceptarRegistro(x){
            if(confirm("Seguro de aceptar el registro?")){
                $.ajax({
                url: 'Funciones/aceptar.php',
                type: 'post',
                dataType: 'text',
                data: 'codigo='+x,
                success: function(res){
                    
                    if(res==1){
                        $('#row'+x).hide();
                    }
                }, error: function(){
                    alert("Error, archivo no encontrado");
                }
            });
            }
        }

    </script>

</head>
    
<body>
    <section class="INDEX">
        <h1 style="padding-top: 10px;">Admin</h1>
            
        <table>
            <tr>
                <td>&nbsp&nbspCódigo &nbsp&nbsp</td>
                <td>Nombre completo</td>
                <td>Correo</td>
                <td>Distancia</td>
                <td>Tiempo</td>
                <td>Velocidad</td>
                <td>Acción</td>
            </tr>

            <?php
            
                $sql="SELECT * FROM participantes
                    WHERE codigo!='' AND tipo_user=0 AND aceptado=0";

                $res=$con->query($sql);
                $cont=0;
                while($row=$res->fetch_array()){
                    $codigo=$row["codigo"];
                    $nombre=$row["nombre"];
                    $correo=$row["correo"];
                    $distancia=$row["distancia"];
                    $tiempo=$row["tiempo"];
                    $velocidad=$row["velocidad"];            
            

            
                echo "<tr id=\"row$cont\">
                
                <td class='datos'>$codigo</td>
                <td class='datos'> $nombre</td>

                <td class='datos'>$correo</td>

                <td class='datos'> $distancia</td>

                <td class='datos'> $tiempo</td>

                <td class='datos'> $velocidad</td>
                
                <td class='datos'>
                    <button onclick=\"aceptarRegistro($codigo);\">Aceptar registro</button>
                </td>
            

                </tr>";
            
                $cont++;
            }
        ?>

        </table>
    </section>
</body>



</html>