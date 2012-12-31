	<!-- Modelos - Elegir modelo -->
	<section class="section modelos step2" id="modelos-step2">
		<div class="container">
			<h1><span>2.</span> Elija el modelo</h1>

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

			<?php echo $this->Form->create('Modelo', array('url' => array('plugin' => 'general', 'controller' => 'Web', 'action' => 'modelo_step3'), 'type' => 'get', 'data-load' => 'content3', 'id' => 'form-modelos-step2', ));?>
				<fieldset>
					<div class="row">
						<?php
						echo $this->Form->input('modelo_id', array(
							'div' 		=> false,
							'label' 	=> false,
							'id'		=> 'ModeloModeloId'
						));
						echo $this->Form->submit('', array('div' => false));
						?>

					</div>
				</fieldset>
			<?php echo $this->Form->end();?>
			<?php echo $this->Html->link('Volver',
				array('plugin' => 'general', 'controller' => 'Web', 'action' => 'index'),
				array('class' => 'volver', 'data-scroll:anchor'=> '#home')
			);?>
		</div>
		<?php echo $this->Html->script(array('modelos-step2'), array('inline' => true, 'class' => 'script'));?>
	</section>