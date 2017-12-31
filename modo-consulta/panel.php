<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

	<title>Consulta - Gut-Medica</title>

	<!-- jQuery (required) & jQuery UI + theme (optional) -->
	<link href="docs/css/jquery-ui.min.css" rel="stylesheet">
	<!-- still using jQuery v2.2.4 because Bootstrap doesn't support v3+ -->
	<script src="docs/js/jquery-latest.min.js"></script>
	<script src="docs/js/jquery-ui.min.js"></script>
	<!-- <script src="docs/js/jquery-migrate-3.0.0.min.js"></script> -->

	<!-- keyboard widget css & script (required) -->
	<link href="css/keyboard.css" rel="stylesheet">
	<script src="js/jquery.keyboard.js"></script>

	<!-- keyboard extensions (optional) -->
	<script src="js/jquery.mousewheel.js"></script>
	<script src="js/jquery.keyboard.extension-typing.js"></script>
	<script src="js/jquery.keyboard.extension-autocomplete.js"></script>
	<script src="js/jquery.keyboard.extension-caret.js"></script>

	<!-- demo only -->
	<link rel="stylesheet" href="docs/css/bootstrap.min.css">
	<link rel="stylesheet" href="docs/css/font-awesome.min.css">
	<link href="docs/css/demo.css" rel="stylesheet">
	<link href="docs/css/tipsy.css" rel="stylesheet">
	<link href="docs/css/prettify.css" rel="stylesheet">
	<script src="docs/js/bootstrap.min.js"></script>
	<script src="docs/js/demo.js"></script>
	<script src="docs/js/jquery.tipsy.min.js"></script>
	<script src="docs/js/prettify.js"></script> <!-- syntax highlighting -->
	<link rel="stylesheet" href="css/style.css">
	<script src="js/ajax.js"></script>
	
</head>
<body onload="consultar(<?php echo $_GET['id_paciente'] ?>); return false;">

	<div id="page-wrap">
		<h1>
			<?php
			echo "Paciente: ".$_GET['nombre_completo'];
			?>
		</h1>
		<table class="table table-striped table-hover table-bordered">
			<thead class="thead-dark">
				<tr>
				<th><img src="img/id.png" id="icon" alt=""> ID</th>
				<th><img src="img/envio.png" id="icon" alt=""> Fecha Envio</th>
				<th><img src="img/fecha.png" id="icon" alt=""> Fecha Examen</th>
				<th><img src="img/examen.png" id="icon" alt=""> Tipo Examen</th>
				<th><img src="img/descarga.png" id="icon" alt=""> Documento</th>
				</tr>
			</thead>
			<tbody id="datos">
				
			</tbody>
		</table> 

		<a href="index.php"><button type="button" id"btna" class="btn btn-danger btn-sm">Volver</button></a>
		

	</div>

</body>
</html>
