	<?php
	$provincias = array("Buenos Aires"=>"Buenos Aires","Capital Federal" =>"Capital Federal","Catamarca"=>"Catamarca","Chaco"=>"Chaco","Chubut"=>"Chubut","Corrientes"=>"Corrientes","Córdoba"=>"Córdoba","Entre Ríos"=>"Entre Ríos","Formosa"=>"Formosa","Jujuy"=>"Jujuy","La Pampa"=>"La Pampa","La Rioja"=>"La Rioja","Mendoza"=>"Mendoza","Misiones"=>"Misiones","Neuquén"=>"Neuquén","Río Negro"=>"Río Negro","Salta"=>"Salta","San Juan"=>"San Juan","San Luis"=>"San Luis","Santa Cruz"=>"Santa Cruz","Santa Fe"=>"Santa Fe","Santiago del Estero"=>"Santiago del Estero","Tierra del Fuego "=>"Tierra del Fuego ","Tucumán"=>"Tucumán",
	);
	?>

	<section class="section confirmacion" id="confirmacion">
		<div class="container">
			<h1><span>4.</span> Complete sus datos</h1>

			<?php echo $this->Form->create('Turno', array('url' => array('plugin' => 'general', 'controller' => 'web', 'action' => 'confirmacion')));?>
				<fieldset class="clearfix">
					<div class="left-col">
						<?php
						$this->Form->inputDefaults(array(
							'div' => 'row',
							'label' => false,
						));
						echo $this->Form->input('nombre', array('placeholder' => 'Nombre y Apellido', 'tabindex' => 1));
						echo $this->Form->input('email', array('placeholder' => 'Email', 'tabindex' => 3));
						echo $this->Form->input('licencia', array('placeholder' => 'Nro. de licencia de conducir', 'tabindex' => 7));
						echo $this->Form->input('provincia', array('empty' => 'Provincia', 'tabindex' => 11, 'options' => $provincias));
						echo $this->Form->input('telefono', array('placeholder' => 'Teléfono móvil', 'tabindex' => 13));
						?>
					</div>
					<div class="right-col">
						<?php
						echo $this->Form->input('sexo', array('empty' => 'Sexo', 'tabindex' => 2, 'options' => array('F' => 'Femenino', 'M' => 'Masculino')));
						?>
						<div class="row multi-select">
							<div class="clearfix">
								<label for="dia-nacimiento">Nacimiento</label>
								<div class="select-container clearfix">
									<?php
									echo $this->Form->input('nacimiento', array(
										'div'		=> false,
										'type' 		=> 'date',
										'tabindex' 	=> 4,
										'class' 	=> 'middle',
										'id' 		=> 'dia-nacimiento',
										'dateFormat'=> 'DMY',
									    'minYear' 	=> date('Y') - 80,
									    'maxYear' 	=> date('Y') - 18,
									));
									?>
								</div>
							</div>
							<div class="clearfix">
								<label for="vencimiento">Vencimiento</label>
								<div class="select-container clearfix">
									<?php
									echo $this->Form->input('vencimiento', array(
										'div'		=> false,
										'type' 		=> 'date',
										'tabindex' 	=> 8,
										'class' 	=> 'middle',
										'id' 		=> 'dia-vencimiento',
										'dateFormat'=> 'DMY',
									    'minYear' 	=> date('Y'),
									    'maxYear' 	=> date('Y') + 10,
									));
									?>
								</div>
							</div>
						</div>
						<?php
						echo $this->Form->input('localidad', array('placeholder' => 'Localidad', 'tabindex' => 12));
						?>
					</div><!--right-col-->
				</fieldset>
				<?php echo $this->Form->input('id');?>
				<fieldset class="submit">
					<div class="left-col">
						<?php
						$_listAuto = array($this->data['Auto']['id'] => $this->data['Auto']['producto']);
						echo $this->Form->input('auto_id', array(
							'tabindex'	=> 14,
							'options'	=> $_listAuto
						));
						?>
					</div>

					<div class="right-col">
						<?php
						$_listConcesionaria = array($this->data['Concesionaria']['id'] => $this->data['Concesionaria']['title']);
						echo $this->Form->input('concesionaria_id', array(
							'tabindex' 	=> 15,
							'options'	=> $_listConcesionaria
						));
						?>
					</div><!--right-col-->
					<?php echo $this->Form->submit('', array('div' => false, 'title' => 'Enviar'));?>
				</fieldset>
			<?php echo $this->Form->end();?>

			<?php echo $this->Html->link('Volver',
				array('plugin' => 'general', 'controller' => 'Web', 'action' => 'index'),
				array('class' => 'volver', 'data-scroll:anchor'=> '#content3')
			);?>
		</div>

		<?php echo $this->Html->script(array('confirmacion'), array('inline' => true, 'class' => 'script'));?>

		<div class="container mensaje-confirmacion">
			<h2>Gracias Juan por completar tus datos</h2>
			<p>Te hemos enviado a tu mail el código de reserva.</p>
			<p>Te esperamos para tu test drive.</p>
		</div>
	</section>