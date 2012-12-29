<?php
$this->extend('/Common/admin_index');
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__('Turnos'), 'javascript:void(0);');
?>
<?php $this->start('actions'); ?>
	<li>
		<?php 
		echo $this->Html->link(__('Nuevo turno'), 
			array('action' => 'add'), 
			array('class' => 'btn')
		); 
		?>
	</li>
	<li>
		<?php 
		echo $this->Html->link(__('Generar turnos'), 
			array('action' => 'generar'), 
			array('class' => 'btn')
		); 
		?>
	</li>
<?php $this->end(); ?>