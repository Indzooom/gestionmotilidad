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
	<title>Resultados Encuesta - Gutmedica</title>
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


					<h3 class="page-title">Resultados Encuesta</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-body">
									<div class="col-md-4">
										<div class="panel">
											<div class="panel-body">
												<p>Fecha Inicio:</p>
												<input class="form-control input-md" id="fecha1"  type="date">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel">
											<div class="panel-body">
												<p>Fecha Fin:</p>
												<input class="form-control input-md" id="fecha2"  type="date">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel">
											<div class="panel-body">
												<br>
												<br>
												<span class="input-group-btn"><button class="btn btn-primary btn-md" type="button" onclick="buscarEncuestaFecha(); return false;">Buscar</button></span>
											</div>
										</div>
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
												<th>Fecha</th>
												<th>Nombre</th>
												<th>Telefono</th>
												<th>Servicio</th>
												<th>Profesional</th>
											</tr>
										</thead>
										<tbody id="encuestaFecha">
											
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
