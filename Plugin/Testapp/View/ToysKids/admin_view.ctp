<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Toys Kids'), h($toysKid['ToysKid']['kid_id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Toys Kids'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Toys Kid'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Toys Kid'), array('action' => 'edit', $toysKid['ToysKid']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Toys Kid'), array('action' => 'delete', $toysKid['ToysKid']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $toysKid['ToysKid']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Toys Kids'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Toys Kid'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Toys'), array('controller' => 'toys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="toysKids view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($toysKid['ToysKid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kid'); ?></dt>
		<dd>
			<?php echo $this->Html->link($toysKid['Kid']['age'], array('controller' => 'kids', 'action' => 'view', $toysKid['Kid']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Toy'); ?></dt>
		<dd>
			<?php echo $this->Html->link($toysKid['Toy']['name'], array('controller' => 'toys', 'action' => 'view', $toysKid['Toy']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
