<?php

include("conexion.php");

$id=$_POST['id'];

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "DELETE FROM tipo_medico WHERE id='$id'";

#$result = $con->query($sql);

if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

mysqli_close($con);
//echo json_encode($respuesta);
?>