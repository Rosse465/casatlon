<html>
<head>

    <title>Formulario de registro</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos-registrar.css">

    <script>
        

        function regresar(){
            $('#mensaje').html('');
        }

        function validarDatos(){
            var nombre= document.forma01.nombre.value;
            var codigo= document.forma01.codigo.value;
            var correo= document.forma01.correo.value;
            var pass = document.forma01.pass.value;
            var sexo = document.forma01.sexo.value;

            $.ajax({
                url: 'Funciones/validarCorreo.php',
                type: 'post',
                dataType: 'text',
                data: 'correo='+correo+'&codigo='+codigo,
                success: function(res){
                    if(res==1){
                        $('#error').html('El correo '+correo+ ' está duplicado.');
                        setTimeout("$('#error').html('');",5000);
                    }else{
                        if(nombre && codigo && correo && pass && sexo){
                            document.forma01.method='post';
                            document.forma01.action='Funciones/salva.php';
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
       <section class="INDEX"> 
            <div><a href="index.php" id="link"><p style="padding-top: 20px;">Regresar al log-in</p></a></div>
            <br>
            <br>

    <fieldset>
        
        <form name="forma01">

            <label>Código: </label>
            <input id="codigo" type="text" name="codigo" autocomplete="off" placeholder="Escribe tu código UdG">
            <br>

            <label>Nombre: </label>
            <input id="nombre" type="text" name="nombre" autocomplete="off" placeholder="Escribe tu nombre">
            <br>

            <label>Correo:</label>
            <input type="email" name="correo" id="correo" autocomplete="off" placeholder="Escribe tu correo UdG"></div>
            <br>

            <label for="pass">Contraseña:</label>
                <input type="password" name="pass" autocomplete="off" id="pass">
                <br>

            <label for="sexo">Sexo:</label>
                    <select name="sexo" id="sexo">
                        <option value="0" selected>Selecciona</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>			
                    </select>
                    <br>

                <input id="boton" type="submit" value="Guardar" onclick="validarDatos();  return false;">

                <div id="mensaje"></div>
                <div id="error"></div>
        </form>
        </fieldset>
    </section>
</body>


</html>

