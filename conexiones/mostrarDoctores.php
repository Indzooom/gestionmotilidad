<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $dbb);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM especialista_encuesta";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["nombre"]."</td>";
    if($row["CGA"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["CGP"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["CN"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["CC"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["PE"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["PC"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["M"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["TBF"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row["PP"]==1){
        echo "<td>Si</td>";
    }else{
        echo "<td>No</td>";
    }
    echo "<td><a href=''><span class='label label-danger' onclick='eliminarDoctor(".$row["id"]."); return false;'>Eliminar</span></a></td>";
    echo "</tr>";

    }

}





?>