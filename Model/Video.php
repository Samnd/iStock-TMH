<?php
class Video extends AppModel{

	public $belongsTo = 'User';
	public $hasMany = 'Comment';

	var $primaryKey = 'id';
	public $validate = array(
		'name' => array('rule'=>'notBlank'),
		'file-upload'=>array('extension'=>array('rule'=>array('extension', array('mp4','avi','flv')))
		));

	public function isOwnedBy($video, $user) {
   		return $this->field('id', array('id' => $video, 'user_id' => $user)) !== false;
	}
}
?>