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

	<!-- Ubicacion - Elegir modelo -->
	<section class="section ubicacion step3" id="ubicacion-step3">
		<div class="container">
			<h1><span>3.</span> Confirmar vehiculo</h1>
			<p>En el stand de pinamar el lunes 07/01/13 de 9 a 12:30 y de 16:30 a 20:00 tenes disponibles los siguientes vehiculos...</p>

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

			<form id="form-ubicacion-step3" method="GET" action="confirmacion.php" data-load="content4">
				<fieldset>
					<div class="row">
						<select name="vehiculo">
							<option>308 allure</option>
							<option>207 gti</option>
							<option>408</option>
						</select>
						<input type="submit" value="" title="Reservar turno">
					</div>
				</fieldset>
			</form>

			<a href="ubicacion-step2.php" class="volver" data-scroll:anchor="#ubicacion-step2">Volver</a>
		</div>

		<script type="text/javascript" src="./js/ubicacion-step3.js" class="script"></script>

	</section>

</body>
</html>