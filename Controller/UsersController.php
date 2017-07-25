<?php

class UsersController extends AppController{

	public $helpers = array('Html', 'Form');

	public function beforeFilter() {
    	parent::beforeFilter();
// Allow users to register and logout.
    	$this->Auth->allow('signup', 'logout');
	}
// Login to server
	public function login() {
		$this->layout = 'form_layout';
		if($this->Session->read('Auth.User.username')) {
			return $this->redirect($this->Auth->redirect());
		}

		if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
            	return $this->redirect($this->Auth->redirectUrl());
        	}
        	 else{
        	 	$this->Session->setFlash(__('Invalid username or password, try again'));
        	 }
    	}
	}
	
	public function logout() {
		$this->layout = 'form_layout';
		$this->Session->setFlash('Logged Out');
    	return $this->redirect($this->Auth->logout());
	}

	public function signup() {
		$this->layout = 'form_layout';
		if($this->request->is('post')) {
			$this->User->create();
			$this->log($this->User->create());
			$this->User->findByUsername($this->request->data['User']['username']);

			if(!$this->User->findByUsername($this->request->data['User']['username'])) {
				if ($this->User->save($this->request->data)) {
               		$this->Session->setFlash('Signed Up Successfully');
                	return $this->redirect(array('action' => 'login'));
            	}else{
        	 		$this->Session->setFlash('Signed in Failed');
            	}
            	
			} else {
			     $this->Session->setFlash('Username is already existed');
			}
		}
	}

}
?>