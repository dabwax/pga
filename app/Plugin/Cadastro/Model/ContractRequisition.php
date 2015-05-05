<?php
class ContractRequisition extends CadastroAppModel {
	public $hasMany = array(
		"ContractRequisitionTraining"
	);
}