<?php
class ContractsController extends AppController {
	public $uses = array("Staff", "Contract");

	public function index() {
		$this->set("title_for_layout", "Listar Contratos");

		$this->Paginator->settings = array(
			'contain' => array('Aircraft')
		);

		$this->set('contracts', $this->Paginator->paginate("Contract"));
	}

	public function add() {
		$this->set("title_for_layout", "Cadastrar Contrato");
		
		$aircrafts = $this->Contract->Aircraft->find("list");
		$this->set(compact("aircrafts"));

		if ($this->request->is('post')) {
			$this->Contract->create();
			if ($this->Contract->save($this->request->data)) {
				$this->Session->setFlash(__('O contrato foi salvo.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				return $this->redirect(array('action' => 'edit', $this->Contract->getInsertID() ) );
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o contrato. Verifique os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
			}
		}
	}

	public function delete($id = null) {
		$this->Contract->id = $id;
		if (!$this->Contract->exists()) {
			throw new NotFoundException(__('Invalid contract'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contract->delete()) {
			$this->Session->setFlash(__('O contrato foi removido.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o contrato.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function edit($id = null) {
		$this->set("title_for_layout", "Editar Contrato");
		$this->uses = array("Staff", "Contract", "Basis");

		$aircrafts = $this->Contract->Aircraft->find("list");
		$bases = $this->Basis->find("list");
		$roles = $this->Staff->findRoles();

		$this->set(compact("bases", "aircrafts", "roles"));


		if (!$this->Contract->exists($id)) {
			throw new NotFoundException(__('Invalid basis'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contract->save($this->request->data)) {
				$this->Session->setFlash(__('O contrato foi salvo.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O contrato não pôde ser salvo. Verifique os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
			}
		} else {
			$options = array('conditions' => array('Contract.' . $this->Contract->primaryKey => $id));
			$this->request->data = $this->Contract->find('first', $options);
		}

		$requisitions = $this->Contract->ContractRequisition->find("all", array(
			"conditions" => array(
				"ContractRequisition.contract_id" => $id
			),
			"contain" => array(
				"ContractRequisitionTraining" => array(
					"Certification"
				)
			)
		) );
		$certifications = $this->Contract->ContractRequisition->ContractRequisitionTraining->Certification->find("list");

		$contract_grades = $this->Contract->ContractGrade->find("all", array(
			"conditions" => array(
				"ContractGrade.contract_id" => $id,
			),
			"contain" => array(
				"Basis"
			)
		) );
		$this->set(compact("contract_grades", "requisitions", "certifications"));
	}
}