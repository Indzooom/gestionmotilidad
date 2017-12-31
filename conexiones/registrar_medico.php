<?php

include("conexion.php");

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$especialidad=$_POST['especialidad'];
$tipo=$_POST['tipo'];
$email=$_POST['email'];
$celular=$_POST['celular'];
$direccion=$_POST['direccion'];
$observaciones=$_POST['observaciones'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO medicos 
(nombre, apellido, especialidad, tipo, email, celular, direccion, observaciones) 
VALUES ('$nombre','$apellido','$especialidad','$tipo','$email','$celular','$direccion','$observaciones')");
 
mysqli_close($con); 


 
?>