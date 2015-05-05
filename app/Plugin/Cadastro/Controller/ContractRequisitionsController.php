<?php
class ContractRequisitionsController extends AppController {

	public function add() {
		if($this->request->is("post")) {
			$this->ContractRequisition->create();

			if ($this->ContractRequisition->save($this->request->data)) {
				$this->Session->setFlash("O requisito foi salvo.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));

			} else {
				$this->Session->setFlash("Não foi possível salvar o requisito. Tente novamente.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect( array("controller" => "contracts", "action" => "edit", $this->request->data["ContractRequisition"]["contract_id"]) );
		}
	}

	public function delete($id = null) {
		$this->ContractRequisition->id = $id;

		if (!$this->ContractRequisition->exists()) {
			throw new NotFoundException(__('Invalid contract requisition'));
		}
		
		$requisition = $this->ContractRequisition->find("first", array("conditions" => array("ContractRequisition.id" => $id) ) );

		$this->request->allowMethod('post', 'delete');
		if ($this->ContractRequisition->delete()) {
				$this->Session->setFlash(__('O requisito foi removido.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o requisito.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
		}
		return $this->redirect(array('controller' => 'contracts', 'action' => 'edit', $requisition["ContractRequisition"]["contract_id"]));
	}
}