<?php
class StaffDesignation extends CadastroAppModel {
    public $belongsTo = array("Cadastro.Staff", "Cadastro.Designation", "Cadastro.AircraftModel");

    public function beforeSave($options = array()) {

        if(!empty($this->data["StaffDesignation"]["date_start"])) {
            $this->data["StaffDesignation"]["date_start"] = $this->parseDate($this->data["StaffDesignation"]["date_start"], 'Y-m-d');
        }

        return true;
    }

    public function afterFind($results, $primary = false) {

        foreach ($results as $key => $val) {
            if (isset($val['StaffDesignation']['date_start'])) {
                $results[$key]['StaffDesignation']['date_start'] = $this->parseDate($val['StaffDesignation']['date_start']);
            }

        }

        return $results;
    }

    public function getByAircraftModel($aircraft_model_id, $type = "name") {

        $fields = array(
                'Staff.id',
                'Staff.name',
            );

        if($type == "nickname") {
            $fields = array(
                'Staff.id',
                'Staff.nickname',
            );
        }

        $options = array(
            'conditions' => array(
                'StaffDesignation.aircraft_model_id' => $aircraft_model_id
            ),
            'contain' => array(
                'Staff'
            ),
            'fields' => $fields,
        );
        $staffs_o = $this->find("list", $options);
        return $staffs_o;
    }

    public function findInstrutores($aircraft_model_id, $certification) {

        // se for SOLO, TIC ou TIE
        if($certification["Certification"]["certification_type_id"] == 1 || $certification["Certification"]["certification_type_id"] == 3 || $certification["Certification"]["certification_type_id"] == 4) {
            $designations = array(15, 16, 17);
        // se for simulador
        } else if($certification["Certification"]["certification_type_id"] == 2) {
            $designations = array(17);
        }

        $designations_instrutor = $this->find("all", array(
            "conditions" => array(
                "StaffDesignation.designation_id" => $designations,
                "StaffDesignation.aircraft_model_id" => $aircraft_model_id
            ),
            "fields" => array("StaffDesignation.id", "StaffDesignation.staff_id", "Staff.name"),
            "group" => array('StaffDesignation.id'),
            "contain" => "Staff"
        ) );

        $ids_instrutor = array();

        foreach($designations_instrutor as $s) {
            $ids_instrutor[] = $s["StaffDesignation"]["staff_id"];
        }

        return $ids_instrutor;
    }

    public function findExaminadores($aircraft_model_id) {
        $designations_examinador = $this->Staff->StaffDesignation->find("all", array(
            "conditions" => array(
                "StaffDesignation.designation_id" => 18,
                "StaffDesignation.aircraft_model_id" => $aircraft_model_id
            ),
            "fields" => array("StaffDesignation.id", "StaffDesignation.staff_id"),
            "group" => array('StaffDesignation.id')
        ) );

        $ids_examinador = array();

        foreach($designations_examinador as $s) {
            $ids_examinador[] = $s["StaffDesignation"]["staff_id"];
        }

        return $ids_examinador;
    }

    public function findDisponiveis($aircraft_model_id = array()) {
        $staffs_ids = $this->find("all", array(
            "conditions" => array(
                "StaffDesignation.aircraft_model_id" => $aircraft_model_id
            ),
            "fields" => array(
                "StaffDesignation.id",
                "StaffDesignation.staff_id",
            )
        ) );

        $ids = array();

        foreach($staffs_ids as $s) {
            $ids[] = $s["StaffDesignation"]["staff_id"];
        }

        $staffs = $this->Staff->find("list", array(
            "conditions" => array(
                "Staff.id" => $ids
            )
        ) );

        return $staffs;
    }
}