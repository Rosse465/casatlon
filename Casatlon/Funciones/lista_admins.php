<?php

//  Muestra participantes
require "BDs.php";

$con=conect();

$sql="SELECT * FROM participantes
      WHERE tipo_user=0 AND codigo!=''";

$res=$con->query($sql);
$cont=1;

/*
while($row=$res->fetch_array()){
    $id=$row["codigo"];
    $nombre=$row["nombre"];
    $correo=$row["correo"];
    echo "$cont $nombre $correo";
    echo "------";
    echo "<a href=\"Eliminar.php?ID=$id\">";
    echo "Eliminar Administrador";
    echo "</a><br>";
    $cont++;
}
*/


/*
Envio con GET

recibe.php?var=valor&var2=valor2

elimina.php?id=5
*/

?>