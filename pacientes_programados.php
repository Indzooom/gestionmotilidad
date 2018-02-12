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

						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>id</th>
												<th>Nombre</th>
												<th>Apellido</th>
												<th>Cedula</th>
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
						
						
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->

			<!-- MODAL -->
			<div class="modal fade" id="medNotPa" tabindex="-1" role="dialog" aria-labelledby="medicoPacienteModalCenter" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div id="tit">
								
							</div>
							
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div id="medPa">
								<div hidden id="asigmedico">
									<select id="medico" class="form-control input-sm" >
										<option value="0">Medico</option>
										<?php
										include("conexiones/buscarMedicoList.php");
										?>
									</select>
								</div>
							</div>

							<div id="notPa">
								
								
								</div>
							</div>
							
							
						<div class="modal-footer">
							
							<div id="btnmd2">
								<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN MODAL -->

			

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
