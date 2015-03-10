<?php

class Chart extends AdminAppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Input'
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChartStudentInput'
	);

}
