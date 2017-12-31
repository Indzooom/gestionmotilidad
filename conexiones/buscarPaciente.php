<?php

include ("conexion.php");

$cedula=$_POST['cedula'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM pacientes WHERE identificacion = '$cedula'";

$result = $conexion->query($sql);
$respuesta['res'] = 0;

if ($result->num_rows > 0) {     
 $respuesta['res'] = 1;
while($row = $result->fetch_assoc()) {

    $respuesta['id_paciente']=$row["id"];
    $respuesta['name']=$row["nombre_1"];
    $respuesta['lastname']=$row["apellido_1"];
    $respuesta['email']=$row["email"];
    $respuesta['celular']=$row["telefono_celular"];
    $respuesta['telefono']=$row["telefono_fijo"];
    $respuesta['cedula']=$row["identificacion"];
    $respuesta['edad']=$row["edad"];
    $respuesta['ciudad']=$row["ciudad"];
    $respuesta['direccion']=$row["direccion"];
    $respuesta['name2']=$row["nombre_2"];
    $respuesta['lastname2']=$row["apellido_2"];
    $respuesta['tipo_cedula']=$row["id_tipo_documento"];
    $respuesta['nacimiento']=$row["fecha_nacimiento"];
    $respuesta['sexo']=$row["sexo"];

    $respuesta['nameful']=$row["nombre_1"]." ".$row["nombre_2"];
    $respuesta['lastnameful']=$row["apellido_1"]." ".$row["apellido_2"];

}
}

echo json_encode($respuesta);


?>