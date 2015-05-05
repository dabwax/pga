<?php
class ContractGradeAircraftStaff extends CadastroAppModel {

	public $belongsTo = array("ContractGradeAircraft", "Staff");
}