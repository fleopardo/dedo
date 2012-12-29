<div class="concesionarias view">
<h2><?php  echo __('Concesionaria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($concesionaria['Concesionaria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($concesionaria['Concesionaria']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubicacion'); ?></dt>
		<dd>
			<?php echo h($concesionaria['Concesionaria']['ubicacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($concesionaria['Concesionaria']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($concesionaria['Concesionaria']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($concesionaria['Concesionaria']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Concesionaria'), array('action' => 'edit', $concesionaria['Concesionaria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Concesionaria'), array('action' => 'delete', $concesionaria['Concesionaria']['id']), null, __('Are you sure you want to delete # %s?', $concesionaria['Concesionaria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Concesionarias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concesionaria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos'), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto'), array('controller' => 'autos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turnos'), array('controller' => 'turnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turno'), array('controller' => 'turnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Autos'); ?></h3>
	<?php if (!empty($concesionaria['Auto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Producto'); ?></th>
		<th><?php echo __('Color'); ?></th>
		<th><?php echo __('Vim'); ?></th>
		<th><?php echo __('Patentamiento'); ?></th>
		<th><?php echo __('Concesionaria Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($concesionaria['Auto'] as $auto): ?>
		<tr>
			<td><?php echo $auto['id']; ?></td>
			<td><?php echo $auto['producto']; ?></td>
			<td><?php echo $auto['color']; ?></td>
			<td><?php echo $auto['vim']; ?></td>
			<td><?php echo $auto['patentamiento']; ?></td>
			<td><?php echo $auto['concesionaria_id']; ?></td>
			<td><?php echo $auto['status']; ?></td>
			<td><?php echo $auto['created']; ?></td>
			<td><?php echo $auto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'autos', 'action' => 'view', $auto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'autos', 'action' => 'edit', $auto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'autos', 'action' => 'delete', $auto['id']), null, __('Are you sure you want to delete # %s?', $auto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Auto'), array('controller' => 'autos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Turnos'); ?></h3>
	<?php if (!empty($concesionaria['Turno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Licencia'); ?></th>
		<th><?php echo __('Vencimiento'); ?></th>
		<th><?php echo __('Provincia'); ?></th>
		<th><?php echo __('Localidad'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Nacimiento'); ?></th>
		<th><?php echo __('Auto Id'); ?></th>
		<th><?php echo __('Concesionaria Id'); ?></th>
		<th><?php echo __('Hora Inicio'); ?></th>
		<th><?php echo __('Hora Fin'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Finalizado'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($concesionaria['Turno'] as $turno): ?>
		<tr>
			<td><?php echo $turno['id']; ?></td>
			<td><?php echo $turno['nombre']; ?></td>
			<td><?php echo $turno['email']; ?></td>
			<td><?php echo $turno['sexo']; ?></td>
			<td><?php echo $turno['licencia']; ?></td>
			<td><?php echo $turno['vencimiento']; ?></td>
			<td><?php echo $turno['provincia']; ?></td>
			<td><?php echo $turno['localidad']; ?></td>
			<td><?php echo $turno['telefono']; ?></td>
			<td><?php echo $turno['nacimiento']; ?></td>
			<td><?php echo $turno['auto_id']; ?></td>
			<td><?php echo $turno['concesionaria_id']; ?></td>
			<td><?php echo $turno['hora_inicio']; ?></td>
			<td><?php echo $turno['hora_fin']; ?></td>
			<td><?php echo $turno['fecha']; ?></td>
			<td><?php echo $turno['finalizado']; ?></td>
			<td><?php echo $turno['status']; ?></td>
			<td><?php echo $turno['created']; ?></td>
			<td><?php echo $turno['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'turnos', 'action' => 'view', $turno['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'turnos', 'action' => 'edit', $turno['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'turnos', 'action' => 'delete', $turno['id']), null, __('Are you sure you want to delete # %s?', $turno['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Turno'), array('controller' => 'turnos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
