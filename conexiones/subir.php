<?php
	include("conexion.php");
	$conexion = new mysqli($host, $user, $pw, $db);

	if ($conexion->connect_error) {
	die("La conexion falló: " . $conexion->connect_error);
	}

	$sql = "SELECT id FROM log_envios";

	$result = $conexion->query($sql);
	$ultimo_id=0;
	if ($result->num_rows > 0) {     
	
	while($row = $result->fetch_assoc()) {

		$ultimo_id=$row["id"];

	}
	}
	$mensage = '';
	foreach ($_FILES as $key) 
	{
		if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
			{
				$NombreOriginal = $key['name'];
				$temporal = $key['tmp_name']; 
				$temp_name=$ultimo_id."_".$NombreOriginal;
				$Destino = $ruta_subida.$temp_name;
				
				move_uploaded_file($temporal, $Destino); 		
			}
	
		if ($key['error']=='') //Si no existio ningun error, retornamos un mensaje por cada archivo subido
			{
				$mensage .= 'Listo';
			}
		if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
			{
				//$mensage .= '-> No se pudo subir el archivo <b>'.$NombreOriginal.'</b> debido al siguiente Error: n'.$key['error']; 
				$mensage .= 'No Listo'; 
			}
		
	}
	echo $temp_name;
?>