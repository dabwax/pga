<?php
class ContractGradesController extends AppController {

	public function add() {
		if($this->request->is("post")) {
			$this->ContractGrade->create();

			if ($this->ContractGrade->save($this->request->data)) {
				$this->Session->setFlash("A aeronave foi escalada para a base neste contrato.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));

			} else {
				$this->Session->setFlash("Não foi possível escalar a aeronave. Tente novamente.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect( array("controller" => "contracts", "action" => "edit", $this->request->data["ContractGrade"]["contract_id"]) );
		}
	}
}