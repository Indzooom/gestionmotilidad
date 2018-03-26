
<?php

include ("conexion.php");

$tipo=$_GET['tipo'];


$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM log_envios WHERE tipo_examen = '$tipo'";
$result = $conexion->query($sql);


while ($row = $result->fetch_array(MYSQLI_ASSOC)){   
    echo "<tr>";  
    echo "<td>".$row["id"]."</td>";  
    $id_paciente=$row["id_paciente"];

    $conexion2 = new mysqli($host, $user, $pw, $db);

    if ($conexion2->connect_error) {
    die("La conexion falló: " . $conexion2->connect_error);
    }

    $sql2 = "SELECT apellido_1, apellido_2, nombre_1, nombre_2, identificacion FROM pacientes WHERE id = '$id_paciente'";

    $result2 = $conexion2->query($sql2);

    if ($result2->num_rows > 0) {     
    
    while($row2 = $result2->fetch_assoc()) {

        $nombre=$row2["nombre_1"];
        $nombre2=$row2["nombre_2"];
        $apellido=$row2["apellido_1"];
        $apellido2=$row2["apellido_2"];
        $cedula=$row2["identificacion"];
        }

    }

    $nombres=$nombre." ".$nombre2;
    $apellidos=$apellido." ".$apellido2;



    echo "<td>".$nombres."</td>";  
    echo "<td>".$cedula."</td>";  
    echo "<td>".$row["tipo_examen"]."</td>";  
    echo "<td>".$row["fecha_examen"]."</td>"; 
    echo "<td> <a href='conexiones/bajar.php?destino=".$row["ruta_archivo"]."'>Descargar</a> </td>";
    echo "</tr>"; 
}  

mysqli_close($conexion); 


?>