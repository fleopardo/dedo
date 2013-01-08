	<!-- Modelos - Elegir ubicacion -->
	<section class="section modelos step3" id="modelos-step3">
		<div class="container">
			<h1><span>3.</span> Confirmar turno</h1>
			<p>Tu próximo Peugeot <?php echo $titulo_modelo; ?> te espera el...</p>


			<?php echo $this->Form->create('Turno', array('url' => array('plugin' => 'general', 'controller' => 'Web', 'action' => 'confirmacion'), 'type' => 'get', 'data-load' => 'content4', 'id' => 'form-modelos-step3', ));?>
				<div>
					<label for="lugar">Lugar</label>
					<select class="lugar" id="lugar-test">
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
						'empty'	=> 'No disp.'
					));
				endif;
				echo $this->Form->submit('', array('title' => 'Solicita turno'));
			echo $this->Form->end();	
			?>

			<div class="contentMap">
				<div class="map" id="map">
				</div>
			</div>

			<div class="img-result <?php echo !empty($class_modelo) ? $class_modelo : 'p-408'; ?>"></div>
			<?php echo $this->Html->link('Volver',
				array('plugin' => 'general', 'controller' => 'Web', 'action' => 'index'),
				array('class' => 'volver', 'data-scroll:anchor'=> '#modelos-step2')
			);?>
		</div>

		<?php echo $this->Html->script(array('modelos-step3'), array('inline' => true, 'class' => 'script'));?>
	</section>