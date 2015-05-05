<?php
class AircraftBasis extends CadastroAppModel {
    public $belongsTo = array("Cadastro.Aircraft", "Cadastro.Basis");

    public function beforeSave($options = array()) {

        if(!empty($this->data["AircraftBasis"]["date_start"])) {
            $this->data["AircraftBasis"]["date_start"] = $this->parseDate($this->data["AircraftBasis"]["date_start"], 'Y-m-d');
        }
        return true;
    }

    public function afterFind($results, $primary = false) {

        foreach ($results as $key => $val) {
            if (isset($val['AircraftBasis']['date_start'])) {
                $results[$key]['AircraftBasis']['date_start'] = $this->parseDate($val['AircraftBasis']['date_start']);
            }
        }

        return $results;
    }
}