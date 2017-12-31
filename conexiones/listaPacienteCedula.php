
<?php

include ("conexion.php");

$cedula=$_GET['cedula'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT id, apellido_1, apellido_2, nombre_1, nombre_2, identificacion FROM pacientes WHERE identificacion = '$cedula'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
 
while($row = $result->fetch_assoc()) {

    $id_paciente=$row["id"];
    $nombre=$row["nombre_1"];
    $nombre2=$row["nombre_2"];
    $apellido=$row["apellido_1"];
    $apellido2=$row["apellido_2"];
    $cedula=$row["identificacion"];
    }

}

$nombres=$nombre." ".$nombre2;
$apellidos=$apellido." ".$apellido2;

mysqli_close($conexion); 


$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM log_envios WHERE id_paciente = '$id_paciente'";
$result = $conexion->query($sql);


while ($row = $result->fetch_array(MYSQLI_ASSOC)){   
    echo "<tr>";  
    echo "<td>".$row["id"]."</td>";  
    echo "<td>".$nombres."</td>";  
    echo "<td>".$cedula."</td>";  
    echo "<td>".$row["tipo_examen"]."</td>";  
    echo "<td>".$row["fecha_examen"]."</td>"; 
    echo "<td> <a href='conexiones/bajar.php?destino=".$row["ruta_archivo"]."'>Descargar</a> </td>";
    echo "</tr>"; 
}  

mysqli_close($conexion); 


?>