<?php

include("conexion.php");

$id=$_POST['id'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "UPDATE asignacion_medico SET estado_enviado='S' WHERE id='$id'";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    echo "Actualizado";
} else {
    echo "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>