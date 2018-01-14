<?php

include ("conexion.php");


$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM medicos";
$result = $conexion->query($sql);

while ($row = $result->fetch_array(MYSQLI_NUM)){   

    echo "<option value=\"".$row[0]."\" >".$row[1]." ".$row[2]."</option>";
    
}  

mysql_query ("SET NAMES 'utf8'");

mysqli_close($conexion); 


?>