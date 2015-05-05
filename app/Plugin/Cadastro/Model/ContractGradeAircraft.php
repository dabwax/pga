<?php
class ContractGradeAircraft extends CadastroAppModel {
	public $belongsTo = array("Aircraft", "ContractGrade", "Basis");
	public $hasMany = array("ContractGradeAircraftStaff");
}