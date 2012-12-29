<div class="emailsSenders view">
<h2><?php  __('Emails Sender');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['delivery']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Port'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['port']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timeout'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['timeout']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Host'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['host']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $emailsSender['EmailsSender']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Emails Sender', true), array('action' => 'edit', $emailsSender['EmailsSender']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Emails Sender', true), array('action' => 'delete', $emailsSender['EmailsSender']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $emailsSender['EmailsSender']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails Senders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emails Sender', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails Templates', true), array('controller' => 'emails_templates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emails Template', true), array('controller' => 'emails_templates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Emails Templates');?></h3>
	<?php if (!empty($emailsSender['EmailsTemplate'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Code'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Subject'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Emails Sender Id'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($emailsSender['EmailsTemplate'] as $emailsTemplate):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $emailsTemplate['id'];?></td>
			<td><?php echo $emailsTemplate['code'];?></td>
			<td><?php echo $emailsTemplate['name'];?></td>
			<td><?php echo $emailsTemplate['subject'];?></td>
			<td><?php echo $emailsTemplate['body'];?></td>
			<td><?php echo $emailsTemplate['weight'];?></td>
			<td><?php echo $emailsTemplate['emails_sender_id'];?></td>
			<td><?php echo $emailsTemplate['status'];?></td>
			<td><?php echo $emailsTemplate['created'];?></td>
			<td><?php echo $emailsTemplate['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'emails_templates', 'action' => 'view', $emailsTemplate['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'emails_templates', 'action' => 'edit', $emailsTemplate['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'emails_templates', 'action' => 'delete', $emailsTemplate['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $emailsTemplate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Emails Template', true), array('controller' => 'emails_templates', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
