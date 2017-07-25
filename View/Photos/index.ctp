<?php 
	App::import('Model','Comment');
	$newComment = new Comment;
?>
<?php foreach ($posts as $post): ?>

	<?php 
		if ($post[0]['table'] === 'Photo') {
			$comment_count = $newComment->find('count', array('conditions' => array('photo_id' => $post[0]['id'])));
		} else {
			$comment_count = $newComment->find('count', array('conditions' => array('video_id' => $post[0]['id'])));
		}
		
		echo $this->element('post_index_element', array(
			'id' => $post[0]['id'],
			'tab' => $post[0]['table'],
			'url' => $post[0]['url'],
			'comment_count' => $comment_count

			));
		
	 ?>

<?php endforeach; ?>

