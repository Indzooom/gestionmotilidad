<?php

include("conexion.php");

$sms=$_POST['sms'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "UPDATE opcion SET valor='$sms' WHERE id=1";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    echo "Empresa Actualizada";
} else {
    echo "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>