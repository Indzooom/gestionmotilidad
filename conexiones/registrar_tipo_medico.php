<?php

include("conexion.php");

$nombre=$_POST['nombre'];

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO tipo_medico 
(nombre) 
VALUES ('$nombre')");
 
mysqli_close($con); 


 
?>