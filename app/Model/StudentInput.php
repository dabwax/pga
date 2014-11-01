<?php
class StudentInput extends AppModel {

	public $belongsTo = array("Student", "Input");
	public $hasMany = array("StudentInputValue");
}