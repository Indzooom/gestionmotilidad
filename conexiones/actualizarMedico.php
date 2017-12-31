<?php

include("conexion.php");

$id=$_GET['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$especialidad=$_POST['especialidad'];
$tipo=$_POST['tipo'];
$email=$_POST['email'];
$celular=$_POST['celular'];
$direccion=$_POST['direccion'];
$observacion=$_POST['observacion'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "UPDATE medicos 
SET 
nombre='$nombre', 
apellido='$apellido',
especialidad='$especialidad',
tipo='$tipo',
email='$email',
celular='$celular',
direccion='$direccion',
observacion='$observacion'
WHERE id='$id'";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    echo "Actualizado";
} else {
    echo "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>