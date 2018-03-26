<?php
include("conexion.php");

$con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");


$ruta=$_GET['ruta'];

$linea = 0;
//Abrimos nuestro archivo
$archivo = fopen($ruta, "r");

//Lo recorremos
while (($datos = fgetcsv($archivo, ",")) == true) 
{
  $num = count($datos);
  $linea++;
  //Recorremos las columnas de esa linea

  mysqli_query($con, "INSERT INTO pacientes 
  (id_tipo_documento, identificacion, apellido_1, apellido_2, nombre_1, nombre_2, fecha_nacimiento, edad, 
  email, direccion, ciudad, telefono_fijo, telefono_celular, sexo) 
  VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]','$datos[7]', 
  '$datos[8]', '$datos[9]', '$datos[10]', '$datos[11]', '$datos[12]', '$datos[13]')");
  //echo $datos[$columna] . "\n";

}
//Cerramos el archivo
fclose($archivo);
mysqli_close($con); 
?>