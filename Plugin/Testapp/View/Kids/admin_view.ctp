<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Kids'), h($kid['Kid']['age']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Kids'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Kid'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Kid'), array('action' => 'edit', $kid['Kid']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Kid'), array('action' => 'delete', $kid['Kid']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $kid['Kid']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Kids'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Kid'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Adults'), array('controller' => 'adults', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Adult'), array('controller' => 'adults', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Toys'), array('controller' => 'toys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Toy'), array('controller' => 'toys', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="kids view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Age'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Adult'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kid['Adult']['name'], array('controller' => 'adults', 'action' => 'view', $kid['Adult']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Mom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kid['Mom']['name'], array('controller' => 'adults', 'action' => 'view', $kid['Mom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Attachment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kid['Attachment']['title'], array('controller' => 'attachments', 'action' => 'view', $kid['Attachment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Birthday'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Blonde'); ?></dt>
		<dd>
			<?php echo h($kid['Kid']['blonde']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
