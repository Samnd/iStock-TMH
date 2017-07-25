<div id="logging_in" style="display: none;"><?php print_r($this->Session->read('Auth.User.id')); ?></div>
<div id="owner" style="display: none;"><?php echo $photo['User']['id']; ?></div>

<?php echo $this->Html->css('viewcss'); ?>
<?php
	$image="";
	if(isset($photo['Photo']['url_image'])){
		$str= explode("/", $photo['Photo']['url_image']);
		$i = count($str);
		$image = $str[$i-1]; 
	}
?>
<script type="text/javascript">likeCheck(<?php echo $photo['Photo']['idphoto']; ?>,'Photo');</script>
<?php 
	$this->start('sidebar');
	echo $this->element('sidebar',array(
		'name' => $image,
		'created' => $photo['Photo']['created'],
		'type' => $photo['Photo']['type'],
		'des' => $photo['Photo']['des'],
		'upload_by' => $photo['User']['username'],
		'id' => $photo['Photo']['idphoto'],
		'table' => 'Photo'
		));
	$this->end();

	$this->start('post');
	echo $this->Html->image($photo['Photo']['url_image'], array('class'=>'image'));
	$this->end();

	$this->start('comment_form');
	echo $this->element('comment_form' ,array(
								'id' => $photo['Photo']['idphoto'],
								'table' => 'photo'
								));
	$this->end();

	$this->start('comment_show');
	echo $this->element('comment_area');
	$this->end();

?>
