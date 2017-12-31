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
	<title>Pacientes - Gutmedica</title>
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


					<h3 class="page-title">Registrar/Actualizar Pacientes</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<select id="tipo_documento" class="form-control input-md">
										<option value="0">Tipo de Documento</option>
										<option value="1">CC2</option>
										<option value="2">CE</option>
										<option value="3">TI</option>
										<option value="4">RC</option>
										<option value="5">CC</option>
										
									</select>
									<br>
									<input class="form-control input-md" id="cedula" placeholder="Nro. de Identificacion" type="text">
									<br>
									<input class="form-control input-md" id="nombre1" placeholder="Primer Nombre" type="text">
									<br>
									<input class="form-control input-md" id="nombre2" placeholder="Segundo Nombre" type="text">
									<br>
									<input class="form-control input-md" id="apellido1" placeholder="Primer Apellido" type="text">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<input class="form-control input-md" id="apellido2" placeholder="Segundo Apellido" type="text">
									<br>
									<input class="form-control input-md" id="direccion" placeholder="Direccion" type="text">
									<br>
									<select id="ciudad" class="form-control input-md">
										<option value="0">Ciudad</option>	
										<?php
										include("conexiones/buscarCiudad.php")
										?>
									</select>
									<br>
									<input class="form-control input-md" id="nacimiento" placeholder="Nacimiento" type="date" onkeyup="calcularEdad()">
									<br>
									<input class="form-control input-md" id="edad" name="edad" placeholder="Edad" type="number" disabled="disabled">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<input class="form-control input-md" id="telefono" placeholder="Telefono" type="text">
									<br>
									<input class="form-control input-md" id="celular" placeholder="Celular" type="text">
									<br>
									<input class="form-control input-md" id="email" placeholder="Email" type="email">
									<br>
									<select id="sexo" class="form-control input-md" onchange="generarOtroGenero(); return false;">
										<option value="0">Genero</option>	
										<option value="M">M</option>
										<option value="F">F</option>
										<option value="Otro">Otro</option>
									</select>
									<div id="sexoOtro">
									
									</div>
									<br>
									<input type="submit" class="btn btn-success btn-md" onclick="registrarPaciente(); return false;" value="Guardar" />
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<div class="col-md-3">
										<div class="input-group">
											<input class="form-control input-sm" type="text" id="cedula2" placeholder="Cedula">
											<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="tablaPacientes(); return false;">Buscar</button></span>
										</div>
									</div>
									
									<table class="table table-striped">
										<thead>
											<tr>
												<th>id</th>
												<th>1er. Nombre</th>
												<th>1er. Apellido</th>
												<th>Cedula</th>
												<th>Ciudad</th>
												<th>Edad</th>
												<th>Telefono</th>
												<th>Celular</th>
												<th>Email</th>
												<th>Editar</th>
											</tr>
										</thead>
										<tbody>
											<tr id="tabla_pacientes">
												
											</tr>
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
