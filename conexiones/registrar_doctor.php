<?php

include("conexion.php");

$nombre=$_POST['nombre'];
$cga=$_POST['cga'];
$cgp=$_POST['cgp'];
$cn=$_POST['cn'];
$cc=$_POST['cc'];
$pe=$_POST['pe'];
$pc=$_POST['pc'];
$m=$_POST['m'];
$tbf=$_POST['tbf'];
$tbf=$_POST['pp'];


$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $dbb)or die("Problemas al conectar la bd");

mysqli_query($con, "INSERT INTO especialista_encuesta 
(nombre, CGA, CGP, CN, CC, PE, PC, M, TBF, PP) 
VALUES ('$nombre', '$cga', '$cgp', '$cn', '$cc', '$pe', '$pc', '$m', '$tbf', '$pp')");
 
mysqli_close($con); 


 
?>