<?php
class StaffCertification extends CadastroAppModel {
	public $belongsTo = array("Treinamento.Certification", "Treinamento.CertificationSupplier", "Cadastro.Staff");

	public function beforeSave($options = array()) {

		if(!empty($this->data["StaffCertification"]["expire"])) {
			$this->data["StaffCertification"]["expire"] = $this->parseDate($this->data["StaffCertification"]["expire"], 'Y-m-d');
		}

		if(!empty($this->data["StaffCertification"]["date_start"])) {
			$this->data["StaffCertification"]["date_start"] = $this->parseDate($this->data["StaffCertification"]["date_start"], 'Y-m-d');
		}

		if(!empty($this->data["StaffCertification"]["date_finish"])) {
			$this->data["StaffCertification"]["date_finish"] = $this->parseDate($this->data["StaffCertification"]["date_finish"], 'Y-m-d');
		}
		return true;
	}

	public function afterFind($results, $primary = false) {

		foreach ($results as $key => $val) {
	        if (isset($val['StaffCertification']['expire'])) {
	            $results[$key]['StaffCertification']['expire'] = $this->parseDate($val['StaffCertification']['expire']);
	        }
	    }

    	return $results;
	}

	public function findCertificationsByStaffId($id) {
		return $this->find("all", array(
			"order" => array(
				"StaffCertification.expire ASC"
			),
			"conditions" => array(
				"StaffCertification.staff_id" => $id
			),
			"contain" => array(
				"Certification"
			)
		) );
	}
}