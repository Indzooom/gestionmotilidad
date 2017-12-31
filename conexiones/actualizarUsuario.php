<?php

include("conexion.php");

$id=$_GET['id'];
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

$sql = "UPDATE users SET 
role_id='$role', 
name='$nombre',
email='$email', 
password='$claveEncriptada', 
remember_token='null', 
created_at='null', 
updated_at='$fechaa'
WHERE id='$id'";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    //$respuesta['yes'] = "Empresa Actualizada";
} else {
    //$respuesta['yes'] = "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>