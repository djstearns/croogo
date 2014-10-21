<div class="toys view">
<h2><?php echo __('Toy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($toy['Toy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($toy['Toy']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Toy'), array('action' => 'edit', $toy['Toy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Toy'), array('action' => 'delete', $toy['Toy']['id']), null, __('Are you sure you want to delete # %s?', $toy['Toy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Toys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Toy'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Kids'); ?></h3>
	<?php if (!empty($toy['Kid'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Adult Id'); ?></th>
		<th><?php echo __('Mom'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($toy['Kid'] as $kid): ?>
		<tr>
			<td><?php echo $kid['id']; ?></td>
			<td><?php echo $kid['name']; ?></td>
			<td><?php echo $kid['age']; ?></td>
			<td><?php echo $kid['adult_id']; ?></td>
			<td><?php echo $kid['mom']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'kids', 'action' => 'view', $kid['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'kids', 'action' => 'edit', $kid['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'kids', 'action' => 'delete', $kid['id']), null, __('Are you sure you want to delete # %s?', $kid['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
