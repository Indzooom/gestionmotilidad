<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}

$id_usuario=$_SESSION['id_usuario'];
$tipo="Envio";
$rol=$_SESSION['rol'];

?>

<!doctype html>
<html lang="en">

<head>
	<title>Envios - Gutmedica</title>
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


					<h3 class="page-title">Enviar Examenes</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Datos del Paciente</h3>
								</div>
								<div class="panel-body">
									<div class="input-group">
										<input class="form-control input-md" id="cedula" placeholder="Nro. de Identificacion" type="text">
										<span class="input-group-btn"><button class="btn btn-primary btn-md" type="button" onclick="buscarPaciente(); return false;">Buscar</button></span>
									</div>
									<br>
									<input class="form-control input-md" id="nombres" placeholder="Nombre" type="text" disabled="true">
									<br>
									<input class="form-control input-md" id="apellidos" placeholder="Apellido" type="text" disabled="true"> 
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Datos del Envio del Paciente</h3>
								</div>
								<div class="panel-body">
									<input class="form-control input-md" id="email" placeholder="Email" type="text" disabled="true">
									<br>
									<input class="form-control input-md" id="celular" placeholder="Celular" type="text" disabled="true">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Examenes Adjuntos</h3>
								</div>
								<div class="panel-body">
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Tipo Examen</th>
													<th>Fecha del Examen</th>
													<th>Archivo PDF</th>
													<th>Estado</th>
													<th>Upload</th>
												</tr>
											</thead>
											<tbody id="tabla_examenes">
												<!--<tr>
													<td>
														<select id="tipo_examen" class="form-control input-sm">
															<option value="0">Tipo de Examen</option>
															<?php
															//include("conexiones/lista_tipo_examen.php");
															?>
														</select>
													</td>
													<td>
														<input class="form-control input-sm" id="fecha_examen" placeholder="Fecha del Examen" type="date">
													</td>
													<td>
														<input type="file" class="form-control input-sm" id="archivos" name="archivos" multiple="multiple" onchange="validarCarga(); return false;">
													</td>
													<td id="estadoCarga">
														<span class="label label-danger">Sin carga</span>
													</td>
													<td>
														<input type="submit" class="btn btn-primary btn-sm" onclick="subirEnvios(); return false;" value="Subir" disabled="true" />
													</td>
												</tr>-->
											</tbody>
										</table>
									</div>
									<br>
									<!--<a href="conexiones/enviar_correo.php">Enviar</a>-->
									<input type="submit" class="btn btn-success btn-lg" onclick="enviarCorreo(); return false;" value="Enviar Correo" />
									<input type="submit" class="btn btn-info btn-md" onclick="agregarExamen(); return false;" value="Agregar Examen" />
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
