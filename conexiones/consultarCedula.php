<?php

include ("conexion.php");

$cedula=$_POST['cedula'];

$conexion = new mysqli($host, $user, $pw, $dbb);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT id, apellido_1, apellido_2, nombre_1, nombre_2 FROM gut_pacientes WHERE identificacion = '$cedula'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
 
while($row = $result->fetch_assoc()) {

    $id_paciente=$row["id"];
    $nombre=$row["nombre_1"];
    $nombre2=$row["nombre_2"];
    $apellido=$row["apellido_1"];
    $apellido2=$row["apellido_2"];
    }

}

$nombres=$nombre." ".$nombre2;
$apellidos=$apellido." ".$apellido2;

$respuesta['name'] = $nombres;
$respuesta['lastname'] = $apellidos;
$respuesta['id_paciente'] = $id_paciente;
echo json_encode($respuesta);




?>