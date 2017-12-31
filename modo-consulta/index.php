<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

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
<body>

	<div id="page-wrap">

		<div class="block" id="autocomplete">
			<img src="img/logo.png" id="logo" alt="">
			<!--<h1>Consulta de Examenes</h1>-->
			<h2>
				Nro. de Identificacion
			</h2>
			<input id="text" type="text" placeholder="1234567890">
			<br>
			<button type="button" id"btna" class="btn btn-primary btn-sm" onclick="login(); return false;">Buscar</button>
			<div class="code ui-corner-all">
				<h4>HTML</h4>
				<pre class="prettyprint lang-html">&lt;input id="text" type="text" placeholder=" Enter something..."&gt;</pre>
				<h4>Script</h4>
				<pre class="prettyprint lang-js">// Autocomplete demo
					var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure",
						"COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript",
						"Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme" ];

					$('#text')
						.keyboard({ layout: 'qwerty' })
						.autocomplete({
							source: availableTags
						})
						// position options added after v1.23.4
						.addAutocomplete({
							position : {
								of : null,        // when null, element will default to kb.$keyboard
								my : 'right top', // 'center top', (position under keyboard)
								at : 'left top',  // 'center bottom',
								collision: 'flip'
							}
						})
						.addTyping();
				</pre>
			</div>
		</div>

	</div>

</body></html>
