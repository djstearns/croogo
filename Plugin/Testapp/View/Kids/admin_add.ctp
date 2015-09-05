<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Kids');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Kids'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Kid']['age'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Kids: ' . $this->data['Kid']['age'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Kid');

?>
<div class="kids row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Kid'), '#kid');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='kid' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('age', array(
					'label' => 'Age',
				));
				echo $this->Form->input('adult_id', array(
					'label' => 'Adult Id',
				));
				echo $this->Form->input('mom', array(
					'label' => 'Mom',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('attachment_id', array(
					'label' => 'Attachment Id',
				));
				echo $this->Form->input('birthday', array(
					'label' => 'Birthday',
				));
				echo $this->Form->input('blonde', array(
					'label' => 'Blonde',
				));
				echo $this->Form->input('Toy');
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
