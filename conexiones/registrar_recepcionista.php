<?php

include("conexion.php");

$nombre=$_POST['nombre'];


$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO recepcionista 
(nombre) 
VALUES ('$nombre')");
 
mysqli_close($con); 


 
?>