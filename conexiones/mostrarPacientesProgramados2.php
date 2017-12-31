<?php

include ("conexion.php");

$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM pacientes_programados WHERE fechacita BETWEEN '$fecha1' AND '$fecha2'";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["pnombre"]."</td>";
    echo "<td>".$row["papellido"]."</td>";
    echo "<td>".$_SESSION['name']."</td>";
    $ced=$row['cedula'];
    $sql2 = "SELECT * FROM phmetria_form WHERE cedula = '$ced'";
    $result2 = $conexion->query($sql2);
    if ($result2->num_rows > 0) {
        echo "<td><span class='label label-success'>Encuestar</span><span class='label label-success'>En Examen</span>";
        echo "<td><a href=''><span class='label label-primary' onclick='editarAsigMedico(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Asignar</span></a><a href=''><span class='label label-warning'>Enviar</span></a></td>";
        echo "<td><a href=''><span class='label label-info' onclick='editarNotaPaciente(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Ver</span></a></td>";
    }else{
        echo "<td><span class='label label-default'>Encuestar</span><span class='label label-default'>En Examen</span>";
        echo "<td><a href=''><span class='label label-default'>Asignar</span></a><a href=''><span class='label label-default'>Enviar</span></a></td>";
        echo "<td><a href=''><span class='label label-default'>Editar</span></a></td>";
    }


    
    
    echo "</tr>";

    }

}





?>