<div class="turnos view">
<h2><?php  echo __('Turno'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['sexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Licencia'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['licencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vencimiento'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['vencimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['provincia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localidad'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['localidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nacimiento'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['nacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Auto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($turno['Auto']['id'], array('controller' => 'autos', 'action' => 'view', $turno['Auto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concesionaria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($turno['Concesionaria']['title'], array('controller' => 'concesionarias', 'action' => 'view', $turno['Concesionaria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Inicio'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['hora_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Fin'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['hora_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finalizado'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['finalizado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($turno['Turno']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Turno'), array('action' => 'edit', $turno['Turno']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Turno'), array('action' => 'delete', $turno['Turno']['id']), null, __('Are you sure you want to delete # %s?', $turno['Turno']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Turnos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turno'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos'), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto'), array('controller' => 'autos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concesionarias'), array('controller' => 'concesionarias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concesionaria'), array('controller' => 'concesionarias', 'action' => 'add')); ?> </li>
	</ul>
</div>
