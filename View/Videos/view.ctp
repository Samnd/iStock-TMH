<div id="logging_in" style="display: none;"><?php print_r($this->Session->read('Auth.User.id')); ?></div>
<div id="owner" style="display: none;"><?php echo $video['User']['id']; ?></div>


<?php echo $this->Html->css('viewcss'); ?>
<?php
	$video_name="";
	if(isset($video['Video']['url_video'])){
		$str= explode("/", $video['Video']['url_video']);
		$i = count($str);
		$video_name = $str[$i-1]; 
	}
?>
<script type="text/javascript">likeCheck(<?php echo $video['Video']['id']; ?>,'Video');</script>
<?php 
	$this->start('sidebar');
	echo $this->element('sidebar',array(
		'name' => $video_name,
		'created' => $video['Video']['created'],
		'type' => $video['Video']['type'],
		'des' => $video['Video']['des'],
		'upload_by' => $video['User']['username'],
		'id' => $video['Video']['id'],
		'table' => 'Video'
		));
	$this->end();

	$this->start('post');
	echo $this->element('video_player' ,array(
								'id' => $video['Video']['id'],
								'url' => $video['Video']['url_video'],
								'controls'=>true
								));
	$this->end();

	$this->start('comment_form');
	echo $this->element('comment_form' ,array(
								'id' => $video['Video']['id'],
								'table' => 'video'
								));
	$this->end();

	$this->start('comment_show');
	echo $this->element('comment_area');
	$this->end();

?>
