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
	<title>Envios Estudios - Gutmedica</title>
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


					<h3 class="page-title">Medicos Asignados</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<p>Buscar Medico: </p>
									<div class="input-group">
										<select id="medico" class="form-control input-sm">
											<option value="0">Medico</option>
											<?php
											include("conexiones/buscarMedicoList.php");
											?>
										</select>
										<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button"  onclick="cargarListAP(); return false;">Buscar</button></span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nombre Paciente</th>
												<th>Apellido Paciente</th>
												<th>Cedula Paciente</th>
												<th>Fecha Exmamen</th>
												<th>¿Quien Asigno?</th>
												<th>Tipo</th>
												<th>Estado</th>
												<th>Evento</th>
											</tr>
										</thead>
										<tbody id="listAsigMed">
											
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
						</div>
						
					</div>
				</div>
			</div>

			<div class="modal fade" id="medEnviar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLongTitle">Enviar Notificacion a Medico</h3>
							<p>Esta opcion realiza un envio via SMS y Email al medico asignado.</p>
							<small style="color: red;">Acepte y envie solo si el paciente fue atendido.</small>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<select id="unidad" class="form-control input-sm">
								<option value="0">Seleccione la Unidad</option>
								<option value="1">Unidad 1</option>
								<option value="2">Unidad 2</option>
							</select>
							
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-primary" id="btnAsigMed" onclick='enviarAsigMed(0); return false;'>Aceptar y Enviar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	</div>

	<?php
	include("html.php");
	echo $footer;
	?>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<?php
	include("html.php");
	echo $js;
	?>
	
</body>

</html>
