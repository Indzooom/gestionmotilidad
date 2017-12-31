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
	<title>Medicos - Gutmedica</title>
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


					<h3 class="page-title">Registrar Medicos</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<input class="form-control input-sm" id="nombre" placeholder="Nombre" type="text">
									<input class="form-control input-sm" id="apellido" placeholder="Apellido" type="text">
									<select id="especialidad" class="form-control input-sm">
										<option value="0">Especialidad</option>
										<?php
										include("conexiones/buscarEspecialidad.php");
										?>
									</select>
									<select id="tipo" class="form-control input-sm">
										<option value="0">Tipo</option>
										<?php
										include("conexiones/buscarTipoMedico.php");
										?>
									</select>
									<input class="form-control input-sm" id="email" placeholder="Email" type="email">
									<input class="form-control input-sm" id="celular" placeholder="Celular" type="text">
									<textarea  rows="3" class="form-control input-sm" id="direccion" placeholder="Dirección" type="text"></textarea>
									<textarea rows="3" class="form-control input-sm" id="observaciones" placeholder="Observaciones" type="text"></textarea>
									<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="registrarMedico(); return false;">Guardar</button></span>

								</div>
							</div>
						</div>

						<div class="col-md-8">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>id</th>
												<th>Nombre</th>
												<th>Apellido</th>
												<th>Email</th>
												<th>Celular</th>
												<th>Evento</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include("conexiones/mostrarMedico.php");
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
