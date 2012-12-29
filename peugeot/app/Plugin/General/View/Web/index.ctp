	<!--home-->
	<section class="home" id="home">
		<div class="container">

			<div class="txt">
				<h1><span>1.</span> Test drive de verano</h1>
				<h2>Seleccione una ubicación</h2>

				<p class="intro">Este verano te invitamos a descubrir nuestros más modernos modelos en distintos puntos estrategicamente ubicados en las costas de Carilo y Pinamar. Para reservar tu turno empeza eligiendo el modelo o ubicación que más interese.</p>
			</div>

			<p>
				<?php 
				echo $this->Html->link('Por modelo', 
					array('plugin' => 'general', 'controller' => 'Web', 'action' => 'modelo_step2'), 
					array('class' => 'link por-modelos', 'data-load' => 'content2')
				);
				?>
			</p>
			<p>
				<?php 
				echo $this->Html->link('Por ubicación', 
					array('plugin' => 'general', 'controller' => 'Web', 'action' => 'ubicacion_step2'), 
					array('class' => 'link por-ubicacion', 'data-load' => 'content2')
				);
				?>
			</p>
		</div>
	</section>