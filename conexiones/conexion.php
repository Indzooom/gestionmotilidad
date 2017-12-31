<?php

$host = "localhost";

$i=2;

#LOCAL

if($i==1){
$user = "root";
$pw = "";
$db = "envios-gutmedica";
$dbb = "gut-medica";
$zonaHoraria="America/Caracas";
$ruta_subida = "C:\Users\Daza\Pictures\ProaPHP/";
$ruta_bajada = "C:\Users\Daza\Pictures\ProaPHP/";
}


#SERVIDOR

if($i==2){
$user = "wwwgutme_root";
$pw = "wwwgutmedica";
$db = "wwwgutme_envios";
$dbb = "wwwgutme_motilidad";
$dbbb = "wwwgutme_notas";
$zonaHoraria="America/Bogota";
$ruta_subida = $_SERVER['DOCUMENT_ROOT']."/archivos/";
$ruta_bajada = 'http://www.gestionmotilidad.gutmedica.co/archivos/';
}



?>