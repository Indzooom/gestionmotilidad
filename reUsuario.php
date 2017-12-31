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
	<title>Usuario - Gutmedica</title>
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


					<h3 class="page-title">Registro de Usuarios</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<p>Role</p>
									<select id="role" multiple="multiple" class="form-control input-md">
										<option value="1">Envios</option>
										<option value="2">Consultas</option>				
										<option value="3">Registrar</option>				
										<option value="4">Motilidad</option>				
										<option value="5">Asignacion Estudios</option>				
										<option value="6">Parametrizacion</option>				
										<option value="7">Encuesta</option>				
									</select>
									<br>
									<input class="form-control input-md" id="nombre" placeholder="Nombre" type="text">
									<br>
									<input class="form-control input-md" id="email" placeholder="Email" type="email">
									<br>
									<input class="form-control input-md" id="clave" placeholder="Contraseña" type="password">
									<br>
									<input type="submit" class="btn btn-success btn-md" onclick="registrarUsuario(); return false;" value="Guardar" />
									
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
												<th>Role</th>
												<th>Nombre</th>
												<th>Email</th>
												<th>Evento</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include("conexiones/mostrarUsuarios.php");
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
