<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}

$id_usuario=$_SESSION['id_usuario'];
$tipo="Envio";

?>

<!doctype html>
<html lang="en">

<head>
	<title>Importar Pacientes - Gutmedica</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<?php
	include("html.php");
	echo $css;
	?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php
		include("html.php");
		echo $nav;
		?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php
		include("html.php");
		echo $menu;
		?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-8">
							<h3 class="page-title">Importar Pacientes</h3>
							<div class="panel">
								<div class="panel-body">
									<br>
									<p>Datos a importar:</p>
									<p>ID Tipo de Documento, Identificacion, Primer Apellido, Segundo Apellido, Primer Nombre, Segundo Nombre, Fecha Nacimiento, Edad, 
									Email, Direccion, Ciudad, Telefono, Celular, Genero</p>
									<p style="color: red;">Considere que si los datos no estan correctos obtendra un error de parte del sistema.</p>
									<div class="input-group">
										<input class="form-control input-md" id="ruta"  type="file"  multiple="multiple">
										<span class="input-group-btn"><button class="btn btn-primary btn-md" type="button" onclick="importarPacientes('pacientes'); return false;">Importar</button></span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-8">
							<h3 class="page-title">Importar Pacientes Programados</h3>
							<div class="panel">
								<div class="panel-body">
									<br>
									<p>Datos a importar:</p>
									<p>Cedula, Primer Nombre, Segundo Nombre, Primer Apellido, Segundo Apellido, 
									Telefono, Celular, Ciudad, Email, Medico, Tipo de Cita, Fecha Cita, Hora Cita, 
									Procedimiento, Preparacion, Hora Ingreso</p>
									<p style="color: red;">Considere que si los datos no estan correctos obtendra un error de parte del sistema.</p>
									<div class="input-group">
										<input class="form-control input-md" id="ruta2" type="file"  multiple="multiple">
										<span class="input-group-btn"><button class="btn btn-primary btn-md" type="button" onclick="importarPacientes('pacientesp'); return false;">Importar</button></span>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<?php
		include("html.php");
		echo $footer;
		?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<?php
	include("html.php");
	echo $js;
	?>
	
</body>

</html>
