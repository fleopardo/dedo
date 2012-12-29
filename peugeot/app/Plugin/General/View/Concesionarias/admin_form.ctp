<?php

$this->extend('/Common/admin_edit');
$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__('Concesionarias'), array('plugin' => 'general', 'controller' => 'concesionarias', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Concesionaria']['title'], array(
		'plugin' => 'general', 'controller' => 'concesionarias', 'action' => 'edit',
		$this->data['Concesionaria']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__('Add'), array('plugin' => 'general', 'controller' => 'concesionarias', 'action' => 'add'));
}
?>
<?php echo $this->Form->create('Concesionaria');?>

<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
			<li><a href="#user-main" data-toggle="tab"><?php echo __('Concesionaria'); ?></a></li>
			<?php echo $this->Croogo->adminTabs(); ?>
		</ul>

		<div class="tab-content">

			<div id="user-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array(
					'class' => 'span10',
					'label' => false,
				));

				echo $this->Form->input('title', array(
					'placeholder' => __('Titulo'),
				));
				echo $this->Form->input('latitud', array(
					'placeholder' => __('Latitud para Google Maps'),
				));
				echo $this->Form->input('longitud', array(
					'placeholder' => __('Longitud para Google Maps'),
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

			$this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>