<?php

include("conexion.php");
include("../envios.php");
include("../consultas.php");

$id_usuario=$id_usuario;
$tipo=$_POST['tipo'];

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d H:i:s');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO actividades_envios 
(id_usuario, tipo, fecha) 
VALUES ('$id_usuario', '$tipo', '$fechaa')");
 
mysqli_close($con); 


 
?>