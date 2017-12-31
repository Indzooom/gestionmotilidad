<?php

include("conexion.php");

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cedula=$_POST['cedula'];
$especialidad=$_POST['especialidad'];
$email=$_POST['email'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO profesional_salud 
(cedula, nombre, apellido, especialidad, email) 
VALUES ('$cedula', '$nombre', '$apellido', '$especialidad', '$email')");
 
mysqli_close($con); 


 
?>