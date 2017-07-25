<?php 
	/**
	* 
	*/
	class Comment extends AppModel
	{
		public $belongsTo = array('User', 'Photo');
		
		public function isOwnedBy($comment, $user) {
   		return $this->field('id', array('id' => $comment, 'user_id' => $user)) !== false;
	}
	}
?>