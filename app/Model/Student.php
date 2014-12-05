<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Student extends AppModel {

	public $hasOne = array(
		'StudentParent',
		'StudentPsychiatrist',
		'StudentSchool'
	);

	public $hasMany = array(
		'Feed',
		'StudentExercise',
		'StudentLesson',
		'StudentInput',	
	);

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();

	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }

	    return true;
	}

}
