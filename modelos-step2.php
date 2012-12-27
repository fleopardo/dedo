<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 ie6" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8 ie7" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9 ie8" lang="es"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10 ie9" lang="es"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
	<title>Peugeot: Test Drive</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<!--[if lt IE 9]><script src="js/libs/html5.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="css/global.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.ui.selectmenu.css" />
	<script src="js/libs/jquery.min.js"></script>
	<script type="text/javascript" src="./js/libs/jquery-ui-1.8.12.custom.min.js"></script>
	<script type="text/javascript" src="./js/libs/jquery.ui.selectmenu.js"></script>
	<script type="text/javascript" src="./js/libs/jquery.placeholder.js"></script>

</head>
<body>

	<?php include("./includes/header.php"); ?>

	<!-- Modelos - Elegir modelo -->
	<section class="section modelos step2" id="modelos-step2">
		<div class="container">
			<h1><span>2.</span> Elija el modelo</h1>

			<div class="lista-autos">
				<ul>
					<li class="p-rcz"><span class="hide">Peugeot RCZ</span></li>
					<li class="p-508"><span class="hide">Peugeot 508</span></li>
					<li class="p-308cc"><span class="hide">Peugeot 308 CC</span></li>
					<li class="p-308gti"><span class="hide">Peugeot 308 GTI</span></li>
					<li class="p-308"><span class="hide">Peugeot 308</span></li>
					<li class="p-408"><span class="hide">Peugeot 408</span></li>
					<li class="p-3008"><span class="hide">Peugeot 3008</span></li>
				</ul>
			</div>

			<form id="form-modelos-step2" method="GET" action="modelos-step3.php" data-load="content3">
				<fieldset>
					<div class="row">
						<select name="vehiculo">
							<option>308 allure</option>
							<option>207 gti</option>
							<option>408</option>
						</select>
						<input type="submit" value="" title="Confirmar">
					</div>
				</fieldset>
			</form>

			<a href="index.php" class="volver" data-scroll:anchor="#home">Volver</a>
		</div>

		<script type="text/javascript" src="./js/modelos-step2.js" class="script"></script>
	</section>

</body>
</html>