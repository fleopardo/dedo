<div class="modelos form">
<?php echo $this->Form->create('Modelo'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Modelo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Modelo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Modelo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Modelos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Autos'), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto'), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>
