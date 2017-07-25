<?php
class PhotosController extends AppController{


    public $components = array('Paginator');
    public $paginate = array('Photo'=>array('limit'=>12));

	public function isAuthorized($user) {
    // All registered users can add posts
    	if ($this->action === 'upload') {
        	return true;
    	}
    // The owner of a post can edit and delete it
    	if (in_array($this->action, array('edit', 'delete'))) {
        	$photoId = (int) $this->request->params['pass'][0];
        	if ($this->Photo->isOwnedBy($photoId, $user['id'])) {
            	return true;
        	} else $this->Session->setFlash(__('You do not have permission to do that.'));
    	}
    	return parent::isAuthorized($user);
	}

    public function index(){
        $this->layout = 'indexx';
        $this->Paginator->settings = $this->paginate;
        $data = $this->paginate('Photo');
     if($this->request->is('post')) {
            if (isset($this->request->data['Photo']['type'])) {
                if ($this->request->data['Photo']['type']=='all'){
                    $data = $this->paginate('Photo');
                } else {
                    $data = $this->paginate('Photo', array('type'=>$this->request->data['Photo']['type']));
                }
            }
     }
        $this->set('posts', $data);
    }

//Upload photo to server
	public function upload(){
        $this->layout = 'view_layout';
		if ($this->request->is('post')) {
			$this->Photo->create();
			$record = array('Photo' => array(
				'url_image' => '/images/'.$this->request->data['Photo']['file-upload']['name'],
				'type' => $this->request->data['Photo']['type'],
				'des' => $this->request->data['Photo']['description'],
				'user_id' => $this->Auth->user('id')
				));
			if (is_uploaded_file(($this->request->data['Photo']['file-upload']['tmp_name']))&&($this->Photo->save($record))) {
				if(move_uploaded_file($this->request->data['Photo']['file-upload']['tmp_name'], './images/'.$this->request->data['Photo']['file-upload']['name'])){
				$this->Flash->success(__('Your photo has been uploaded.'));
				return $this->redirect(array('action' => 'index'));
				}
			}
			$this->Flash->error(__('Unable to add your post.'));
		}
	}

	public function view($id = null) {
        $this->loadModel('Comment');
		$this->layout = 'view_layout';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $photo = $this->Photo->findByIdphoto($id);
        if (!$photo) {
            throw new NotFoundException(__('Invalid post'));
        }
       $this->set('photo', $photo);
        $comment = $this->Comment->findAllByPhotoId($id, array(),array('Comment.created' => 'desc'));
        $this->set('comments', $comment);
        $this->set('userid', $this->Auth->user('id'));
    }

    public function edit($id = null) {
        $this->layout = 'view_layout';
    	if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $photo = $this->Photo->findByIdphoto($id);
        if (!$photo) {
            throw new NotFoundException(__('Invalid post'));
        }

    	if ($this->request->is(array('post', 'put'))) {
    		$this->Photo->idphoto = $id;
    		if ($this->request->data['Photo']['file-update']['error']!=0) {
    			$record = array('Photo' => array(
    				'idphoto' => $id,
				'type' => $this->request->data['Photo']['type'],
				'des' => $this->request->data['Photo']['description']
				));
			if ($this->Photo->save($record)) {
				$this->Flash->success(__('Your photo has been updated.'));
				return $this->redirect(array('action' => 'view', $id));
				}
				$this->Flash->error(__('Unable to add your post.'));
    		} else{
    			$record = array('Photo' => array(
    				'idphoto' => $id,
					'url_image' => '/images/'.$this->request->data['Photo']['file-update']['name'],
					'type' => $this->request->data['Photo']['type'],
					'des' => $this->request->data['Photo']['description']
					));
			if (is_uploaded_file(($this->request->data['Photo']['file-update']['tmp_name']))&&($this->Photo->save($record))) {
				if(move_uploaded_file($this->request->data['Photo']['file-update']['tmp_name'], './images/'.$this->request->data['Photo']['file-update']['name'])){
				$this->Flash->success(__('Your photo has been uploaded.'));
				return $this->redirect(array('action' => 'view', $id));
				}
			}
			$this->Flash->error(__('Unable to add your post.'));
    		}
    	}
    	if (!$this->request->data) {
        	$this->request->data = $photo;
    	}
	}

	public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    $photo = $this->Photo->findByIdphoto($id);
    $image_url = $photo['Photo']['url_image'];
    if ($this->Photo->deleteAll(array('Photo.idphoto' => $id), false)) {
    	
        $this->Flash->success(__('The post with id: %s has been deleted.'.print_r($test), h($id)));
    } else {
        $this->Flash->error(
            __('The post with id: %s could not be deleted.', h($id))
        );
    }
    return $this->redirect(array('action' => 'index'));
	}
}
?>