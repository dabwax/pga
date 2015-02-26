<?php
class StudentExercise extends AppModel {
    public $belongsTo = array("Student", "StudentLesson");

    public function beforeSave($options = array()) {

        if (isset($this->data[$this->alias]['date'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['date']);
            $this->data[$this->alias]['date'] = $oDateTime->format("Y-m-d");
        }

        if (isset($this->data[$this->alias]['due_to'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['due_to']);
            $this->data[$this->alias]['due_to'] = $oDateTime->format("Y-m-d");
        }

        return true;
    }

    public function afterFind($results = array(), $primary = false) {
        foreach($results as $i => $result) {
            if(!empty($result[$this->alias]['date'])) {
                $oDateTime = new DateTime($result[$this->alias]['date']);
                $results[$i][$this->alias]['date'] = $oDateTime->format("d/m/Y");
            }

            if(!empty($result[$this->alias]['due_to'])) {
                $oDateTime = new DateTime($result[$this->alias]['due_to']);
                $results[$i][$this->alias]['due_to'] = $oDateTime->format("d/m/Y");
            }
        }

        return $results;
    }

}