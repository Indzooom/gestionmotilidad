<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM users WHERE id>1";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    if($row["role_id"]==1){
        echo "<td>Admin</td>";
    }else{
        echo "<td>Normal</td>";
    }
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td><a href=''><span class='label label-info' onclick='mostrarUsuarioTabla(".$row["id"]."); return false;'>Editar</span></a></td>";
    echo "</tr>";

    }

}





?>