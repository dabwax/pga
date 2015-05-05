<?php
class ContractGrade extends CadastroAppModel {
	public $belongsTo = array("Basis");

	public function beforeSave($options = array()) {

		if(!empty($this->data["ContractGrade"]["date_start"])) {
			$this->data["ContractGrade"]["date_start"] = $this->parseDate($this->data["ContractGrade"]["date_start"], 'Y-m-d');
		}
		if(!empty($this->data["ContractGrade"]["date_finish"])) {
			$this->data["ContractGrade"]["date_finish"] = $this->parseDate($this->data["ContractGrade"]["date_finish"], 'Y-m-d');
		}
		return true;
	}

	public function afterFind($results, $primary = false) {

		foreach ($results as $key => $val) {
	        if (isset($val['ContractGrade']['date_start'])) {
	            $results[$key]['ContractGrade']['date_start'] = $this->parseDate($val['ContractGrade']['date_start']);
	        }
	        if (isset($val['ContractGrade']['date_finish'])) {
	            $results[$key]['ContractGrade']['date_finish'] = $this->parseDate($val['ContractGrade']['date_finish']);
	        }
	    }

    	return $results;
	}
}