<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class StudentParent extends AppModel {
	public $belongsTo = array("Student");

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['mom_password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();

	        $this->data[$this->alias]['mom_password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['mom_password']
	        );
	    }

	    if (isset($this->data[$this->alias]['dad_password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();

	        $this->data[$this->alias]['dad_password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['dad_password']
	        );
	    }

	    if (isset($this->data[$this->alias]['tutor_password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();

	        $this->data[$this->alias]['tutor_password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['tutor_password']
	        );
	    }

	    return true;
	}
}