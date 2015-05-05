<?php
class Contract extends CadastroAppModel {
	public $belongsTo = array("Cadastro.Aircraft");
	public $hasOne = array("Cadastro.ContractBasis");
	public $hasMany = array("Cadastro.ContractGrade", "Cadastro.ContractRequisition");

	public function beforeSave($options = array()) {

		if(!empty($this->data["Contract"]["expire"])) {
			$this->data["Contract"]["expire"] = $this->parseDate($this->data["Contract"]["expire"], 'Y-m-d');
		}
		return true;
	}

	public function afterFind($results, $primary = false) {

		foreach ($results as $key => $val) {
	        if (isset($val['Contract']['expire'])) {
	            $results[$key]['Contract']['expire'] = $this->parseDate($val['Contract']['expire']);
	        }
	    }

    	return $results;
	}
}