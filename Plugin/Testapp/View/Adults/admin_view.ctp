<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Adults'), h($adult['Adult']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Adults'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Adult'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Adult'), array('action' => 'edit', $adult['Adult']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Adult'), array('action' => 'delete', $adult['Adult']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $adult['Adult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Adults'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Adult'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Photo'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="adults view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($adult['Adult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($adult['Adult']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Homeloc Lat'); ?></dt>
		<dd>
			<?php echo h($adult['Adult']['homeloc_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Homeloc Lng'); ?></dt>
		<dd>
			<?php echo h($adult['Adult']['homeloc_lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adult['Photo']['title'], array('controller' => 'attachments', 'action' => 'view', $adult['Photo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
