<?php

include("conexion.php");

$role=$_POST['role'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$clave=$_POST['clave'];
$claveEncriptada=md5($clave);

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO users 
(role_id, name, email, password, remember_token, created_at, updated_at) 
VALUES ('$role', '$nombre', '$email', '$claveEncriptada', '$claveEncriptada', '$fechaa', '$fechaa')");
 
mysqli_close($con); 


 
?>