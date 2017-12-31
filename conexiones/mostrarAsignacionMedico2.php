<?php

include ("conexion.php");

$medico=$_GET['medico'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT b.pnombre, b.papellido, b.cedula, b.fechacita, d.name, c.tipo, c.nombre, c.apellido, c.email  
        FROM asignacion_medico a inner join pacientes_programados b on a.id_pacientepro=b.id 
        INNER JOIN medicos c on a.id_medico=c.id INNER JOIN users d on a.id_usuario=d.id
        WHERE a.id_medico='$medico'";


$result = $conexion->query($sql);
$respuesta['res']=0;
if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {
    $respuesta['res']=1;
    $respuesta['nombre']=$row["nombre"];
    $respuesta['apellido']=$row["apellido"];
    $respuesta['email']=$row["email"];
    }
}

echo json_encode($respuesta);


?>