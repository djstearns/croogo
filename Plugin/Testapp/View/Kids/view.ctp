<div class="kids view">
<h2><?php echo __('Kid'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adult'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kid['Adult']['name'], array('controller' => 'adults', 'action' => 'view', $kid['Adult']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kid['Mom']['name'], array('controller' => 'adults', 'action' => 'view', $kid['Mom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kid['Attachment']['title'], array('controller' => 'attachments', 'action' => 'view', $kid['Attachment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blonde'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['blonde']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Kid'), array('action' => 'edit', $kid['Kid']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Kid'), array('action' => 'delete', $kid['Kid']['id']), null, __('Are you sure you want to delete # %s?', $kid['Kid']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kids'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kid'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adults'), array('controller' => 'adults', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adult'), array('controller' => 'adults', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Toys'), array('controller' => 'toys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Toys'); ?></h3>
	<?php if (!empty($kid['Toy'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($kid['Toy'] as $toy): ?>
		<tr>
			<td><?php echo $toy['id']; ?></td>
			<td><?php echo $toy['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'toys', 'action' => 'view', $toy['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'toys', 'action' => 'edit', $toy['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'toys', 'action' => 'delete', $toy['id']), null, __('Are you sure you want to delete # %s?', $toy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
