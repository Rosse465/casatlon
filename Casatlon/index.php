<?php
    session_start();
    if(isset($_SESSION['codigoU'])){
               
        header("Location: ranking.php");
        
        die();
    }
?>
<html>
    <head>
        <title>Log-in</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/estilos-index.css">

        <script>
            

            function regresar(){
                $('#mensaje').html('');
            }

            function validarDatos(){
                var user= document.form.user.value;
                var pass= document.form.pass.value;
                
                if(user && pass){
                    $.ajax({
                    url: 'Funciones/validaUsuario.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'user='+user+'&pass='+pass,
                    success: function(res){
                        if(res==0){
                            $('#error').html('Usuario o contraseña incorrecta.');
                            setTimeout("$('#error').html('');",3000);
                        }else{
                            window.location.href = 'ranking.php';
                        }
                    }, error: function(){
                        alert("Error, archivo no encontrado.");
                    }
                });
                
                
                }else{
                    $('#mensaje').html("Faltan campos por llenar.");
                    setTimeout("regresar()",3000);
                    
                }
            }

        </script>

    </head>

    <body>
        <section class="INDEX">
            
        <a href="registrar.php" id="link"><p style="padding: 20px;">Registrarse</p></a>
        <fieldset>
            <legend>Log-in</legend>

            <form name="form">

                <label>Usuario: </label>
                <input id="user" type="text" autocomplete="off" name="user">
                <br>

                <label>Contraseña: </label>
                <input id="pass" type="password" name="pass">
                <br>

                <input type="submit" id="boton" value="Entrar" onclick="validarDatos();  return false;">
                
                <div id="mensaje"></div>
                <div id="error"></div>
            </form>
        </fieldset>
        </section>
    </body>
    
</html>


