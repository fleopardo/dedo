<?php

$this->extend('/Common/admin_edit');
$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__('Turnos'), array('plugin' => 'general', 'controller' => 'turnos', 'action' => 'index'))
	->addCrumb(__('Generar'), array('plugin' => 'general', 'controller' => 'turnos', 'action' => 'generar'));
?>
<?php echo $this->Form->create('Turno');?>

<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
			<li><a href="#turno-main" data-toggle="tab"><?php echo __('Generar Turnos'); ?></a></li>
			<?php echo $this->Croogo->adminTabs(); ?>
		</ul>

		<div class="tab-content">

			<div id="turno-main" class="tab-pane">
			<?php 
				echo $this->Form->input('auto_id', array(
					'label' => __('Auto'),
				));
				echo $this->Form->input('duracion', array(
					'label' 	=> __('Duración en minutos del testdrive'),
					'options' 	=> range(0, 60),
					'selected' 	=> 20
				));
				echo $this->Form->input('fecha_desde', array(
					'label' 	=> __('Desde'),
					'type' 		=> 'date',
					'dateFormat'=> 'DMY',
				    'minYear' 	=> date('Y') - 2,
				    'maxYear' 	=> date('Y') + 3,
				));
				echo $this->Form->input('fecha_hasta', array(
					'label'		=> __('Hasta'),
					'type' 		=> 'date',
					'dateFormat'=> 'DMY',
				    'minYear' 	=> date('Y') - 2,
				    'maxYear' 	=> date('Y') + 3,
				));
				echo $this->Form->input('hora_inicio', array(
					'label'		=> __('Inicio'),
					'type' 		=> 'time',
					'timeFormat'=> '24',
					'selected'	=> '9:00:00'
				));
				echo $this->Form->input('hora_fin', array(
					'label' 	=> __('Fin'),
					'type' 		=> 'time',
					'timeFormat'=> '24',
					'selected'	=> '21:00:00'
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>
	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__('Publishing')) .
			$this->Form->button(__('Save'), array('button' => 'default')) .
			$this->Html->link(
			__('Cancel'), array('action' => 'index'),
			array('button' => 'danger')) .

			$this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>