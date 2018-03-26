
<?php
include("conexion.php");
$destino = $_GET['destino'];
header("Content-disposition: attachment; filename=".$destino);
header("Content-type: image/jpg");
readfile($ruta_bajada."/".$destino);
?>