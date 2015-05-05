<?php
class ContractRequisitionTrainingsController extends AppController {

	public function add() {
		if($this->request->is("post")) {
			$this->ContractRequisitionTraining->create();

			if ($this->ContractRequisitionTraining->save($this->request->data)) {
				$this->Session->setFlash("O treinamento foi salvo.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));

			} else {
				$this->Session->setFlash("Não foi possível salvar o treinamento. Tente novamente.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			$requisition = $this->ContractRequisitionTraining->ContractRequisition->find("first", array(
				"conditions" => array(
					"ContractRequisition.id" => $this->request->data["ContractRequisitionTraining"]["contract_requisition_id"]
				)
			) );
			
			return $this->redirect( array("controller" => "contracts", "action" => "edit", $requisition["ContractRequisition"]["contract_id"]) );
		}
	}

}