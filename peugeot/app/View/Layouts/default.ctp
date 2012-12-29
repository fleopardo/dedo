<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 ie6" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8 ie7" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9 ie8" lang="es"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10 ie9" lang="es"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Peugeot: Test Drive</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<?php
		echo $this->Meta->meta();
		echo $this->Html->css(array(
			'global',
			'jquery.ui.selectmenu',
		));
	?>
	<!--[if lt IE 9]>
		<?php
		echo $this->Html->script(array(
			'libs/html5'
		));
		?>
	<![endif]-->
	<?php
		echo $this->Layout->js();
		echo $this->Html->script(array(
			'lib/jquery.min',
			'lib/jquery.easing.1.3',
			'lib/jquery.scrollTo',
			'lib/jquery-ui-1.8.12.custom.min',
			'lib/jquery.ui.selectmenu',
			'lib/jquery.placeholder',
			'http://maps.google.com/maps/api/js?sensor=false&amp;language=es'
		));
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<header>
		<div class="container">
			<h1><span class="hide">Peugeot</span></h1>
			<h2>Motion & Emotion</h2>
		</div>
	</header>

	<?php echo $this->fetch('content');?>


	<div id="content2"></div>
	<div id="content3"></div>
	<div id="content4"></div>
	<?php
		echo $this->Html->script(array('home'), array('block' => 'scriptBottom'));
		echo $this->fetch('scriptBottom');
		echo $this->Js->writeBuffer();
	?>
</body>
</html>