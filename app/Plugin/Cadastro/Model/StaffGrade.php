<?php
class StaffGrade extends CadastroAppModel {
	public $belongsTo = array("Cadastro.Staff");
	public $hasOne = array("Cadastro.StaffGradeContract");
	public $hasMany = array("Cadastro.StaffGradeAlert");

	public function beforeSave($options = array()) {

		if(!empty($this->data["StaffGrade"]["date_start"])) {
			$this->data["StaffGrade"]["date_start"] = $this->parseDate($this->data["StaffGrade"]["date_start"], 'Y-m-d');
		}
		if(!empty($this->data["StaffGrade"]["date_finish"])) {
			$this->data["StaffGrade"]["date_finish"] = $this->parseDate($this->data["StaffGrade"]["date_finish"], 'Y-m-d');
		}
		return true;
	}

	public function afterFind($results, $primary = false) {

		foreach ($results as $key => $val) {
	        if (isset($val['StaffGrade']['date_start'])) {
	            $results[$key]['StaffGrade']['date_start'] = $this->parseDate($val['StaffGrade']['date_start']);
	        }
	        if (isset($val['StaffGrade']['date_finish'])) {
	            $results[$key]['StaffGrade']['date_finish'] = $this->parseDate($val['StaffGrade']['date_finish']);
	        }
	    }

    	return $results;
	}

	public function findTypes() {

		return array(
			1 => "Apresentação",
			2 => "Escala",
			5 => "Férias",
			6 => "Treinamento",
		);
	}

	public function findGradesByStaffId($id, $type) {
		if($type == "ferias") {
			$type = 5;
		} elseif($type == "escalas") {
			$type = 2;
		}

		return $this->find("all", array(
			"conditions" => array(
				"StaffGrade.staff_id" => $id,
				"StaffGrade.type" => $type
			),
			"contain" => array(
				"StaffGradeContract" => array(
					"Contract" => array(
						"Aircraft"
					)
				)
			)
		) );
	}
}