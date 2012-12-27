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

	<!-- Modelos - Elegir modelo -->
	<section class="modelos step2">
		<div class="container">
			<h1><span>2.</span> Elija el modelo</h1>
			<form method="GET" action="modelos-step3.php">
				<fieldset>
					<div class="row">
						<select>
							<option>308 allure</option>
							<option>207 gti</option>
							<option>408</option>
						</select>
						<input type="submit" value="" title="Confirmar">
					</div>
				</fieldset>
			</form>

			<a href="index.php" class="volver">Volver</a>
		</div>
	</section>


</body>
</html>