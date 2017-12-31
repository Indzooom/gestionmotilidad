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
	<title>Configuracion SMS - Gutmedica</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<?php
	include("html.php");
	echo $css;
	?>
</head>

<body onload="mostrarSmsAlEntrar(); return false;">
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


					<h3 class="page-title">Editar SMS</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-body">
									<br>
									<p>Mensaje personalizado: </p>
									<div class="input-group">
										<textarea class="form-control input-md" id="sms" name="sms" cols="170" rows="5"></textarea>
									</div>
									<span class="input-group-btn"><button class="btn btn-primary btn-md" type="button" onclick="actualizarSms(); return false;">Guardar</button></span>
									<a><span class="label label-default" style="cursor:pointer;" onclick="insertarVar(1); return false;">Insertar Nombre</span></a>
									<a><span class="label label-primary" style="cursor:pointer;" onclick="insertarVar(2); return false;">Insertar Apellido</span></a>
									<a><span class="label label-info" style="cursor:pointer;" onclick="insertarVar(3); return false;">Insertar Cedula</span></a>
									<a><span class="label label-warning" style="cursor:pointer;" onclick="insertarVar(4); return false;">Insertar Email</span></a>
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
