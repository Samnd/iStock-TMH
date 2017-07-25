
<?php echo $this->Html->css('uploadcss'); ?>
<div id="form_up" class="outset">
	<?php
		echo $this->Form->create('Video', array('type' => 'file'));
		?>
		<fieldset>
		<legend>Upload video:</legend>
		<?php
		echo $this->Form->input('type', array('options' => array(
			'nature' => 'Nature',
			'people' => 'People',
			'animal' => 'Animal',
			'others' => 'Others')
			));
    ?>
    <?php
		echo $this->Form->input('description', array('rows' => '3'));
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('file-upload', array('type' => 'file'));
		echo $this->Form->end('upload');
	?>
	</fieldset>

</div>