<?php

include("conexion.php");

$id=$_POST['id'];
$nota=$_POST['nota'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "UPDATE notas_pacientes SET nota='$nota' WHERE id_paciente='$id'";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    echo "Actualizado";
} else {
    echo "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>