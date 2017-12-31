<?php

include ("conexion.php");

$id=$_POST['id'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM users WHERE id = '$id'";

$result = $conexion->query($sql);
$respuesta['res'] = 0;

if ($result->num_rows > 0) {     
 $respuesta['res'] = 1;
while($row = $result->fetch_assoc()) {

    $respuesta['id']=$row["id"];
    $respuesta['role']=$row["role_id"];
    $respuesta['name']=$row["name"];
    $respuesta['email']=$row["email"];
}
}

echo json_encode($respuesta);


?>