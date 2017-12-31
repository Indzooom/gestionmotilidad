<?php

include ("conexion.php");


$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM opcion WHERE id=1";
$result = $conexion->query($sql);
$respuesta['res']=0;

if ($result->num_rows > 0) {  
    $respuesta['res']=1;
while ($row = $result->fetch_array(MYSQLI_NUM)){  
    $respuesta['valor']=$row[2];
    }  
}

mysql_query ("SET NAMES 'utf8'");

mysqli_close($conexion); 

echo json_encode($respuesta);


?>