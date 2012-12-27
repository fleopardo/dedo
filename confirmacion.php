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

	<section class="confirmacion">
		<div class="container">
			<h1><span>4.</span> Complete sus datos</h1>
			<a href="#" class="volver">Volver</a>
			<form action="" method="">
				<fieldset>
					<div class="left-col">
						<div class="row">
							<input type="text" placeholder="Nombre y Apellido" id="" tabindex="1" />
						</div>
						<div class="row">
							<input type="text" placeholder="Email" id="" tabindex="3" />
						</div>
						<div class="row">
							<input type="text" placeholder="Nro de licencia de conducir" id="" tabindex="7" />
						</div>
						<div class="row">
							<select tabindex="11">
								<option>Provincia</option>
								<option>Buenos Aires</option>
								<option>Mendoza</option>
							</select>
						</div>
						<div class="row">
							<input type="text" placeholder="Teléfono móvil" id="" tabindex="13" />
						</div>
					</div>
					<div class="right-col">

						<div class="row">
							<div class="row">
								<select tabindex="2">
									<option>Sexo</option>
									<option>Femenino</option>
									<option>Masculino</option>
								</select>
							</div>
						</div>

						<div class="row select-comp">
							<div class="clearfix">
								<label for="dia-nacimiento">Nacimiento</label>
								<select id="dia-nacimiento" tabindex="4">
									<option>Día</option>
									<option>1</option>
									<option>2</option>
								</select>
								<select id="mes-nacimiento" tabindex="5">
									<option>Mes</option>
									<option>Enero</option>
									<option>Febrero</option>
								</select>
								<select id="ano-nacimiento" tabindex="6">
									<option>A&ntilde;o</option>
									<option>1930</option>
									<option>1931</option>
								</select>
							</div>
							<div class="clearfix">
								<label for="vencimiento">Vencimiento</label>
								<select id="dia-vencimiento" tabindex="8">
									<option>Día</option>
									<option>1</option>
									<option>2</option>
								</select>
								<select id="mes-vencimiento" tabindex="9">
									<option>Mes</option>
									<option>Enero</option>
									<option>Febrero</option>
								</select>
								<select id="ano-vencimiento" tabindex="10">
									<option>A&ntilde;o</option>
									<option>1930</option>
									<option>1931</option>
								</select>
							</div>
						</div>

						<div class="row">
							<input type="text" placeholder="Localidad" id="" tabindex="12" />
						</div>
					</div><!--right-col-->
				</fieldset>

				<fieldset>
					<div class="left-col">
						<div class="row">
							<input type="text" placeholder="Modelo a testear" id="" tabindex="14" />
						</div>
					</div>

					<div class="right-col">
						<div class="row">
							<input type="text" placeholder="Centro Turístico" id="" tabindex="15" />
						</div>
					</div><!--right-col-->

					<input type="submit" value="" title="Enviar" />
				</fieldset>
			</form>

		</div>
	</section>



</body>
</html>