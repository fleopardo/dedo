	<section class="section ubicacion step3" id="ubicacion-step3">
		<div class="container">
			<h1><span>3.</span> Confirmar vehiculo</h1>
			<p>En el <?php echo $turno['Concesionaria']['title'];?> el <?php echo date('d/m/Y',strtotime($turno['Turno']['fecha']));?> de <?php echo date ('H:i', strtotime($turno['Turno']['hora_inicio']))?> a <?php echo date ('H:i', strtotime($turno['Turno']['hora_fin']))?> tenes disponibles los siguientes vehiculos...</p>

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

			<?php echo $this->Form->create('Turno', array('url' => array('plugin' => 'general', 'controller' => 'Web', 'action' => 'confirmacion'), 'type' => 'get', 'data-load' => 'content4', 'id' => 'form-ubicacion-step3', ));?>
				<fieldset>
					<?php 
					echo $this->Form->input('turno', array(
						'div'		=> 'row',
						'label' 	=> false,
						'options' 	=> $turnos,
						'after'		=> $this->Form->submit('', array('div' => false, 'title' => 'Reservar turno'))
					));
					?>
				</fieldset>
			<?php echo $this->Form->end(); ?>

			<a href="#" class="volver" data-scroll:anchor="#ubicacion-step2">Volver</a>
		</div>
		<?php echo $this->Html->script(array('ubicacion-step3'), array('inline' => true, 'class' => 'script'));?>
	</section>