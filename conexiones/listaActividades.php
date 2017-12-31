
<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $db);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

if(isset($_GET['fecha1']) and isset($_GET['fecha2'])){
    $fecha1=$_GET['fecha1'];
    $fecha2=$_GET['fecha2'];
    $sql = "SELECT * FROM actividades_envios a inner join users b on a.id_usuario=b.id where date(a.fecha) BETWEEN '$fecha1' AND '$fecha2'";
}else{
    $sql = "SELECT * FROM actividades_envios a inner join users b on a.id_usuario=b.id ORDER BY a.fecha DESC";
}

$result = $conexion->query($sql);


while ($row = $result->fetch_array(MYSQLI_ASSOC)){   
    echo "<li>";
    echo "<img src='assets/img/user1.png' alt='Avatar' class='img-circle pull-left avatar'>";
    echo "<p>Usuario: <a href='#'>".$row["name"]."</a> - Tipo de Actividad: ".$row["tipo"]." <span class='timestamp'>Fecha: ".$row["fecha"]."</span></p>";
    echo "</li>";
    echo "<hr>";
}  

mysqli_close($conexion); 


?>