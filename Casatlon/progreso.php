<?php 
    include "menu.php"; 
    
    session_start();
    if(!isset($_SESSION['codigoU'])){
        echo " 
            <script>
                window.location='index.php';
            </script>";   
        
    }
    $ano = date("Y");
    $mes = date("M");
?>
<html>
<head>
        <title>Formulario de progreso</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/estilos-progreso.css">

        <script>
            

            function regresar(){
                $('#mensaje').html('');
            }
            

            function validarDatos(){
                var distancia= document.forma01.distancia.value;
                var tiempo= document.forma01.tiempo.value;
                var codigo=document.forma01.codigo.value;
                var carrera=document.forma01.carrera.value;

                if(distancia && tiempo){
                    $.ajax({
                    url: 'Funciones/validarProgreso.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'distancia='+distancia+'&tiempo='+tiempo+'&codigo='+codigo,
                    success: function(res){
                        
                        if(res==1){
                            $('#error').html('Los datos no son válidos.');
                            setTimeout("$('#error').html('');",3000);
                        }else{
                            document.forma01.method='post';
                            document.forma01.action='Funciones/guardaProgreso.php';
                            document.forma01.submit();
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
            <div><a href="ranking.php" id="regresar">Regresar a los rankings</a></div>
            <br>
            <br>

    <fieldset>
        <legend>Nuevo progreso</legend>
        <form name="forma01">

            <label>Distancia total: </label>
            <input id="distancia" type="numeric" autocomplete="off" name="distancia" placeholder="Distancia en metros">
            <br>

            <input type="hidden" id="codigo" type="text"autocomplete="off" name="codigo" value="<?php echo $_SESSION['codigoU']?>">
            
            <label>Tiempo total:</label>
            <input type="numeric" name="tiempo" id="tiempo" autocomplete="off" placeholder="Tiempo en minutos"></div>
            <br>

            <label for="carrera">Carrera</label>
                <select name="carrera" id="carrera">
                    <option value="0" selected>CUCEI-<?php echo "$ano/$mes"?></option>		
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

