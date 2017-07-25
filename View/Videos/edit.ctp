<?php echo $this->Html->css('uploadcss'); ?>
<div id="form_up" class="outset">
	<?php
		echo $this->Form->create('Video', array('type' => 'file'));
		?>
		<fieldset>
		<legend>Edit video:</legend>
		<?php
		echo $this->Form->input('type', array('options' => array(
			'nature' => 'Nature',
			'people' => 'People',
			'animal' => 'Animal',
			'others' => 'Others'),
			'checked'=>$this->request->data['Video']['type']));
    ?>
    <?php
		echo $this->Form->input('description', array('rows' => '3', 'value'=>$this->request->data['Video']['des']));
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('file-update', array('type' => 'file'));
		echo $this->Form->end('update');
	?>
	</fieldset>
</div>