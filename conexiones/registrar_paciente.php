<?php

include("conexion.php");

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
$sexo=$_POST['sexo'];

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO pacientes 
(id_tipo_documento, identificacion, apellido_1, apellido_2, nombre_1, nombre_2, fecha_nacimiento, edad, 
email, direccion, ciudad, telefono_fijo, telefono_celular, sexo) 
VALUES ('$tipo_documento', '$cedula', '$apellido1', '$apellido2', '$nombre1', '$nombre2', '$nacimiento','$edad', 
'$email', '$direccion', '$ciudad', '$telefono', '$celular', '$sexo')");
 
mysqli_close($con); 


 
?>