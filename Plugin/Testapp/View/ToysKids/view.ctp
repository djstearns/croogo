<div class="toysKids view">
<h2><?php echo __('Toys Kid'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($toysKid['ToysKid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kid'); ?></dt>
		<dd>
			<?php echo $this->Html->link($toysKid['Kid']['name'], array('controller' => 'kids', 'action' => 'view', $toysKid['Kid']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Toy'); ?></dt>
		<dd>
			<?php echo $this->Html->link($toysKid['Toy']['name'], array('controller' => 'toys', 'action' => 'view', $toysKid['Toy']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Toys Kid'), array('action' => 'edit', $toysKid['ToysKid']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Toys Kid'), array('action' => 'delete', $toysKid['ToysKid']['id']), null, __('Are you sure you want to delete # %s?', $toysKid['ToysKid']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Toys Kids'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Toys Kid'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Toys'), array('controller' => 'toys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
	</ul>
</div>
