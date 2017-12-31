<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}

$id_usuario=$_SESSION['id_usuario'];
$name=$_SESSION['name'];

?>

<!doctype html>
<html lang="en">

<head>
	<title>Actividad - Gutmedica</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<?php
	include("html.php");
	echo $css;
	?>
</head>

<body onload="mostrarTablaActividad0(); return false;">
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

					<h3 class="page-title">Actividad de los Usuarios</h3>
					<div class="row">

						<div class="col-md-3">
							<h5>Consultar por fecha</h5>
							<input class="form-control input-sm" type="date" id="fecha1" placeholder="Desde">
							<input class="form-control input-sm" type="date" id="fecha2" placeholder="Hasta">
							<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="mostrarTablaActividad(); return false;">Consultar</button></span>
						</div>
						
						<div class="col-md-9">
							<!-- TIMELINE -->
							<div class="panel panel-scrolling">
								<div class="panel-body">
									<ul class="list-unstyled activity-list">
										<li id="tabla_actividad">
											
										</li>
									</ul>
								</div>
							</div>
							<!-- END TIMELINE -->
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
