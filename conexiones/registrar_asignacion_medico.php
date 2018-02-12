<?php
session_start();
?>

<?php

include ("conexion.php");

$id_paciente=$_POST['id'];
$id_medico=$_POST['medico'];
$id_usuario=$_SESSION['id_usuario'];
$estado_enviado='N';

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO asignacion_medico 
(id_pacientepro, id_medico, id_usuario, estado_enviado) 
VALUES ('$id_paciente', '$id_medico', '$id_usuario', '$estado_enviado')");
 
mysqli_close($con); 


 
?>