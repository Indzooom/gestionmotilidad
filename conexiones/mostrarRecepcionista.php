<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM recepcionista";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["nombre"]."</td>";
    echo "<td><a href=''><span class='label label-danger' onclick='eliminarRecepcionista(".$row["id"]."); return false;'>Eliminar</span></a></td>";
    echo "</tr>";

    }

}





?>