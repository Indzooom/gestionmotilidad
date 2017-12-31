<?php
 $_SESSION['name'] = '';
 $rol='';
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login - GutMedica</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><link rel="icon" href="http://example.com/favicon.png">
	<!-- VENDOR CSS -->
	<?php
	include("html.php");
	echo $css;
	?>
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo.png" id="logoin"></div>
								<p class="lead">Iniciar Sesion</p>
							</div>
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Contraseña</label>
									<input type="password" class="form-control" id="clave" placeholder="Contraseña">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Recordar</span>
									</label>
								</div>
								<button class="btn btn-primary btn-lg btn-block" onclick="login(); return false;">Entrar</button>

								<!--<input type="submit" class="btn btn-primary btn-lg btn-block" onclick="login(); return false;" value="Entrar" />-->
								<!--<button type="submit" href="panel.php" class="btn btn-primary btn-lg btn-block">Entrar</button>-->
								<div class="bottom">
									<span class="helper-text"><i class="fa lnr lnr-rocket"></i> <a href="modo-consulta/index.php">Modo Consulta</a></span>
								</div>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Gut-Medica</h1>
							<p>Centro de Enfermedades Digetivas</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
