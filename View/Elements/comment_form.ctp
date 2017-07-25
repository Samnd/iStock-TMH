<?php echo $this->Form->create('Comment', array(
	'class'=>'form',
	'default' => false,
	'id'=> 'comment_form'
	));
?>
<fieldset>
	<legend>Comment:</legend>
	<div style="width: 735px; float: left; margin-left: 25px;">
		<?php echo $this->Form->input('user_id', array('id'=>'input_user_id','type'=>'hidden', 'value'=>$this->Session->read('Auth.User.id'))); ?>
		<?php echo $this->Form->input($table.'_id', array('id'=>'input_'.$table.'_id','type'=>'hidden', 'value'=>$id)); ?>
		<?php echo $this->Form->input('comment', array('id'=>'input_comment','type'=>'text' ,'label'=>false, 'placeholder'=>'Add your comment here.', 'class'=>'commentstate', 'rows'=>'3', 'cols'=>'80')); ?>
	</div>
	<div style="width: 60px; float: right; vertical-align: top;">
		<?php 
		$options = array(
		    'label' => 'Add',
		    'onclick' => 'addComment()'
		);
		echo $this->Form->end($options); 
		?>
	</div>
</fieldset>