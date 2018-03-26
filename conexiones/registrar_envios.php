<?php

include("conexion.php");
include("../envios.php");

$id_usuario=$id_usuario;
$id_paciente=$_POST['id_paciente'];
$email_paciente=$_POST['email'];
$tipo_examen=$_POST['tipo_examen'];
$fecha_examen=$_POST['fecha_examen'];
$destino=$_POST['destino'];

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO log_envios 
(id_usuario, id_paciente, email_paciente, tipo_examen, fecha_examen, ruta_archivo, fecha_envio) 
VALUES ('$id_usuario', '$id_paciente', '$email_paciente', '$tipo_examen', '$fecha_examen', '$destino', '$fechaa')");
 
mysqli_close($con); 
$respuesta['fecha_envio'] = $fechaa;
echo $fechaa;
echo json_encode($respuesta);

 
?>