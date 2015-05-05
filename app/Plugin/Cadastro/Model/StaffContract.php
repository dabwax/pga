<?php
class StaffContract extends CadastroAppModel {
    public $belongsTo = array("Contract");
    
    public function beforeSave($options = array()) {

        if (!empty($this->data["StaffContract"]["date"])) {
            $this->data["StaffContract"]["date"] = $this->parseDate($this->data["StaffContract"]["date"], 'Y-m-d');
        }
        return true;
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['StaffContract']['date'])) {
                $results[$key]['StaffContract']['date'] = $this->parseDate($val['StaffContract']['date']);
            }
        }
        return $results;
    }
}