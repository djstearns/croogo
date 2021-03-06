<div class="adults index">
	<h2><?php echo __('Adults'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('homeloc_lat'); ?></th>
			<th><?php echo $this->Paginator->sort('homeloc_lng'); ?></th>
			<th><?php echo $this->Paginator->sort('photo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($adults as $adult): ?>
	<tr>
		<td><?php echo h($adult['Adult']['id']); ?>&nbsp;</td>
		<td><?php echo h($adult['Adult']['name']); ?>&nbsp;</td>
		<td><?php echo h($adult['Adult']['homeloc_lat']); ?>&nbsp;</td>
		<td><?php echo h($adult['Adult']['homeloc_lng']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($adult['Photo']['title'], array('controller' => 'attachments', 'action' => 'view', $adult['Photo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adult['Adult']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adult['Adult']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adult['Adult']['id']), null, __('Are you sure you want to delete # %s?', $adult['Adult']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Adult'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
