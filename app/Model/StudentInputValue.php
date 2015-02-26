<?php
class StudentInputValue extends AppModel {
    public $belongsTo = array("StudentInput", "StudentLesson", "Student");

    public function findGroup($student_id) {
        $return = array();
        $all = $this->find("all", array("contain" => array("StudentInput", "StudentLesson") ) );

        foreach($all as $e) {

            $date = $e["StudentInputValue"]["date"];
            $actor = $e["StudentInputValue"]["actor"];

            $return[$date][$actor][] = $e;

        } // - foreach

        return $return;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['date'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['date']);
            $this->data[$this->alias]['date'] = $oDateTime->format("Y-m-d");
        }

        return true;
    }

    public function afterFind($results = array(), $primary = false) {
        foreach($results as $i => $result) {
            if(!empty($result[$this->alias]['date'])) {
                $oDateTime = new DateTime($result[$this->alias]['date']);
                $results[$i][$this->alias]['date'] = $oDateTime->format("d/m/Y");
            }
        }

        return $results;
    }
}