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
</head>
<body>

	<header>
		<div class="container">
			<h1><a href="#"><span class="hide">Peugeot</span></a></h1>
			<h2>Motion & Emotion</h2>
		</div>
	</header>

	<!--home-->
	<section class="home">
		<div class="container">

			<div class="txt">
				<h1><span>1.</span> Test drive de verano</h1>
				<h2>Seleccione una ubicación</h2>

				<p class="intro">Este verano te invitamos a descubrir nuestros más modernos modelos en distintos puntos estrategicamente ubicados en las costas de Carilo y Pinamar. Para reservar tu turno empeza eligiendo el modelo o ubicación que más interese.</p>
			</div>

			<p><a href="#" class="por-modelos">Por modelo</a></p>
			<p><a href="#" class="por-ubicacion">Por ubicación</a></p>
		</div>
	</section>

	<!-- Ubicacion - Elegir ubicacion -->
	<section class="ubicacion step2">
		<div class="container">
			<h1><span>2.</span> Selecciona la ubicación deseada</h1>

			<div class="contentMap">
				<div class="map" id="map">

				</div>
			</div>

			<form id="selecciona-ubicacion">
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

			<a href="#" class="volver" title="lalala">Volver</a>
		</div>
	</section>

	<!-- Ubicacion - Elegir modelo -->
	<section class="ubicacion step3">
		<div class="container">
			<h1><span>3.</span> Confirmar vehiculo</h1>
			<p>En el stand de pinamar el lunes 07/01/13 de 9 a 12:30 y de 16:30 a 20:00 tenes disponibles los siguientes vehiculos...</p>

			<a href="#" class="volver">Volver</a>
		</div>
	</section>

	<!-- Modelos - Elegir modelo -->
	<section class="modelos step2">
		<div class="container">
			<h1><span>2.</span> Elija el modelo</h1>
			<a href="#" class="volver">Volver</a>
			<form>
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
		</div>
	</section>

	<!-- Modelos - Elegir ubicacion -->
	<section class="modelos step3">
		<div class="container">
			<h1><span>3.</span> Confirmar turno</h1>
			<p>Su próximo Peugeot 308 Allure 1.6 C/ Nav lo espera el...</p>

			<form id="confirmar-turno">
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

			<a href="#" class="volver">Volver</a>
		</div>
	</section>

	<!-- Confirmacion -->
	<section class="confirmacion">
		<div class="container">
			<h1><span>4.</span> Complete sus datos</h1>
			<a href="#" class="volver">Volver</a>
			<form action="" method="">
				<fieldset>
					<div class="left-col">
						<div class="row">
							<input type="text" placeholder="Nombre y Apellido" id="" />
						</div>
						<div class="row">
							<input type="text" placeholder="Email" id="" />
						</div>
						<div class="row">
							<input type="text" placeholder="Nro de licencia de conducir" id="" />
						</div>
						<div class="row">
							<select>
								<option>Provincia</option>
								<option>Buenos Aires</option>
								<option>Mendoza</option>
							</select>
						</div>
						<div class="row">
							<input type="text" placeholder="Teléfono móvil" id="" />
						</div>
					</div>
					<div class="right-col">

						<div class="row">
							<div class="row">
								<select>
									<option>Sexo</option>
									<option>Femenino</option>
									<option>Masculino</option>
								</select>
							</div>
						</div>

						<div class="row select-comp">
							<div class="clearfix">
								<label for="dia-nacimiento">Nacimiento</label>
								<select id="dia-nacimiento">
									<option>Día</option>
									<option>1</option>
									<option>2</option>
								</select>
								<select id="mes-nacimiento">
									<option>Mes</option>
									<option>Enero</option>
									<option>Febrero</option>
								</select>
								<select id="ano-nacimiento">
									<option>A&ntilde;o</option>
									<option>1930</option>
									<option>1931</option>
								</select>
							</div>
							<div class="clearfix">
								<label for="vencimiento">Vencimiento</label>
								<select id="dia-vencimiento">
									<option>Día</option>
									<option>1</option>
									<option>2</option>
								</select>
								<select id="mes-vencimiento">
									<option>Mes</option>
									<option>Enero</option>
									<option>Febrero</option>
								</select>
								<select id="ano-vencimiento">
									<option>A&ntilde;o</option>
									<option>1930</option>
									<option>1931</option>
								</select>
							</div>
						</div>

						<div class="row">
							<input type="text" placeholder="Localidad" id="" />
						</div>
					</div><!--right-col-->
				</fieldset>

				<fieldset>
					<div class="left-col">
						<div class="row">
							<input type="text" placeholder="Nombre y Apellido" id="" />
						</div>
					</div>

					<div class="right-col">
						<div class="row">
							<input type="text" placeholder="Localidad" id="" />
						</div>
					</div><!--right-col-->

					<input type="submit" value="" title="Enviar" />
				</fieldset>
			</form>
			
		</div>
	</section>




	<script src="js/libs/jquery.min.js"></script>

</body>
</html>