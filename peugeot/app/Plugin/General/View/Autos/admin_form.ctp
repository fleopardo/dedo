<?php

$this->extend('/Common/admin_edit');
$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__('Concesionarias'), array('plugin' => 'general', 'controller' => 'autos', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Auto']['producto'], array(
		'plugin' => 'general', 'controller' => 'autos', 'action' => 'edit',
		$this->data['Auto']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__('Add'), array('plugin' => 'general', 'controller' => 'autos', 'action' => 'add'));
}
?>
<?php echo $this->Form->create('Auto');?>

<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
			<li><a href="#user-main" data-toggle="tab"><?php echo __('Auto'); ?></a></li>
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
				echo $this->Form->input('modelo_id', array(
					'label' => __('Modelo'),
				));
				echo $this->Form->input('producto', array(
					'placeholder' => __('Producto'),
				));
				echo $this->Form->input('color', array(
					'placeholder' => __('Color'),
				));
				echo $this->Form->input('vim', array(
					'placeholder' => __('VIM'),
				));
				echo $this->Form->input('patentamiento', array(
					'placeholder' => __('Patentamiento'),
				));
				echo $this->Form->input('concesionaria_id', array(
					'label' => __('Concesionaria'),
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