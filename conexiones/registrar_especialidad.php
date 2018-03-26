<?php

include("conexion.php");

$especialidad=$_POST['especialidad'];

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO especialidades 
(nombre) 
VALUES ('$especialidad')");
 
mysqli_close($con); 


 
?>