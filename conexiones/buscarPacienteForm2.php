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
while($row = $result->fetch_assoc()) {
    //$respuesta['id_paciente']=$row['id'];
}
}

echo json_encode($respuesta);


?>