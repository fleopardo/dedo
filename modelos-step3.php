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
	<!--google map-->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=es"></script>
	<!-- -->
</head>
<body>

	<?php include("./includes/header.php"); ?>

	<!-- Modelos - Elegir ubicacion -->
	<section class="section modelos step3">
		<div class="container">
			<h1><span>3.</span> Confirmar turno</h1>
			<p>Su próximo Peugeot 308 Allure 1.6 C/ Nav lo espera el...</p>

			<form id="confirmar-turno" method="GET" action="confirmacion.php">
				<div>
					<label for="lugar">Lugar</label>
					<select class="lugar" id="lugar-test">
						<option data-long="-58.47" data-lat="-34.58">Pinamar</option>
						<option data-long="-58.46" data-lat="-34.58">Cariló</option>
						<option data-long="3" data-lat="3">Villa Gesell</option>
						<option data-long="4" data-lat="4">Mar del Plata</option>
					</select>
				</div>

				<div>
					<label for="mes">Mes</label>
					<select class="mes">
						<option>Octubre</option>
					</select>
				</div>

				<div>
					<label for="dia">Día</label>
					<select class="dia">
						<option>27</option>
					</select>
				</div>

				<div>
					<label for="horario">Horario</label>
					<select class="hora">
						<option>9:00 - 9:20</option>
					</select>
				</div>

				<input type="submit" value=" " title="Solicite turno" />
			</form>

			<div class="contentMap">
				<div class="map" id="map">
				</div>
			</div>

			<div class="img-result p-408"></div>

			<a href="modelos-step2.php" class="volver">Volver</a>
		</div>
	</section>

	<script type="text/javascript" src="./js/modelos-step3.js"></script>

</body>
</html>