<?php

include("conexion.php");

$id=$_POST['id'];
$nota=$_POST['nota'];

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO notas_pacientes 
(id_paciente, nota) 
VALUES ('$id','$nota')");
 
mysqli_close($con); 


 
?>