<?php
App::uses('AppModel', 'Model');

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

}
