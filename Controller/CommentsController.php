<?php
    /**
     * 
     */
     class CommentsController extends AppController
     {
        public $component = array('Seasion');

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('add');
            }

        public function isAuthorized($user) {
            // All registered users can add posts
            if ($this->action === 'add') {
                return true;
            }
            // The owner of a post can edit and delete it
            if (in_array($this->action, array('edit', 'delete'))) {
                $CommentId = (int) $this->request->params['pass'][0];
                if ($this->Comment->isOwnedBy($CommentId, $user['id'])) {
                    return true;
                } else {
                    echo json_encode(array('auth'=>'false'));
                }
            }
            return parent::isAuthorized($user);
        }

        public function add(){
            $this->layout = false;
            $this->autoRender = false;
            $temp = array('Comment'=>$this->request->data);
            if ($this->Comment->save($temp)) {
                if ($this->request->data('photo_id')>0) {
                    $comment = $this->Comment->findAllByPhotoId($this->request->data('photo_id'), array(), array('Comment.created' => 'desc'));
                    
                } else{
                    $comment = $this->Comment->findAllByVideoId($this->request->data('video_id'), array(),array('Comment.created' => 'desc'));
                } 

                $view = new View($this, false);
                $view->viewPath='Elements';  // Directory inside view directory to search for .ctp files
                $view->set('comments', $comment); // set your variables for view here
                $html = $view->render('comment_area'); 
                echo json_encode($html);
            }
        }

        public function edit($id){
            $this->layout = false;
            $this->autoRender = false;
            $temp = array('Comment'=>$this->request->data);
            if ($this->Comment->save($temp)) {
                echo json_encode(array('result' => 'true'));
            } else {
                echo json_encode(array('result' => 'false'));
            }
        }

        public function delete($id) {
            $this->layout = false;
            $this->autoRender = false;
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
            $id_photo = $this->Comment->findById($id);
            $num  = count($id_photo);
            if ($num> 0 && $this->Comment->delete($id)) {
                echo json_encode(array('result' => 'true'));
            } else {
                echo json_encode(array('result' => 'false'));
            }
            
        }
    }
?>
