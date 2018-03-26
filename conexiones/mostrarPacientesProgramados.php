<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

date_default_timezone_set($zonaHoraria);
$fecha = new DateTime();
$fechaa = $fecha->format('Y-m-d');

$sql = "SELECT * FROM pacientes_programados where fechacita = '$fechaa'";
#$sql = "SELECT * FROM pacientes_programados ORDER BY fechacita DESC LIMIT 10";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["pnombre"]."</td>";
    echo "<td>".$row["papellido"]."</td>";
    echo "<td>".$row["cedula"]."</td>";
    echo "<td>".$_SESSION['name']."</td>";
    $id_paciente=$row['id'];
    $ced=$row['cedula'];
    $sql2 = "SELECT * FROM phmetria_form WHERE cedula = '$ced'";
    $sql3 = "SELECT * FROM manometria_form WHERE cedula = '$ced'";
    $sql4 = "SELECT * FROM asignacion_medico WHERE id_pacientepro = '$id_paciente' AND estado_enviado='S'";
    $result2 = $conexion->query($sql2);
    $result3 = $conexion->query($sql3);
    $result4 = $conexion->query($sql4);
    if ($result2->num_rows > 0) {
        echo "<td><a href=''><span class='label label-success' onclick='irA(\"phmetria.php\"); return false;'>Phmetria</span></a> <a href=''><span class='label label-default' onclick='irA(\"manometria.php\"); return false;'>Manometria</span></a></td>";
        if ($result4->num_rows > 0) {
            echo "<td><span class='label label-success'>Finalizado</span></td>";
        }else{
            echo "<td><span class='label label-danger'>En Examen</span></td>";
        }
        echo "<td><a href=''><span class='label label-primary' data-toggle='modal' data-target='#medNotPa' onclick='editarAsigMedico(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Asignar</span></a><a href='envios_estudios.php'><span class='label label-warning'>Enviar</span></a></td>";
        echo "<td><a href=''><span class='label label-info' data-toggle='modal' data-target='#medNotPa' onclick='editarNotaPaciente(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Ver</span></a></td>";
    }else if ($result3->num_rows > 0) {
        echo "<td><a href=''><span class='label label-default' onclick='irA(\"phmetria.php\"); return false;'>Phmetria</span></a> <a href=''><span class='label label-success' onclick='irA(\"manometria.php\"); return false;'>Manometria</span></a></td>";
        if ($result4->num_rows > 0) {
            echo "<td><span class='label label-success'>Finalizado</span></td>";
        }else{
            echo "<td><span class='label label-danger'>En Examen</span></td>";
        }
        echo "<td><a href=''><span class='label label-primary' data-toggle='modal' data-target='#medNotPa' onclick='editarAsigMedico(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Asignar</span></a><a href='envios_estudios.php'><span class='label label-warning'>Enviar</span></a></td>";
        echo "<td><a href=''><span class='label label-info' data-toggle='modal' data-target='#medNotPa' onclick='editarNotaPaciente(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Ver</span></a></td>";
    }else if(($result2->num_rows > 0) && ($result3->num_rows > 0)){
        echo "<td><a href=''><span class='label label-success' onclick='irA(\"phmetria.php\"); return false;'>Phmetria</span></a> <a href=''><span class='label label-success' onclick='irA(\"manometria.php\"); return false;'>Manometria</span></a></td>";
        if ($result4->num_rows > 0) {
            echo "<td><span class='label label-success'>Finalizado</span></td>";
        }else{
            echo "<td><span class='label label-danger'>En Examen</span></td>";
        }
        echo "<td><a href=''><span class='label label-primary' data-toggle='modal' data-target='#medNotPa' onclick='editarAsigMedico(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Asignar</span></a><a href='envios_estudios.php'><span class='label label-warning'>Enviar</span></a></td>";
        echo "<td><a href=''><span class='label label-info' data-toggle='modal' data-target='#medNotPa' onclick='editarNotaPaciente(\"".$row['pnombre']."\", ".$row["id"]."); return false;'>Ver</span></a></td>";
    }else{
        echo "<td><a href=''><span class='label label-default' onclick='irA(\"phmetria.php\"); return false;'>Phmetria</span></a><a href=''><span class='label label-default' onclick='irA(\"manometria.php\"); return false;'>Manometria</span></a></td>";
        echo "<td><span class='label label-default'>Sin Examen</span></td>";
        echo "<td><a><span class='label label-default'>Asignar</span></a><a><span class='label label-default'>Enviar</span></a></td>";
        echo "<td><a><span class='label label-default'>Editar</span></a></td>";
    }


    
    
    echo "</tr>";

    }

}





?>