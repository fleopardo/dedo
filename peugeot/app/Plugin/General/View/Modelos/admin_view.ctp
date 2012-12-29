<div class="modelos view">
<h2><?php  echo __('Modelo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($modelo['Modelo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Modelo'), array('action' => 'edit', $modelo['Modelo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Modelo'), array('action' => 'delete', $modelo['Modelo']['id']), null, __('Are you sure you want to delete # %s?', $modelo['Modelo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modelos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modelo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos'), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto'), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Autos'); ?></h3>
	<?php if (!empty($modelo['Auto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Producto'); ?></th>
		<th><?php echo __('Color'); ?></th>
		<th><?php echo __('Vim'); ?></th>
		<th><?php echo __('Patentamiento'); ?></th>
		<th><?php echo __('Concesionaria Id'); ?></th>
		<th><?php echo __('Modelo Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($modelo['Auto'] as $auto): ?>
		<tr>
			<td><?php echo $auto['id']; ?></td>
			<td><?php echo $auto['producto']; ?></td>
			<td><?php echo $auto['color']; ?></td>
			<td><?php echo $auto['vim']; ?></td>
			<td><?php echo $auto['patentamiento']; ?></td>
			<td><?php echo $auto['concesionaria_id']; ?></td>
			<td><?php echo $auto['modelo_id']; ?></td>
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
