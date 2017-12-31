<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}

$id_usuario=$_SESSION['id_usuario'];
$tipo="Consulta";

?>

<!doctype html>
<html lang="en">

<head>
	<title>Consultas - Gutmedica</title>
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


					<h3 class="page-title">Consultar Examenes</h3>
					<div class="row">
						
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								
								<div class="col-md-4">
									<div class="input-group">
										<input class="form-control input-sm" id="cedula" placeholder="Cedula" type="text">
										<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="consultar(1); return false;">Buscar</button></span>
									</div>
									<div class="input-group">
										<select id="tipo_examen" class="form-control input-sm">
											<option value="0">Tipo de Examen</option>
											<option value="PHmetria">PHmetria</option>
											<option value="Manometria">Manometria</option>
										</select>
										<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="consultar(3); return false;">Buscar</button></span>
									</div>
								</div>
								<div class="col-md-4">
									<input class="form-control input-sm" type="date" id="fecha1" placeholder="Desde">
									<input class="form-control input-sm" type="date" id="fecha2" placeholder="Hasta">
									<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="consultar(2); return false;">Consultar</button></span>
								</div>
								<div class="col-md-4">

									
									<input class="form-control input-sm" type="date" id="fechaa1">
									
									<input class="form-control input-sm" type="date" id="fechaa2">
									<p>Elegir Items (Control+Click):</p>
									<select class="form-control input-sm" id="items" multiple="multiple">
										<option value="1">Id Usuario</option>
										<option value="2">Id Paciente</option>
										<option value="3">Email Paciente</option>
										<option value="4">Tipo Examen</option>
										<option value="5">Fecha Examen</option>
										<option value="7">Fecha Envio</option>
									</select>
									<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="consultar(4); return false;">Consultar</button></span>
									
								</div>
								<div class="panel-body">
									<table class="table table-striped" id="tabla_envios">
										<thead> 
											<tr>
												<th>ID</th>
												<th>Nombre</th>
												<th>Cedula</th>
												<th>Tipo Examen</th>
												<th>Fecha Examen</th>
												<th>Documento</th>
											</tr>
										</thead>
										<tbody id="tabla_consultas">
											
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
