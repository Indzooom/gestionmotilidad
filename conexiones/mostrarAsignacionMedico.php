<?php

include ("conexion.php");

$medico=$_GET['medico'];

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT a.id,  a.estado_enviado, b.pnombre, b.papellido, b.cedula, b.fechacita, d.name, c.tipo, c.nombre, c.apellido, c.email  
        FROM asignacion_medico a inner join pacientes_programados b on a.id_pacientepro=b.id 
        INNER JOIN medicos c on a.id_medico=c.id INNER JOIN users d on a.id_usuario=d.id
        WHERE a.id_medico='$medico' ORDER BY b.fechacita DESC LIMIT 10";


$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
while($row = $result->fetch_assoc()) {

    $respuesta['res']=1;
    $respuesta['nombre']=$row["nombre"];
    $respuesta['apellido']=$row["apellido"];
    $respuesta['email']=$row["email"];

    $id=$row["id"];

    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["pnombre"]."</td>";
    echo "<td>".$row["papellido"]."</td>";
    echo "<td>".$row["cedula"]."</td>";
    echo "<td>".$row["fechacita"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["tipo"]."</td>";
    if($row["estado_enviado"]=='S'){
        echo "<td><span class='label label-success'>Enviado</span></td>";
    }else{
        echo "<td><span class='label label-default'>No Enviado</span></td>";
    }
    
    echo "<td><a href='' onclick='modificarBtnEnvioMedico(".$id."); return false;'><span class='label label-info' data-toggle='modal' data-target='#medEnviar' >Enviar</span></a></td>";
    

    echo json_encode($respuesta);
    
    
    echo "</tr>";

    }

}else{
    echo "<script>alert('El medico no tiene asignado nada.')</script>";
}


?>