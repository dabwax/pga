<?php
class StudentInputValue extends AppModel {
	public $belongsTo = array("StudentInput", "Student");

	public function findGroup($student_id) {
		$return = array();
		$all = $this->find("all", array("contain" => array("StudentInput") ) );

		foreach($all as $e) {

			$date = $e["StudentInputValue"]["date"];
			$actor = $e["StudentInputValue"]["actor"];

			$return[$date][$actor][] = $e;

		} // - foreach

		return $return;
	}
}