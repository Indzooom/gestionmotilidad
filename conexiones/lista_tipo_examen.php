
<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM tipo_examen";
$result = $conexion->query($sql);

while ($row = $result->fetch_array(MYSQLI_ASSOC)){   
    echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
    //json_encode($row['nombre']);
    echo "|";
    //echo (json_encode($row['nombre']));
}  
//json_encode($datos);
mysqli_close($conexion); 


?>