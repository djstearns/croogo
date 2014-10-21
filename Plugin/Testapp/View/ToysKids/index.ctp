<div class="toysKids index">
	<h2><?php echo __('Toys Kids'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('kid_id'); ?></th>
			<th><?php echo $this->Paginator->sort('toy_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($toysKids as $toysKid): ?>
	<tr>
		<td><?php echo h($toysKid['ToysKid']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($toysKid['Kid']['name'], array('controller' => 'kids', 'action' => 'view', $toysKid['Kid']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($toysKid['Toy']['name'], array('controller' => 'toys', 'action' => 'view', $toysKid['Toy']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $toysKid['ToysKid']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $toysKid['ToysKid']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $toysKid['ToysKid']['id']), null, __('Are you sure you want to delete # %s?', $toysKid['ToysKid']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Toys Kid'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Toys'), array('controller' => 'toys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
	</ul>
</div>
