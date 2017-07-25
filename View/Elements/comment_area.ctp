<?php 

foreach ($comments as $comment) {
	echo $this->element('comment_row', array(
		'id' => $comment['Comment']['id'],
		'posted_by' => $comment['User']['username'],
		'posted_by_id' => $comment['User']['id'],
		'created' => $comment['Comment']['created'],
		'comment' => $comment['Comment']['comment']
		));
}


?>