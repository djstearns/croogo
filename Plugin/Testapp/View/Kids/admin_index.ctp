<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Kids');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Kids'), array('action' => 'index'));

?>
<div class="kids index">
		<table class="table table-striped">
	<tr>
	<th></th>	
	   
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('name'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('age'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('adult_id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('mom'); ?></th>
		 
					<?php echo '<th>Toy</th>'
 ?>
	<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>

	<?php $i = 0; ?>
<?php foreach ($kids as $kid): ?>
<?php $i++; ?>	<tr id='$kid['Kid']['id']'>
	<td>
<?php echo $this->Form->input($kid['Kid']['id'], array('type'=>'checkbox', 'class'=>'markdelete', 'value'=>$kid['Kid']['id'], 'label'=>false)); ?>
	</td>
		<td><?php echo $this->Html->link($kid['Kid']['id'], '#', array('id'=>'id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $kid['Kid']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($kid['Kid']['name'], '#', array('id'=>'name','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $kid['Kid']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($kid['Kid']['age'], '#', array('id'=>'age','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $kid['Kid']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($kid['Adult']['name'], '#', array('data-source'=>$this->base.'/admin/'.$this->params['plugin'].'/adults/getlist' ,'id'=>'adult_id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> $kid['Kid']['id'], 'class'=>'editable editable-click dclass-Adult', 'style'=>'display: inline;')); ?></td>
		<td><?php echo $this->Html->link($kid['Mom']['name'], '#', array('data-source'=>$this->base.'/admin/'.$this->params['plugin'].'/adults/getlist' ,'id'=>'mom','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> $kid['Kid']['id'], 'class'=>'editable editable-click dclass-Mom', 'style'=>'display: inline;')); ?></td>

				 <td> <?php $arr = array(); 
				 $j = 0;
				 $val = 2;
				  foreach($kid['Toy'] as $key => $Toy){
						 if(isset($kid['Toy'][$j]) && ($val < count($Toy)) ){
				 			$arr[] = $Toy['name']; 
							$j++;
						 }
				 }
				 $str = implode(',',$arr); 
					echo $this->Html->link($str, '#', array( 'id'=>'Toy__name','data-url'=>$this->here.'/savehabtmfld', 'data-type'=>'select2', 'data-pk'=> $kid['Kid']['id'], 'class'=>'editable editable-click mclass-Toy', 'style'=>'display: inline;')); ?></td>
					</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $kid['Kid']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $kid['Kid']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $kid['Kid']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $kid['Kid']['id'])); ?>
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
$('.mclass-Toy').editable({
						inputclass: 'input-large',
							select2: {
								tags: <?php echo $toystr; ?>,
								tokenSeparators: [',', ' ']
							}
							});
//fix me below!
			var Adultslist = [];
			$.each(<?php echo json_encode($adults); ?>, function(k, v) {
				Adultslist.push({id: k, text: v});
			}); 
			
			$('.dclass-Adult').editable({
				source: Adultslist,
				select2: {
					width: 200,
					placeholder: 'Select Adult',
					allowClear: true
				} 
			});
 //fix me below!
			var Momslist = [];
			$.each(<?php echo json_encode($adults); ?>, function(k, v) {
				Momslist.push({id: k, text: v});
			}); 
			
			$('.dclass-Mom').editable({
				source: Momslist,
				select2: {
					width: 200,
					placeholder: 'Select Mom',
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