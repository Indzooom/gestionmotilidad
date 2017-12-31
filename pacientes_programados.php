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
	<title>Pacientes Programados - Gutmedica</title>
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


					<h3 class="page-title">Pacientes Programados</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<p>Fecha Inicio:</p>
									<input class="form-control input-sm" id="fecha1" placeholder="" type="date">
									<p>Fecha Fin:</p>
									<input class="form-control input-sm" id="fecha2" placeholder="" type="date">
									<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="cargarListPP(); return false;">Buscar</button></span>
								</div>
							</div>
						</div>

						<div class="col-md-9">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>id</th>
												<th>Nombre</th>
												<th>Apellido</th>
												<th>Usuario</th>
												<th>Encuesta</th>
												<th>Estado</th>
												<th>Evento</th>
												<th>Notas</th>
											</tr>
										</thead>
										<tbody id="listPP">
											<?php
											include("conexiones/mostrarPacientesProgramados.php");
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
						</div>
						<div class="col-md-3">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<p>Notas del Paciente: </p>
									<div id="notasp">
										<textarea name="notas" id="notas" rows="1" disabled="true"></textarea>
									</div>
									<br>
									<p>Asignar Medico</p>
									<div id="asigmedico">
										<select id="medico" class="form-control input-sm" disabled="true">
											<option value="0">Medico</option>
											<?php
											include("conexiones/buscarMedicoList.php");
											?>
										</select>
									</div>
									<br>
									<div id="btnmd">
										<span class="input-group-btn"><button class="btn btn-primary btn-sm" id="btnMedNot" type="button" onclick="guardarAsigYNotas(0); return false;">Guardar</button></span>
									</div>
									
								</div>
							</div>
							<!-- END TABLE STRIPED -->
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
