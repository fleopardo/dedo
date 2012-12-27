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

	<script src="js/libs/jquery.min.js"></script>

</head>
<body>

	<?php include("./includes/header.php"); ?>

	<!-- Modelos - Elegir ubicacion -->
	<section class="modelos step3">
		<div class="container">
			<h1><span>3.</span> Confirmar turno</h1>
			<p>Su próximo Peugeot 308 Allure 1.6 C/ Nav lo espera el...</p>

			<form id="confirmar-turno" method="GET" action="confirmacion.php">
				<div>
					<label for="lugar">Lugar</label>
					<select>
						<option>Pinamar</option>
					</select>
				</div>

				<div>
					<label for="mes">Mes</label>
					<select>
						<option>Octubre</option>
					</select>
				</div>

				<div>
					<label for="dia">Día</label>
					<select>
						<option>27</option>
					</select>
				</div>

				<div>
					<label for="horario">Horario</label>
					<select>
						<option>9:00 - 9:20</option>
					</select>
				</div>

				<input type="submit" value=" " title="Solicite turno" />
			</form>

			<div class="contentMap">
				<div class="map" id="map">
				</div>
			</div>

			<a href="modelos-step2.php" class="volver">Volver</a>
		</div>
	</section>


</body>
</html>