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
	<script src="js/libs/jquery.easing.1.3.js"></script>
	<script src="js/libs/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="./js/libs/jquery-ui-1.8.12.custom.min.js"></script>
	<script type="text/javascript" src="./js/libs/jquery.ui.selectmenu.js"></script>
	<script type="text/javascript" src="./js/libs/jquery.placeholder.js"></script>
	<!--google map-->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=es"></script>
	<!-- -->

</head>
<body>

	<?php include("./includes/header.php"); ?>

	<!--home-->
	<section class="home" id="home">
		<div class="container">

			<div class="txt">
				<h1><span>1.</span> Test drive de verano</h1>
				<h2>Seleccione una ubicación</h2>

				<p class="intro">Este verano te invitamos a descubrir nuestros más modernos modelos en distintos puntos estrategicamente ubicados en las costas de Carilo y Pinamar. Para reservar tu turno empeza eligiendo el modelo o ubicación que más interese.</p>
			</div>

			<p><a href="modelos-step2.php" class="link por-modelos" data-load="content2">Por modelo</a></p>
			<p><a href="ubicacion-step2.php" class="link por-ubicacion" data-load="content2">Por ubicación</a></p>
		</div>
	</section>

	<div id="content2"></div>
	<div id="content3"></div>
	<div id="content4"></div>

	<script src="js/home.js"></script>

</body>
</html>