<?php

include("conexion.php");

$id=$_GET['id'];
$tipo_documento=$_POST['tipo_documento'];
$cedula=$_POST['cedula'];
$nombre1=$_POST['nombre1'];
$nombre2=$_POST['nombre2'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$nacimiento=$_POST['nacimiento'];
$edad=$_POST['edad'];
$telefono=$_POST['telefono'];
$celular=$_POST['celular'];
$email=$_POST['email'];
$sexo=strtoupper($_POST['sexo']);

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "UPDATE pacientes SET 
id_tipo_documento='$tipo_documento', 
identificacion='$cedula',
apellido_1='$apellido1', 
apellido_2='$apellido2', 
nombre_1='$nombre1', 
nombre_2='$nombre2', 
fecha_nacimiento='$nacimiento', 
edad='$edad', 
email='$email', 
direccion='$direccion', 
ciudad='$ciudad', 
telefono_fijo='$telefono', 
telefono_celular='$celular',
sexo='$sexo'
WHERE id='$id'";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    //$respuesta['yes'] = "Empresa Actualizada";
} else {
    //$respuesta['yes'] = "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>