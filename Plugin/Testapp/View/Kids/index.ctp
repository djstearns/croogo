<div class="kids index">
	<h2><?php echo __('Kids'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('adult_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mom'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('blonde'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($kids as $kid): ?>
	<tr>
		<td><?php echo h($kid['Kid']['id']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['age']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($kid['Adult']['name'], array('controller' => 'adults', 'action' => 'view', $kid['Adult']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kid['Mom']['name'], array('controller' => 'adults', 'action' => 'view', $kid['Mom']['id'])); ?>
		</td>
		<td><?php echo h($kid['Kid']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($kid['Attachment']['title'], array('controller' => 'attachments', 'action' => 'view', $kid['Attachment']['id'])); ?>
		</td>
		<td><?php echo h($kid['Kid']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['blonde']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $kid['Kid']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $kid['Kid']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $kid['Kid']['id']), null, __('Are you sure you want to delete # %s?', $kid['Kid']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Kid'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Adults'), array('controller' => 'adults', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adult'), array('controller' => 'adults', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Toys'), array('controller' => 'toys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
	</ul>
</div>
