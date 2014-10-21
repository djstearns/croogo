<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Toys Kids');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Toys Kids'), array('action' => 'index'));

?>
<div class="toysKids index">
		<table class="table table-striped">
	<tr>
	<th></th>	
	   
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('kid_id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('toy_id'); ?></th>
			<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>

	<?php $i = 0; ?>
<?php foreach ($toysKids as $toysKid): ?>
<?php $i++; ?>	<tr id='$toysKid['ToysKid']['id']'>
	<td>
<?php echo $this->Form->input($toysKid['ToysKid']['id'], array('type'=>'checkbox', 'class'=>'markdelete', 'value'=>$toysKid['ToysKid']['id'], 'label'=>false)); ?>
	</td>
		<td><?php echo $this->Html->link($toysKid['ToysKid']['id'], '#', array('id'=>'id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $toysKid['ToysKid']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($toysKid['Kid']['name'], '#', array('data-source'=>$this->base.'/admin/'.$this->params['plugin'].'/kids/getlist' ,'id'=>'kid_id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> $toysKid['ToysKid']['id'], 'class'=>'editable editable-click dclass-Kid', 'style'=>'display: inline;')); ?></td>
		<td><?php echo $this->Html->link($toysKid['Toy']['name'], '#', array('data-source'=>$this->base.'/admin/'.$this->params['plugin'].'/toys/getlist' ,'id'=>'toy_id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> $toysKid['ToysKid']['id'], 'class'=>'editable editable-click dclass-Toy', 'style'=>'display: inline;')); ?></td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $toysKid['ToysKid']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $toysKid['ToysKid']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $toysKid['ToysKid']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $toysKid['ToysKid']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
<script type="text/javascript">
$('.deleteall').click( function (e) {
	e.preventDefault();
	var allVals = [];
	$('.markdelete:checked').each(function() {
	   allVals.push($(this).val());
	 });
	 $.ajax({
	  type: "POST", 
	  url: <?php echo "'".$this->here."/deleteall'"; ?>,	  data: allVals,
	  success: function(data, config) {
		$('.markdelete:checked').each(function() {
		   $('#'+$(this).val()).hide();
		 });
	  }  
	});
	 return false;
	
});

$.fn.editable.defaults.mode = 'inline';

$('.jclass').editable();
//fix me below!
			var Kidslist = [];
			$.each(<?php echo json_encode($kids); ?>, function(k, v) {
				Kidslist.push({id: k, text: v});
			}); 
			
			$('.dclass-Kid').editable({
				source: Kidslist,
				select2: {
					width: 200,
					placeholder: 'Select Kid',
					allowClear: true
				} 
			});
 //fix me below!
			var Toyslist = [];
			$.each(<?php echo json_encode($toys); ?>, function(k, v) {
				Toyslist.push({id: k, text: v});
			}); 
			
			$('.dclass-Toy').editable({
				source: Toyslist,
				select2: {
					width: 200,
					placeholder: 'Select Toy',
					allowClear: true
				} 
			});
 		$(function(){
			$('.datetimepicker').editable({
				format: 'yyyy-mm-dd hh:ii',    
				viewformat: 'dd/mm/yyyy hh:ii',    
				datetimepicker: {
						weekStart: 1
				   }
				
			});
		});
		$('.dclass-checkbox').click( function (e){
			e.preventDefault();
			var linkitem = $(this);
			//$(this).attr("src","");
			var id = $(this).attr('id');
			var value = $(this).attr('value');
			var pk = $(this).attr('data-pk');
			$.ajax({
			  type: "POST", 
			  url: <?php echo "'".$this->here."/editindexsavefld'"; ?>,			  data: {"name":id,"check":value,"pk":pk},
			  success: function(data, config) {
				if(data == '1'){
					$(linkitem).attr("src", "<?php echo $this->base; ?>/project/img/icons/tick.png");					$(linkitem).attr("value", 0);
				}else{
					$(linkitem).attr("src", "<?php echo $this->base; ?>/project/img/icons/cross.png");					$(linkitem).attr("value", 1);
				}
			  }
			  
			});
			 return false;
		});
</script>