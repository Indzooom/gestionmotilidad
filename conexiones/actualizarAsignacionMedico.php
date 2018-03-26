<?php
session_start();
?>

<?php

include("conexion.php");

$id_paciente=$_POST['id'];
$id_medico=$_POST['medico'];
$id_usuario=$_SESSION['id_usuario'];
$estado_enviado='N';

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

$sql = "UPDATE asignacion_medico 
SET 
id_pacientepro='$id_paciente',
id_medico='$id_medico',
id_usuario='$id_usuario',
estado_enviado='$estado_enviado'
WHERE id_pacientepro='$id_paciente'";

#$result = $con->query($sql);

if (mysqli_query($con, $sql)) {
    echo "Actualizado";
} else {
    echo "Error: ".mysqli_error($con);
}

mysqli_close($con);
//echo json_encode($respuesta);
?>