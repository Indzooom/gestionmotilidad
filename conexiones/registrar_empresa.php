<?php

include("conexion.php");

$nombre=$_POST['nombre'];
$nit=$_POST['nit'];
$email=$_POST['email'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO empresa_salud 
(nombre, nit, email) 
VALUES ('$nombre', '$nit', '$email')");
 
mysqli_close($con); 


 
?>