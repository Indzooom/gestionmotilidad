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
	<title>Doctores - Gutmedica</title>
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


					<h3 class="page-title">Registrar Doctores</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<br>
									<div class="input-group">
										<input class="form-control input-md" id="nombre" placeholder="Nombre del Doctor" type="text">
										<span class="input-group-btn"><button class="btn btn-primary btn-md" type="button" onclick="registrarDoctor(); return false;">Registrar</button></span>
									</div>
									<br>
									<h4>Roles</h4>
									<select name="" id="cga" class="form-control input-md">
										<option value="0">Consulta de Gastroenterologia Adultos</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="cgp" class="form-control input-md">
										<option value="0">Consulta de Gastroenterologia Pediatrica</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="cn" class="form-control input-md">
										<option value="0">Consulta de Nutricion</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="cc" class="form-control input-md">
										<option value="0">Consulta de Coloproctologia</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="pe" class="form-control input-md">
										<option value="0">Procedimientos Endoscopicos</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="pc" class="form-control input-md">
										<option value="0">Procedimientos de Coloproctologia</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="m" class="form-control input-md">
										<option value="0">Motilidad</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="tbf" class="form-control input-md">
										<option value="0">Terapia Bio Feedback</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
									<select name="" id="pp" class="form-control input-md">
										<option value="0">Procedimiento Pediatria</option>
										<option value="1">Si</option>
										<option value="0">No</option>
									</select>
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
												<th>CGA</th>
												<th>CGP</th>
												<th>CN</th>
												<th>CC</th>
												<th>PE</th>
												<th>PC</th>
												<th>M</th>
												<th>TBF</th>
												<th>PP</th>
												<th>Evento</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include("conexiones/mostrarDoctores.php");
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
