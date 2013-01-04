	<section class="section ubicacion step2" id="ubicacion-step2">
		<div class="container">
			<h1><span>2.</span> Selecciona la ubicación deseada</h1>

			<div class="contentMap">
				<div class="map" id="map">

				</div>
			</div>
			<?php echo $this->Form->create('Turno', array('url' => array('plugin' => 'general', 'controller' => 'Web', 'action' => 'ubicacion_step3'), 'type' => 'get', 'data-load' => 'content3', 'id' => 'form-ubicacion-step2', ));?>
				<div>
					<label for="lugar">Lugar</label>
					<select class="lugar" id="lugar-test-ubicacion" name="concesionaria">
						<?php foreach ($concesionarias as $_c): ?>
							<option data-long="<?php echo $_c['Concesionaria']['longitud'];?>" data-lat="<?php echo $_c['Concesionaria']['latitud'];?>" value="<?php echo $_c['Concesionaria']['id']?>"><?php echo $_c['Concesionaria']['title'] ?></option>
						<?php endforeach;?>
					</select>
				</div>

				<?php 
				if ($months):
					echo $this->Form->input('month', array(
						'type' => 'select',
						'options' => $months,
						'class' => 'mes',
						'label' => 'Mes',
						'name'	=> 'month'
					));
				else:
					echo $this->Form->input('month', array(
						'type' => 'select',
						'options' => $months,
						'class' => 'mes',
						'label' => 'Mes',
						'name'	=> 'month',
						'empty' => 'No disp.'
					));
				endif;
				if ($dias):
					echo $this->Form->input('dia', array(
						'type' => 'select',
						'options' => $dias,
						'class' => 'dia',
						'label' => 'Día',
						'name'	=> 'dia'
					));
				else:
					echo $this->Form->input('dia', array(
						'type' => 'select',
						'options' => $dias,
						'class' => 'dia',
						'label' => 'Día',
						'name'	=> 'dia',
						'empty' => 'No disp.'
					));
				endif;
				if ($turnos):
					echo $this->Form->input('turno_id', array(
						'class' => 'hora',
						'label' => 'Horario',
						'name'	=> 'turno'
					));
				else:
					echo $this->Form->input('turno_id', array(
						'class' => 'hora',
						'label' => 'Horario',
						'name'	=> 'turno',
						'empty' => 'No disp.'
					));
				endif;

				echo $this->Form->submit('', array('div' => false, 'title' => 'Solicite turno'));
				?>
			<?php $this->Form->end();?>
			<?php echo $this->Html->link('Volver', 
				array('plugin' => 'general', 'controller' => 'Web', 'action' => 'index'),
				array('class' => 'volver', 'data-scroll:anchor'=> '#home')
			);?>
		</div>

		<?php echo $this->Html->script(array('ubicacion-step2'), array('inline' => true, 'class' => 'script'));?>
	</section>