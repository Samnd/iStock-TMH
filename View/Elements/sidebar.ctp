<p style=" word-break: break-all;">Name: <?php echo $name; ?></p>
<p>Created: <?php echo $created; ?></p>
<p>Type: <?php echo $type; ?></p>
<p>Description: <?php echo $des; ?></p>
<p>Uploaded By: <?php echo $upload_by ?></p>
<div class="subaction">
	<?php 
		echo $this->Html->link('Edit', array('action' => 'edit',$id),
			array('onclick'=>'return checkPermission()')); 
	?>
</div>
<div class="subaction" style="margin-left: 13px;">
	<?php 
	echo $this->Form->create('',array(
		'id' => 'delete_'.$table,
		'url' => array('action' => 'delete',$id),
		'style' => 'display: none;'
		));
	echo $this->Form->end();
	echo $this->Html->link('Delete', 'javascript:void(0)',
			array('onclick'=>'if(checkPermission()){document.getElementById(\'delete_'.$table.'\').submit();}'));

	?>
</div>
<div  style="margin-left: 13px; border: none; margin-top: 5px;">
	<button id="<?php  echo $id; ?>" style="margin-top: 0px; margin-left: 13px;" class="btn btn-sm btn-default" onclick="likeAction(<?php echo $id.',\''.$table.'\''; ?>)"><span class="glyphicon glyphicon-heart" ></span>0</button>
</div>