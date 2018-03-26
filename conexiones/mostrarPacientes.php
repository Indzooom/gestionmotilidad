<?php

include ("conexion.php");

$cedula=$_GET['cedula'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM pacientes WHERE identificacion = '$cedula'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["nombre_1"]."</td>";
    echo "<td>".$row["apellido_1"]."</td>";
    echo "<td>".$cedula."</td>";
    echo "<td>".$row["ciudad"]."</td>";
    echo "<td>".$row["edad"]."</td>";
    echo "<td>".$row["telefono_fijo"]."</td>";
    echo "<td>".$row["telefono_celular"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td><a href=''><span class='label label-primary' onclick='mostrarDatosPacientes(".$cedula."); return false;'>Modificar</span></a></td>";


    }

}





?>