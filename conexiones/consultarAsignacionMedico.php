<?php

include ("conexion.php");

$id=$_POST['id'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM asignacion_medico WHERE id_pacientepro = '$id'";

$result = $conexion->query($sql);
$respuesta['res'] = 0;

if ($result->num_rows > 0) {     
 $respuesta['res'] = 1;
while($row = $result->fetch_assoc()) {

}
}

echo json_encode($respuesta);


?>