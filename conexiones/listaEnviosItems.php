
<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];
$items=$_GET['items'];

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM log_envios a inner join users b on a.id_usuario=b.id
        inner join pacientes c on a.id_paciente=c.id
        WHERE a.fecha_envio BETWEEN '$fecha1' and '$fecha2'";
$result = $conexion->query($sql);

echo "<thead>";
    echo "<tr>";
        
        $itemss=explode(",",$items);
        for($i=0;$i<count($itemss);$i++){
            if($itemss[$i]==1){
                echo "<th>Nombre Usuario</th>";
            }
            if($itemss[$i]==2){
                echo "<th>Nombre Paciente</th>";
            }
            if($itemss[$i]==3){
                echo "<th>Email Paciente</th>";
            }
            if($itemss[$i]==4){
                echo "<th>Tipo Examen</th>";
            }
            if($itemss[$i]==5){
                echo "<th>Fecha Examen</th>";
            }
            if($itemss[$i]==7){
                echo "<th>Fecha Envio</th>";
            }
        }
    echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row = $result->fetch_array(MYSQLI_ASSOC)){   
    echo "<tr>";
    
     for($i=0;$i<count($itemss);$i++){
            if($itemss[$i]==1){
                echo "<td>".$row['name']."</td>";
            }
            if($itemss[$i]==2){
                echo "<td>".$row['nombre_1']." ".$row['apellido_1']."</td>";
            }
            if($itemss[$i]==3){
                echo "<td>".$row['email_paciente']."</td>";
            }
            if($itemss[$i]==4){
                echo "<td>".$row['tipo_examen']."</td>";
            }
            if($itemss[$i]==5){
                echo "<td>".$row['fecha_examen']."</td>";
            }
            if($itemss[$i]==7){
                echo "<td>".$row['fecha_envio']."</td>";
            }
        }
    echo "</tr>";
    
}  
echo "</tbody>";
//json_encode($datos);
mysqli_close($conexion); 


?>