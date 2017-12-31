<?php

$css = "<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
        <link rel='stylesheet' href='assets/vendor/font-awesome/css/font-awesome.min.css'>
        <link rel='stylesheet' href='assets/vendor/linearicons/style.css'>
		<link rel='stylesheet' href='assets/vendor/chartist/css/chartist-custom.css'>
		<link rel='stylesheet' href='assets/vendor/toastr/toastr.min.css'>
        <!-- MAIN CSS -->
        <link rel='stylesheet' href='assets/css/main.css'>
        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel='stylesheet' href='assets/css/demo.css'>
        <!-- GOOGLE FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
        <!-- ICONS -->
        <link rel='apple-touch-icon' sizes='76x76' href='assets/img/apple-icon.png'>
		<link rel='icon' type='image/png' sizes='96x96' href='assets/img/favicon.png'>
		<script src='assets/scripts/jquery-3.2.1.min.js'></script>
        <script src='assets/scripts/ajax.js'></script>
        
		<link rel='stylesheet' href='assets/css/style.css'>
		<link rel='icon' href='assets/img/iconn.png'>";
#<script src='//code.jquery.com/jquery-1.11.3.min.js'></script>
#<script src='assets/scripts/live.js'></script>
$nav = "<nav class='navbar navbar-default navbar-fixed-top'>
			<div class='brand'>
				<a href=''><img src='assets/img/logo.png' alt='Klorofil Logo' id='logopa' class='img-responsive logo'></a>
			</div>
			<div class='container-fluid'>
				<div class='navbar-btn'>
					<button type='button' class='btn-toggle-fullwidth'><i class='lnr lnr-arrow-left-circle'></i></button>
				</div>
				<div id='navbar-menu'>
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='assets/img/user.png' class='img-circle' alt='Avatar'> <span> ".$_SESSION['name']."</span> <i class='icon-submenu lnr lnr-chevron-down'></i></a>
							<ul class='dropdown-menu'>
								".#<li><a href='#'><i class='lnr lnr-user'></i> <span>Perfil</span></a></li>
								"<li><a href='conexiones/logout.php'><i class='lnr lnr-exit'></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
        </nav>";
        
$menu = "<div id='sidebar-nav' class='sidebar'>
			<div class='sidebar-scroll'>
				<nav>
					<ul class='nav'>
						<li>
							<a href='#subPages6' data-toggle='collapse' class='collapsed'><i class='lnr lnr-book'></i> <span>Asignacion Estudios</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a>
							<div id='subPages6' class='collapse '>
								<ul class='nav'>
									<li><a onclick='verificarRol(5, 1, \"medicos.php\"); return false;' href='#' class=''>Medicos</a></li>
									<li><a onclick='verificarRol(5, 2, \"pacientes_programados.php\"); return false;' href='#' class=''>Pacientes Programados</a></li>
									<li><a onclick='verificarRol(5, 3, \"envios_estudios.php\"); return false;' href='#' class=''>Envios Estudios</a></li>
								</ul>
							</div>
						</li>
						<li onclick='verificarRol(1, 0, \"envios.php\"); return false;'><a href='#'><i class='lnr lnr-rocket'></i> <span>Envios</span></a></li>
						<li><a onclick='verificarRol(2, 0, \"consultas.php\"); return false;' style='cursor:pointer;'><i class='lnr lnr-download'></i> <span>Consultas</span></a></li>
						<li>
							<a href='#subPages3' data-toggle='collapse' class='collapsed'><i class='lnr lnr-cog'></i> <span>Parametrización</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a>
							<div id='subPages3' class='collapse '>
								<ul class='nav'>
									<li><a onclick='verificarRol(6, 1, \"tipo_examen.php\"); return false;' href='#' class=''>Tipo de Examenes</a></li>
									<li><a onclick='verificarRol(6, 2, \"reUsuario.php\"); return false;' href='#' class=''>Usuario</a></li>
									<li><a onclick='verificarRol(6, 3, \"empresa.php\"); return false;' href='#' class=''>Empresa</a></li>
									<li><a onclick='verificarRol(6, 4, \"actividad.php\"); return false;' href='#' class=''>Bitacora de Evento</a></li>
									<li><a onclick='verificarRol(6, 5, \"sms.php\"); return false;' href='#' class=''>SMS</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href='#subPages' data-toggle='collapse' class='collapsed'><i class='lnr lnr-construction'></i> <span>Registrar</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a>
							<div id='subPages' class='collapse '>
								<ul class='nav'>
									<li><a onclick='verificarRol(3, 1, \"pacientes.php\"); return false;'  href='#' class=''>Pacientes</a></li>
									<li><a onclick='verificarRol(3, 2, \"importar_pacientes.php\"); return false;' href='#' class=''>Importar Pacientes</a></li>
									<li><a onclick='verificarRol(3, 3, \"doctores.php\"); return false;' href='#' class=''>Doctores</a></li>
									<li><a onclick='verificarRol(3, 4, \"profesional.php\"); return false;' href='#' class=''>Profesionales</a></li>
									<li><a onclick='verificarRol(3, 5, \"especialidades.php\"); return false;' href='#' class=''>Especialidades</a></li>
									<li><a onclick='verificarRol(3, 6, \"genero.php\"); return false;' href='#' class=''>Genero</a></li>
									<li><a onclick='verificarRol(3, 7, \"tipo_medico.php\"); return false;' href='#' class=''>Tipo Medico</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href='#subPages2' data-toggle='collapse' class='collapsed'><i class='lnr lnr-bookmark'></i> <span>Encuesta Motilidad</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a>
							<div id='subPages2' class='collapse '>
								<ul class='nav'>
									<li><a onclick='verificarRol(4, 1, \"phmetria.php\"); return false;' href='#' class=''>Phmetria</a></li>
									<li><a onclick='verificarRol(4, 2, \"manometria.php\"); return false;' href='#' class=''>Manometria</a></li>
									<li><a onclick='verificarRol(4, 3, \"listaPhmetria.php\"); return false;' href='#' class=''>Lista Phmetria</a></li>
									<li><a onclick='verificarRol(4, 4, \"listaManometria.php\"); return false;' href='#' class=''>Lista Manometria</a></li>
									<li>
										<a href='#subPages5' data-toggle='collapse' class='collapsed'><span>Parametrización</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a>
										<div id='subPages5' class='collapse '>
											<ul class='nav'>
												<li><a onclick='verificarRol(4, 5, \"genero.php\"); return false;' href='#' class=''>Genero</a></li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</li>
						
						<li>
							<a href='#subPages4' data-toggle='collapse' class='collapsed'><i class='lnr lnr-cog'></i> <span>Encuesta Satisfacción</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a>
							<div id='subPages4' class='collapse '>
								<ul class='nav'>
									<li><a onclick='verificarRol(7, 1, \"doctores.php\"); return false;' href='#' class=''>Configuración Items</a></li>
									<li><a onclick='verificarRol(7, 2, \"resultados_encuesta.php\"); return false;' href='#' class=''>Resultados</a></li>
									<li><a onclick='verificarRol(7, 3, \"exportar_encuesta.php\"); return false;' href='#' class=''>Exportar</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>";
//<li><a onclick='verificarRol(5); return false;' href='#'><i class='lnr lnr-chart-bars'></i> <span>Estadistica</span></a></li>

$footer = "<div class='clearfix'></div>
			<footer>
				<div class='container-fluid'>
					<p class='copyright'>&copy; 2017. Gut-Medica</a></p>
				</div>
			</footer>";

$js = "	<script src='assets/vendor/jquery/jquery.min.js'></script>
		<script src='assets/vendor/bootstrap/js/bootstrap.min.js'></script>
		<script src='assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js'></script>
		<script src='assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js'></script>
		<script src='assets/vendor/chartist/js/chartist.min.js'></script>
		<script src='assets/scripts/klorofil-common.js'></script>
		<script src='assets/vendor/toastr/toastr.min.js'></script>";

?>