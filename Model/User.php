<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

	class User extends AppModel{

        public $hasMany = array('Photo', 'Video', 'Comment');

		public $validate = array(
			'username' => array(
            	'rule' => 'notBlank'
        	),
        	'password' => array(
            	'rule' => 'notBlank'
        	),
        	'email' => array(
				'rule' => 'notBlank',
				'email'
			)
			);
		public function beforeSave($options = array()) {
    		if (isset($this->data[$this->alias]['password'])) {
        		$passwordHasher = new BlowfishPasswordHasher();
        		$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
    		}
    		return true;
        }
	}
?>