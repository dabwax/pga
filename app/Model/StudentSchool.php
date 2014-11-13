<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class StudentSchool extends AppModel {
	public $belongsTo = array("Student");

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['mediator_password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();

	        $this->data[$this->alias]['mediator_password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['mediator_password']
	        );
	    }

	    if (isset($this->data[$this->alias]['coordinator_password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();

	        $this->data[$this->alias]['coordinator_password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['coordinator_password']
	        );
	    }

	    return true;
	}
}