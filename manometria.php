<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}

$id_usuario=$_SESSION['id_usuario'];
$tipo="Envio";


if(isset($_GET['ced'])){
	$ced=$_GET['ced'];	
}else{
	$ced="";
}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Manometria - Gutmedica</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<?php
	include("html.php");
	echo $css;
	?>
</head>

<body onload="mostrarAlEntrar2(<?php echo $ced ?>); return false;">
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


					<h3 class="page-title">Formulario de Manometria</h3>
					<div class="row">


						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<div class="panel-heading">
										<h3 class="panel-title">Datos Sociodemográfcos</h3>
									</div>
									<input class="form-control input-sm" id="dato0" placeholder="Fecha" type="date"
									value=
									<?php
									include("conexiones/conexion.php");
									date_default_timezone_set($zonaHoraria);
									$fecha = new DateTime();
									$fechaa = $fecha->format('Y-m-d');
									echo $fechaa;
									?>
									disabled="disabled">
									<div class="input-group">
										<input class="form-control input-sm" id="dato1" placeholder="Cedula" type="text">
										<span class="input-group-btn"><button class="btn btn-primary btn-sm" type="button" onclick="validarPacienteForm2(); return false;">Buscar</button></span>
									</div>
									<input class="form-control input-sm" id="dato2" placeholder="Apellidos" type="text">
									<input class="form-control input-sm" id="dato3" placeholder="Nombres" type="text">
									<select id="dato4" class="form-control input-sm">
										<option value="0">Empresa de Salud</option>
										<?php
										include("conexiones/buscarEmpresa.php");
										?>
									</select>
									<input class="form-control input-sm" id="dato5" placeholder="Telefono" type="text">
									<input class="form-control input-sm" id="dato6" placeholder="Celular" type="text">
									<select id="dato7" class="form-control input-sm">
										<option value="0">Ciudad</option>
										<?php
										include("conexiones/buscarCiudad.php");
										?>
									</select>
									<input class="form-control input-sm" id="dato8" placeholder="Hospital o Centro de Atencion" type="text">
									<input class="form-control input-sm" id="dato9" placeholder="Medico Remitente" type="text">
									<select id="dato10" class="form-control input-sm">
										<option value="0">Especialidad</option>
										<?php
										include("conexiones/buscarEspecialidad.php");
										?>
										<option value="Otro">Otro</option>
									</select>
									<select id="dato11" class="form-control input-sm">
										<option value="0">Genero</option>
										<?php
										include("conexiones/buscarGenero.php");
										?>				
									</select>
									<input class="form-control input-sm" id="dato12" placeholder="Peso" type="number">
									<input class="form-control input-sm" id="dato13" placeholder="Talla" type="number">
									<input class="form-control input-sm" id="dato14" placeholder="Historia Clinica" type="text">
									<input class="form-control input-sm" id="dato15" placeholder="Nacimiento" type="date" onkeyup="calcularEdad()">
									<input class="form-control input-sm" id="dato16" name="edad" placeholder="Edad" type="text" disabled="disabled">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<div class="panel-heading">
										<h3 class="panel-title">Datos Clinicos</h3>
									</div>
									<p>Antecedentes Personales: </p>
									<select id="dato17" class="form-control input-sm" multiple="multiple" onchange="generarOtro('dato17', 'Datos Clinicos'); return false;">
										<option value="Esclerodermia">Esclerodermia</option>
										<option value="Acalasia">Acalasia</option>
										<option value="Esofagitis_erosiva">Esofagitis_erosiva</option>
										<option value="Cirugia_antirreflujo">Cirugia_antirreflujo</option>
										<option value="Manga_gastrica">Manga_gastrica</option>
										<option value="Esofago_de_Barret">Esofago_de_Barret</option>
										<option value="Dilataciones_esofagicas">Dilataciones_esofagicas</option>
										<option value="Tos_cronica">Tos_cronica</option>
										<option value="Asma">Asma</option>
										<option value="Laringitis">Laringitis</option>
										<option value="Otro">Otro</option>			
									</select>
									<div id="dato17Otro">
									</div>

									<p>Sintomas Manifestados: </p>
									<select id="dato18" class="form-control input-sm" multiple="multiple" onchange="generarOtro('dato18', 'Sintomas Manifestados'); return false;">
										<option value="Pirosis">Pirosis</option>
										<option value="Tos">Tos</option>
										<option value="Regurgitacion ">Regurgitacion</option>
										<option value="Dolor_toracico">Dolor_toracico</option>
										<option value="Tos_nocturna">Tos_nocturna</option>
										<option value="Disfonia">Disfonia</option>
										<option value="Disfagia_para_solidos">Disfagia_para_solidos</option>
										<option value="Disfagia_para_liquidos">Disfagia_para_liquidos</option>
										<option value="Disfagia_para_solidos_y_liquidos">Disfagia_para_solidos_y_liquidos</option>
										<option value="Odinofagia">Odinofagia</option>
										<option value="Carraspera">Carraspera</option>
										<option value="Epigastralgia">Epigastralgia</option>
										<option value="Sabor_amargo">Sabor_amargo</option>
										<option value="Crisis_de_asma">Crisis_de_asma</option>
										<option value="Globus">Globus</option>
										<option value="Eructo">Eructo</option>
										<option value="Otro">Otro</option>			
									</select>
									<div id="dato18Otro">
									</div>
									
									
									<select id="dato19" class="form-control input-sm">
										<option value="0">¿Estudio solicitado para realización de cirugía antirreflujo?</option>
										<option value="Si">Si</option>
										<option value="No">No</option>				
									</select>

									<div class="panel-heading">
										<h3 class="panel-title">Estudios Diagnosticos</h3>
									</div>

									<p>¿Tiene estudios diagnósticos previos a la realización del procedimiento?</p>
									<select id="dato20" class="form-control input-sm" multiple="multiple" onchange="generarOtro('dato20', 'Procedimiento'); return false;">
										<option value="Endoscopia_digestiva_alta">Endoscopia_digestiva_alta</option>
										<option value="pH-metria">pH-metria</option>				
										<option value="metria_con_Impendaciometria">pH-metria_con_Impendaciometria</option>
										<option value="No">Manometria_esofágica</option>
										<option value="Otro">Otro</option>
									</select>
									<div id="dato20Otro">
									</div>

									<p>Resultados de endoscopia, si las tiene: </p>
									<select id="dato21" class="form-control input-sm" multiple="multiple" onchange="generarOtro('dato21', 'Endoscopia'); return false;">
										<option value="Esofagitis_grado_A">Esofagitis_grado_A</option>
										<option value="Esofagitis_grado_B">Esofagitis_grado_B</option>
										<option value="Esofagitis_grado_C">Esofagitis_grado_C</option>
										<option value="Esofagitis_grado_D">Esofagitis_grado_D</option>
										<option value="Hernia_hiatal">Hernia_hiatal</option>				
										<option value="Esofago_de_Barret">Esofago_de_Barret</option>
										<option value="Otro">Otro</option>
									</select>
									<div id="dato21Otro">
									</div>

									<textarea class="form-control input-sm" id="dato22" placeholder="Resultado de manometría" type="text"></textarea>
									<textarea class="form-control input-sm" id="dato23" placeholder="Resultado de pH-metría" type="text"></textarea>
									<textarea class="form-control input-sm" id="dato24" placeholder="Resultado de pH-metría con Impendaciometría" type="text"></textarea>
									<textarea class="form-control input-sm" id="dato25" placeholder="Si tiene otro procedimiento, ¿cuál es el resultado?" type="text"></textarea>
									
									<div class="panel-heading">
										<h3 class="panel-title">Diagnosticos Clinico</h3>
									</div>

									<select id="dato26" class="form-control input-sm" onchange="generarOtro('dato26', 'Diagnostico'); return false;">
										<option value="0">¿Cuál es el diagnóstico clínico?</option>
										<option value="ERGE_sintomas_tipicos_y_RGE_mas_de_2_veces/semana_y/o_antecedente_de_esofagitis_erosiva_o_esofago_de_Barret">ERGE_sintomas_tipicos_y_RGE_mas_de_2_veces/semana_y/o_antecedente_de_esofagitis_erosiva_o_esofago_de_Barret</option>
										<option value="Sintomas_extra_esofagicos_sintomas_atipicos_(respiratorios)_en_ausencia_de_criterios_anteriores">Sintomas_extra_esofagicos_sintomas_atipicos_(respiratorios)_en_ausencia_de_criterios_anteriores</option>				
										<option value="ERGE_con_sintomas_atipicos_paciente_que_cumple_con_criterios_de_1_y_2">ERGE_con_sintomas_atipicos_paciente_que_cumple_con_criterios_de_1_y_2</option>				
										<option value="Estudio_de_eructo_supragastrico">Estudio_de_eructo_supragastrico</option>				
										<option value="Otro">Otro</option>
									</select>
									<div id="dato26Otro">
									</div>

									
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="panel">
								<div class="panel-body">
									<div class="panel-heading">
										<h3 class="panel-title">Datos del Examen</h3>
									</div>
									<select id="dato27" class="form-control input-sm">
										<option value="0">Medio para realizar el estudio</option>
										<option value="SSN">SSN</option>
										<option value="SSN/Viscoso">SSN/Viscoso</option>				
									</select>
									<select id="dato28" class="form-control input-sm">
										<option value="0">Protocolo completo (estudio con 10 tragos de SSN)</option>
										<option value="Si">Si</option>
										<option value="No">No</option>					
									</select>
									<input class="form-control input-sm" id="dato29" placeholder="Medicamentos Usados" type="text">
									
									<p>Cuál inhibidor está tomando: </p>
									<select id="dato30" class="form-control input-sm" multiple="multiple" onchange="generarOtro('dato30', 'Inhibidor'); return false;">
										<option value="Omeprazol">Omeprazol</option>
										<option value="Lanzoprazol">Lanzoprazol</option>				
										<option value="Pantoprazol">Pantoprazol</option>
										<option value="Esomeprazol">Esomeprazol</option>
										<option value="Rabeprazol">Rabeprazol</option>
										<option value="Dexlanzoprazol">Dexlanzoprazol</option>
									</select>
									<div id="dato30Otro">
									</div>
									
									<input class="form-control input-sm" id="dato31" placeholder="Dosis de la medicación consumida actualmente (en mg)" type="number">
									<select id="dato32" class="form-control input-sm">
										<option value="0">Dosis al día (# de toma en 24 horas)</option>
										<option value="Dosis_unica">Dosis_unica</option>
										<option value="Dosis_doble">Dosis_doble</option>				
									</select>
									<input class="form-control input-sm" id="dato33" placeholder="¿Consume analgésicos?" type="text">
									<select id="dato34" class="form-control input-sm">
										<option value="0">Profesional de la Salud</option>
										<?php
										include("conexiones/buscarProfesional.php");
										?>
									</select>

									<div class="panel-heading">
										<h3 class="panel-title">Resultados del Examen</h3>
									</div>
									<select id="dato35" class="form-control input-sm">
										<option value="0">Resultado del procedimiento según Clasificación de Chicago Versión 3.0</option>
										<option value="Acalasia_tipo_I">Acalasia_tipo_I</option>
										<option value="Acalasia_tipo_II">Acalasia_tipo_II</option>
										<option value="Acalasia_tipo_III">Acalasia_tipo_III</option>
										<option value="Obstruccion_de_salida_de_la_union_EG">Obstruccion_de_salida_de_la_union_EG</option>
										<option value="Peristalsis_ausente">Peristalsis_ausente</option>
										<option value="Espasmo_esofagico_distal_">Espasmo_esofagico_distal_(EED)</option>
										<option value="Esofago_de_Jackhammer">Esofago_de_Jackhammer</option>
										<option value="Peristalsis_fragmentada">Peristalsis_fragmentada</option>
										<option value="MEI">MEI</option>
										<option value="Normal">Normal</option>				
									</select>	
									<select id="dato36" class="form-control input-sm">
										<option value="0">Tono del esfínter</option>
										<option value="Hipertonico">Hipertonico</option>
										<option value="Hipotonico">Hipotonico</option>				
										<option value="Normal">Normal</option>	
									</select>
									<select id="dato37" class="form-control input-sm">
										<option value="0">Tipo de unión EG</option>
										<option value="Tipo_I">Tipo_I</option>
										<option value="Tipo_II">Tipo_II</option>
										<option value="Tipo_IIa">Tipo_IIa</option>
										<option value="Tipo_IIb">Tipo_IIb</option>	
									</select>
									<select id="dato38" class="form-control input-sm">
										<option value="0">Test de degluciones rápidas</option>
										<option value="Falla_en_la_integridad_inhibitoria">Falla_en_la_integridad_inhibitoria</option>
										<option value="Falla_en_la_recuperacion_excitatoria">Falla_en_la_recuperacion_excitatoria</option>
										<option value="Falla_en_ambas">Falla_en_ambas</option>
										<option value="Normal">Normal</option>	
										<option value="No_aplica">No_aplica</option>
									</select>
									<select id="dato39" class="form-control input-sm">
										<option value="0">Barra cricofaríngea</option>
										<option value="Si">Si</option>
										<option value="No">No</option>					
									</select>
									<select id="dato40" class="form-control input-sm">
										<option value="0">Tránsito de bolo viscoso</option>
										<option value="Completo">Completo</option>
										<option value="Incompleto">Incompleto</option>					
										<option value="No_aplica">No_aplica</option>					
									</select>
									<select id="dato41" class="form-control input-sm">
										<option value="0">Tránsito de bolo líquido</option>
										<option value="Completo">Completo</option>
										<option value="Incompleto">Incompleto</option>					
										<option value="No_aplica">No_aplica</option>					
									</select>
									<select id="dato42" class="form-control input-sm">
										<option value="0">Médico que leyó e interpretó el procedimiento</option>
										<option value="Luis_Fernando_Pineda_Ovalle">Luis_Fernando_Pineda_Ovalle</option>	
									</select>
									<br>
									<input type="submit" class="btn btn-success btn-sm" onclick="validarRegistroPacienteForm2(); return false;" value="Guardar" />
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
