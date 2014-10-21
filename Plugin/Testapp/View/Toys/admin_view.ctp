<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Toys'), h($toy['Toy']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Toys'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Toy'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Toy'), array('action' => 'edit', $toy['Toy']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Toy'), array('action' => 'delete', $toy['Toy']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $toy['Toy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Toys'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Toy'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="toys view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($toy['Toy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($toy['Toy']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
