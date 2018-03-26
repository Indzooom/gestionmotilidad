<?php
session_start();
?>


<?php

include ("conexion.php");


$conexion = new mysqli($host, $user, $pw, $db);
"GRANT ALL PRIVILEGES ON *.* TO ".$user."@".$host." IDENTIFIED BY ".$pw;

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['email'];
$password = $_POST['clave'];
$pw=md5($password);
 
$sql = "SELECT * FROM users WHERE email = '$username'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if ($pw == $row['password']) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $username;
    $_SESSION['rol'] = $row['role_id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['id_usuario'] = $row['id'];
    #$_SESSION['start'] = time();
    #$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    #header("location: ../listado_phmetria.php");
    $respuesta['res'] = 1;

 } else { 
   /*echo "Email o Clave estan incorrectos.";
   echo "<br><a href='../index.php'>Volver a Intentarlo</a>";*/
   $respuesta['res'] = 0;

 }
 $respuesta['rol']=$_SESSION['rol'];
 mysqli_close($conexion); 
 echo json_encode($respuesta);


?>