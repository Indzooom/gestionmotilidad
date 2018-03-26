<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}
$respuesta['rol']=$_SESSION['rol'];
echo json_encode($respuesta);
?>