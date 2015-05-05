<?php
class AircraftModelsController extends CadastroAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set("title_for_layout", "Listar Modelos de Aeronaves");

		$this->Paginator->settings = array("limit" => 9999);
		$this->set('aircraft_models', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set("title_for_layout", "Cadastrar Modelo de Aeronave");
		$classe = array(
			"Avião" => "Avião",
			"Helicóptero" => "Helicóptero",
		);
		$porte = array(
			"PP" => "Pequeno-Porte",
			"MP" => "Médio-Porte",
			"SMP" => "Super Médio-Porte",
			"GP" => "Grande-Porte",
		);
		$motorizacao = array(
			"MULTI" => "Multimotor",
			"MONO" => "Monomotor",
		);
		$this->set(compact("classe"));
		$this->set(compact("porte"));
		$this->set(compact("motorizacao"));

		if ($this->request->is('post')) {
			$this->AircraftModel->create();
			if ($this->AircraftModel->save($this->request->data)) {
				$this->Session->setFlash(__('O modelo de aeronave foi salvo.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o modelo de aeronave. Verifique os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set("title_for_layout", "Editar Modelo de Aeronave");
		$classe = array(
			"Avião" => "Avião",
			"Helicóptero" => "Helicóptero",
		);
		$porte = array(
			"PP" => "Pequeno-Porte",
			"MP" => "Médio-Porte",
			"SMP" => "Super Médio-Porte",
			"GP" => "Grande-Porte",
		);
		$motorizacao = array(
			"MULTI" => "Multimotor",
			"MONO" => "Monomotor",
		);

		if (!$this->AircraftModel->exists($id)) {
			throw new NotFoundException(__('Invalid aircraft model'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AircraftModel->save($this->request->data)) {
				$this->Session->setFlash(__('O modelo de aeronave foi salvo.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o modelo de aeronave. Verifique os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
			}
		} else {
			$options = array('conditions' => array('AircraftModel.' . $this->AircraftModel->primaryKey => $id));
			$this->request->data = $this->AircraftModel->find('first', $options);
		}

		$aircraft_models = $this->AircraftModel->find("list", array(
			"conditions" => array("AircraftModel.id !=" => $id)
		));

		$aircraft_similars = $this->AircraftModel->AircraftSimilar->find("all", array(
			"conditions" => array("AircraftSimilar.aircraft_model_id" => $id),
			"contain" => array("AircraftModelSimilar")
		));
		
		$this->set(compact("aircraft_models", "aircraft_similars", "classe", "porte", "motorizacao"));

		$this->AircraftModel->recursive = 0;

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AircraftModel->id = $id;

		if (!$this->AircraftModel->exists()) {
			throw new NotFoundException(__('Invalid aircraft model'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AircraftModel->delete()) {
				$this->Session->setFlash(__('O modelo de aeronave foi removido.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o modelo de aeronave.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
