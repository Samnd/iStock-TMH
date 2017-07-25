<?php
class VideosController extends AppController{


    public $components = array('Paginator');

    public $paginate = array(
        'limit'=>12,
        'order'=> array(
            'Video.id'=>'desc'));

	public function isAuthorized($user) {
    // All registered users can add video
    	if ($this->action === 'upload') {
        	return true;
    	}

    // The owner of a post can edit and delete it
    	if (in_array($this->action, array('edit', 'delete'))) {
        	$videoId = (int) $this->request->params['pass'][0];
        	if ($this->Video->isOwnedBy($videoId, $user['id'])) {
            	return true;
        	} 
        }
    	return parent::isAuthorized($user);
	}

//Upload video to save
	public function upload(){
        $this->layout = 'view_layout';
		if ($this->request->is('post')) {
			$this->Video->create();
			$record = array('Video' => array(
				'url_video' => '/videos/'.$this->request->data['Video']['file-upload']['name'],
				'type' => $this->request->data['Video']['type'],
				'des' => $this->request->data['Video']['description'],
				'user_id' => $this->Auth->user('id')
				));
			if (is_uploaded_file(($this->request->data['Video']['file-upload']['tmp_name']))&&($this->Video->save($record))) {
				if(move_uploaded_file($this->request->data['Video']['file-upload']['tmp_name'], './videos/'.$this->request->data['Video']['file-upload']['name'])){
				$this->Flash->success(__('Your video has been uploaded.'));
				return $this->redirect(array('controller'=>'photos' , 'action' => 'index'));
				}
			}
			else $this->Flash->error(__('Unable to upload your video.'));
		}
	}

	public function view($id = null) {
        $this->loadModel('Comment');
		$this->layout = 'view_layout';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $video = $this->Video->findById($id);
        if (!$video) {
            throw new NotFoundException(__('Invalid post'));
        }
       $this->set('video', $video);
        $comment = $this->Comment->findAllByVideoId($id, array(),array('Comment.created' => 'desc'));
        $this->set('comments', $comment);
        $this->set('userid', $this->Auth->user('id'));
    }

    public function edit($id = null) {
        $this->layout = 'view_layout';
    	if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $video = $this->Video->findById($id);
        if (!$video) {
            throw new NotFoundException(__('Invalid post'));
        }

    	if ($this->request->is(array('post', 'put'))) {
    		$this->Video->id = $id;
    		if ($this->request->data['Video']['file-update']['error']!=0) {
    			$record = array('Video' => array(
    				'id' => $id,
				'type' => $this->request->data['Video']['type'],
				'des' => $this->request->data['Video']['description']
				));
			if ($this->Video->save($record)) {
				$this->Flash->success(__('Your video has been updated.'));
				return $this->redirect(array('controller'=>'videos' ,'action' => 'view', $id));
				}
				$this->Flash->error(__('Unable to add your post.'));
    		} else{
    			$record = array('Video' => array(
    				'id' => $id,
					'url_image' => '/videos/'.$this->request->data['Video']['file-update']['name'],
					'type' => $this->request->data['Video']['type'],
					'des' => $this->request->data['Video']['description']
					));
			if (is_uploaded_file(($this->request->data['Video']['file-update']['tmp_name']))&&($this->Video->save($record))) {
				if(move_uploaded_file($this->request->data['Video']['file-update']['tmp_name'], './videos/'.$this->request->data['Video']['file-update']['name'])){
				$this->Flash->success(__('Your video has been uploaded.'));
                return $this->redirect(array('controller'=>'videos' ,'action' => 'view', $id));
				}
			}
			$this->Flash->error(__('Unable to add your post.'));
    		}
    	}
    	if (!$this->request->data) {
        	$this->request->data = $video;
    	}
	}

	public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    $video = $this->Video->findById($id);
    $image_url = $video['Video']['url_video'];
    if ($this->Video->deleteAll(array('Video.id' => $id), false)) {
    	$file = new File($image_url, false, 0777);
    	    	$this->log($file);
    	$test = unlink($file);
        $this->Flash->success(__('The post with id: %s has been deleted.'.print_r($test), h($id)));
    } else {
        $this->Flash->error(
            __('The post with id: %s could not be deleted.', h($id))
        );
    }
    return $this->redirect(array('controller'=>'photos','action' => 'index'));
	}
}
?>