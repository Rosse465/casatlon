<?php
    session_start();
    $contra=$_SESSION['contra'];
    if($contra=='admin123'){
        echo " 
            <script>
                window.location.href = 'ranking.php';
            </script>";
    }
    if(!isset($_SESSION['codigoU'])){
        echo " 
            <script>
                window.location='index.php';
            </script>";   
        
    }
    
    $nombre=$_SESSION['nombre'];
    include "menu.php";
?>

<html>
    <head>
        <title>Bienvenida</title>
        <link rel="stylesheet" href="css/estilos-welcome.css">
        
        <script>
            
        function redirigir(){
            if($contra=='admin123'){         
                
                window.location.href = 'Casatlon/ranking.php';
            }
            
        }

        </script>

    </head>

    <body>
        
        <h1 id="bienvenida">Bienvenido <?php echo $nombre ?></h1>
    </body>

    <script>
        
        //setTimeout("redirigir()", 3000);    

    </script>
</html>