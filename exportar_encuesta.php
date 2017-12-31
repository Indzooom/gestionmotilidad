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
	<title>Exportar Encuesta - Gutmedica</title>
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


					<h3 class="page-title">Exportar Encuestas</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<select id="op" class="form-control input-sm" onchange="cambiarOpEncuesta(); return false;">
									<option value="0">Tipo de Busqueda</option>
									<option value="1">Fecha</option>
									<option value="2">Todo</option>
									</select>
									<div class="input-group">
										<input class="form-control input-sm" id="fecha1" type="date" disabled="true">
										<input class="form-control input-sm" id="fecha2" type="date" disabled="true">
									</div>
									<button class="btn btn-primary btn-sm" type="button" onclick="exportarEncuesta(); return false;">Exportar</button>
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
