<?php

include ("conexion.php");

$cedula=$_POST['cedula'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM manometria_form WHERE cedula = '$cedula'";

$result = $conexion->query($sql);
$respuesta['res'] = 0;

if ($result->num_rows > 0) {     
 $respuesta['res'] = 1;
while($row = $result->fetch_array(MYSQLI_NUM)) {

    for($i=0;$i<=42;$i++){
        $respuesta["dato".$i]=$row[$i+1];
    }
}
}

echo json_encode($respuesta);


?>