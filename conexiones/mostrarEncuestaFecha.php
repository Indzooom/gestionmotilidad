<?php

include ("conexion.php");

$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];

$conexion = new mysqli($host, $user, $pw, $dbb);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM encuesta WHERE fecha BETWEEN '$fecha1' and '$fecha2'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["fecha"]."</td>";
    echo "<td>".$row["nombre"]."</td>";
    echo "<td>".$row["telefono"]."</td>";
    echo "<td>".$row["servicio"]."</td>";
    echo "<td>".$row["profesional"]."</td>";
    echo "</tr>";

    }

}else{
    echo "<script>alert('No se encontro resultados.')</script>";
}





?>