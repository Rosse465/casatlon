<?php 
    require "Funciones/BDs.php"; include "menu.php";
    
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

    <title>Perfil del usuario</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos-editar_perf.css">
    
    <script>
        estilos-editar_perf.css?x=<?php echo time();?>

        function regresar(){
            $('#mensaje').html('');
        }

        function validarDatos(){
            var nombre= document.forma01.nombre.value;
            var correo= document.forma01.correo.value;         
            var codigo=document.forma01.codigo.value;
            var password= document.forma01.password.value;   
            
            $.ajax({
                url: 'Funciones/validarCorreo.php',
                type: 'post',
                dataType: 'text',
                data: 'correo='+correo+'&id='+id,
                success: function(res){
                    if(res==1){
                        $('#error').html('El correo '+correo+ ' está duplicado.');
                        setTimeout("$('#error').html('');",5000);
                    }else{
                        if(nombre && codigo && correo){
                            document.forma01.method='post';
                            document.forma01.action='Funciones/editar.php';
                            document.forma01.submit();
                        }else{
                            
                            $('#mensaje').html("Faltan campos por llenar.");
                            setTimeout("regresar()",5000);
                            
                        }
                    }
                }, error: function(){
                    alert("Error, archivo no encontrado.");
                }
            });
        }

    </script>

</head>

<body>

    <?php 

        $codigo=$_SESSION['codigoU'];
        $con=conect();

        $sql="SELECT * FROM participantes
            WHERE codigo=$codigo";

        $res=$con->query($sql);

        while($row=$res->fetch_array()){
            $nombre=$row["nombre"];
            $correo=$row["correo"];
        }
        
    ?>

        <h1 style="padding-top: 10px;">Editar perfil</h1>
        <div><a href="ranking.php" id="regresar">Regresar a los rankings</a></div>    
        <br>
        <br>
        
<fieldset>
    <legend>Editar</legend>
    <form name="forma01">

        <label>Nombre: </label>
        <input id="nombre" type="text" name="nombre" value="<?php echo "$nombre"; ?>">
        <input id="codigo" type="hidden" name="codigo" value="<?php echo "$codigo"; ?>">
        <br>

        <label>Correo:</label>
        <input type="email" name="correo" id="correo" value="<?php echo "$correo"; ?>">
        <br>

        <label for="pasw">Contraseña:</label>
            <input type="text" name="password" id="password">
            <br>

            
        <input type="submit" class="boton" value="Guardar" onclick="validarDatos();  return false;">

        <div id="mensaje"></div>
        <div id="error"></div>
    </form>
    </fieldset>
</body>


</html>

