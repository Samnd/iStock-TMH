<?php
class LikesController extends AppController{
	public $component  = array('Session', 'Auth');

	public function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('likecheck','likecount','likeaction');
	}
    
	public function likecheck($id, $type){
		$this->layout = false;
		$this->autoRender = false;
		$user = $this->Auth->user('id');
		if ($type=="Photo") {
			$conditions = array("user_id" => $user, "photo_id" => $id);
			$numbers = $this->Like->find('count', array('conditions'=> array("photo_id" => $id)));
		} elseif ($type=="Video") {
			$conditions = array("user_id" => $user, "video_id" => $id);
			$numbers = $this->Like->find('count', array('conditions'=> array("video_id" => $id)));
		}

		if($this->Like->find('first', array('conditions' => $conditions))){
			echo json_encode(array('result' => 'y', 'number'=> $numbers));
		} else {
			echo json_encode(array('result' => 'n', 'number'=> $numbers));
		}
		
	}

	public function likeaction($id, $type){
		$this->layout = false;
		$this->autoRender = false;
		$user = $this->Auth->user('id');
		$numb = count($user);
		if($numb > 0){
			if ($type=="Photo") {
				$conditions = array("user_id" => $user, "photo_id" => $id);
				$post_id = "photo_id";
			} else {
				$conditions = array("user_id" => $user, "video_id" => $id);
				$post_id = "video_id";
			}

		if($this->Like->find('count', array('conditions' => $conditions)) > 0){
			//if liked, unlike this post
			$this->Like->deleteAll(array("user_id" => $user, $post_id => $id),false);
			$numbers = $this->Like->find('count', array('conditions'=> array($post_id => $id)));
			echo json_encode(array('result' => 'd', 'number'=>$numbers));
		} else{
			//if unlike, add to database
			$this->Like->save(array('Like'=>array(
				"user_id" => $user, 
				$post_id => $id
				)));
			$numbers = $this->Like->find('count', array('conditions'=> array($post_id => $id)));
			echo json_encode(array('result' => 'a', 'number'=>$numbers));
		}
		}else echo json_encode(array('flag' => 'false'));
	}
	public function likeLogin(){
		$this->layout = false;
		$this->autoRender = false;
	}
}
?>
