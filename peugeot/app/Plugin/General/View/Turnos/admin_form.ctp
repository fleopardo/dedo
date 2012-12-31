<?php

$this->extend('/Common/admin_edit');
$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__('Turnos'), array('plugin' => 'general', 'controller' => 'turnos', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Turno']['id'], array(
		'plugin' => 'general', 'controller' => 'turnos', 'action' => 'edit',
		$this->data['Turno']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__('Add'), array('plugin' => 'general', 'controller' => 'turnos', 'action' => 'add'));
}
?>
<?php echo $this->Form->create('Turno');?>

<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
			<li><a href="#turno-main" data-toggle="tab"><?php echo __('Turno'); ?></a></li>
			<li><a href="#turno-persona" data-toggle="tab"><?php echo __('Persona'); ?></a></li>
			<?php echo $this->Croogo->adminTabs(); ?>
		</ul>

		<div class="tab-content">

			<div id="turno-main" class="tab-pane">
			<?php 
				echo $this->Form->input('auto_id', array(
					'label' => __('Auto'),
				));
				echo $this->Form->input('concesionaria_id', array(
					'label' => __('Concesionaria'),
				));
				echo $this->Form->input('fecha', array(
					'label' => __('Día'),
					'type' => 'date'
				));
				echo $this->Form->input('hora_inicio', array(
					'label' => __('Inicio'),
					'type' => 'time'
				));
				echo $this->Form->input('hora_fin', array(
					'label' => __('Fin'),
					'type' => 'time'
				));
			?>
			</div>
			<div id="turno-persona" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array(
					'class' => 'span10',
					'label' => false,
				));
				echo $this->Form->input('nombre', array(
					'placeholder' => __('Nombre y Apellido'),
				));
				echo $this->Form->input('email', array(
					'placeholder' => __('Email'),
				));
				echo $this->Form->input('sexo', array(
					'label' => __('Sexo'),
					'type' => 'select',
					'options' => array(
						'F' => 'Femenino',
						'M' => 'Masculino'
					),
					'empty' => ''
				));
				echo $this->Form->input('licencia', array(
					'placeholder' => __('Licencia'),
				));
				echo $this->Form->input('vencimiento', array(
					'label' => __('Vencimiento'),
					'type' => 'date'
				));
				echo $this->Form->input('provincia', array(
					'placeholder' => __('Provincia'),
				));
				echo $this->Form->input('localidad', array(
					'placeholder' => __('Localidad'),
				));
				echo $this->Form->input('telefono', array(
					'placeholder' => __('Teléfono'),
				));
				echo $this->Form->input('nacimiento', array(
					'label' => __('Nacimiento'),
					'type' => 'date',
					'minYear' => date('Y') - 80,
					'maxYear' => date ('Y') - 18
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

			$this->Form->input('status', array(
				'label' => __('Status'),
				'class' => false,
			)) .

			$this->Form->input('finalizado', array(
				'label' => __('Finalizado'),
				'class' => false,

			)) .

			$this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>