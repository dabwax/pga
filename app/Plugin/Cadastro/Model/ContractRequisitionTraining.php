<?php
class ContractRequisitionTraining extends CadastroAppModel {
	public $belongsTo = array("ContractRequisition", "Certification");
}