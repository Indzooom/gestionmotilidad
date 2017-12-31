<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM phmetria_form";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_array(MYSQLI_NUM)) {

    $a=count($row);
    $b=0;
    for($i=0; $i<$a; $i++){
        if($row[$i]!='0' and $row[$i]!='n/a'){
            $b++;
        }
    }

    if($a==$b){

    }else{
        echo "<tr>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[4]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[17]."</td>";
        echo "<td>".$row[36]."</td>";
        echo "<td>".$row[28]."</td>";
        $calculo=($b/$a)*100;
        echo "<td> <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: ".$calculo."%'> </div> </div> </td>";
        echo "<td><span class='label label-warning'>Incompleto</span></td>";
        echo "<td><a href='phmetria.php?ced=".$row[2]."'><span class='label label-primary'>Editar</span></a></td>";
        echo "</tr>";
    }

    
    }

}





?>