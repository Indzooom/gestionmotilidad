
<?php

include("conexion.php");

$id_paciente = $_GET['id_paciente'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM log_envios WHERE id_paciente = '$id_paciente'";
$result = $conexion->query($sql);


while ($row = $result->fetch_array(MYSQLI_ASSOC)){   
    echo "<tr>";  
    echo "<td>".$row["id"]."</td>";  
    echo "<td>".$row["fecha_envio"]."</td>"; 
    echo "<td>".$row["fecha_examen"]."</td>"; 
    echo "<td>".$row["tipo_examen"]."</td>";  
    echo "<td> <a href='conexiones/bajar.php?destino=".$row["ruta_archivo"]."'><img src='img/pdf.png' id='icon' alt=''></a> </td>";
    echo "</tr>"; 
}  

mysqli_close($conexion); 


?>