<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Adults');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Adults'), array('action' => 'index'));

?>
<div class="adults index">
		<table class="table table-striped">
	<tr>
	<th></th>	
	   
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('name'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('homeloc_lat'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('homeloc_lng'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('photo'); ?></th>
			<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>

	<?php $i = 0; ?>
<?php foreach ($adults as $adult): ?>
<?php $i++; ?>	<tr id='$adult['Adult']['id']'>
	<td>
<?php echo $this->Form->input($adult['Adult']['id'], array('type'=>'checkbox', 'class'=>'markdelete', 'value'=>$adult['Adult']['id'], 'label'=>false)); ?>
	</td>
		<td><?php echo $this->Html->link($adult['Adult']['id'], '#', array('id'=>'id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $adult['Adult']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($adult['Adult']['name'], '#', array('id'=>'name','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $adult['Adult']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($adult['Photo']['title'], '#', array('data-source'=>$this->base.'/admin/'.$this->params['plugin'].'/attachments/getlist' ,'id'=>'photo','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> $adult['Adult']['id'], 'class'=>'editable editable-click dclass-Photo', 'style'=>'display: inline;')); ?></td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $adult['Adult']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $adult['Adult']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $adult['Adult']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $adult['Adult']['id'])); ?>
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
			var Photoslist = [];
			$.each(<?php echo json_encode($attachments); ?>, function(k, v) {
				Photoslist.push({id: k, text: v});
			}); 
			
			$('.dclass-Photo').editable({
				source: Photoslist,
				select2: {
					width: 200,
					placeholder: 'Select Photo',
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