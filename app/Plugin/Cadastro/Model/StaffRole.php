<?php
class StaffRole extends CadastroAppModel {

	public $belongsTo = array(
		"Cadastro.Staff",
		"Cadastro.Role",
		"Cadastro.AircraftModel",
		"Cadastro.Basis"
	);
	
	public $cargos = array(
		'Co-Piloto I' => 'Co-Piloto I',
		'Co-Piloto II' => 'Co-Piloto II',
		'Co-Piloto III' => 'Co-Piloto III',
		'Piloto Comandante PP' => 'Piloto Comandante PP',
		'Piloto Comandante' => 'Piloto Comandante',
		'Piloto Comandante GP' => 'Piloto Comandante GP',
		'Comissário I' => 'Comissário I',
		'Comissário II' => 'Comissário II',
		'Comissário III' => 'Comissário III'
	);

	public function getCargos() {
		return $this->cargos;
	}

	public function beforeSave($options = array()) {

		if(!empty($this->data["StaffRole"]["date_start"])) {
			$this->data["StaffRole"]["date_start"] = $this->parseDate($this->data["StaffRole"]["date_start"], 'Y-m-d');
		}
		return true;
	}

	public function afterFind($results, $primary = false) {

		foreach ($results as $key => $val) {
	        if (isset($val['StaffRole']['date_start'])) {
	            $results[$key]['StaffRole']['date_start'] = $this->parseDate($val['StaffRole']['date_start']);
	        }
	    }

    	return $results;
	}

	public function findRolesByStaffId($id) {
		return $this->find("all", array(
			"order" => array(
				"StaffRole.date_start DESC"
			),
			"conditions" => array(
				"StaffRole.staff_id" => $id
			),
			"contain" => array(
				"AircraftModel",
				"Basis",
				"Role"
			)
		) );
	}
}