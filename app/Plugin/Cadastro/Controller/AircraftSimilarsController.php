<?php
class AircraftSimilarsController extends CadastroAppController {

	public function add() {
		if($this->request->is("post")) {
			$this->AircraftSimilar->create();

			if ($this->AircraftSimilar->save($this->request->data)) {
				$this->Session->setFlash("A similaridade foi salva.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));

				// limpa o cache do model do registro anterior
				$this->AircraftSimilar->create();

				// adiciona o novo registro (inverso)
				$this->AircraftSimilar->save( array(
					"aircraft_model_id" => $this->request->data["AircraftSimilar"]["aircraft_model_related_id"],
					"aircraft_model_related_id" => $this->request->data["AircraftSimilar"]["aircraft_model_id"],
				) );

			} else {
				$this->Session->setFlash("Não foi possível salvar a similaridade. Tente novamente.", 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect( array("controller" => "aircraft_models", "action" => "edit", $this->request->data["AircraftSimilar"]["aircraft_model_id"]) );
		}
	}

	public function delete($id = null) {
		$this->AircraftSimilar->id = $id;

		if (!$this->AircraftSimilar->exists()) {
			throw new NotFoundException(__('Invalid aircraft similar'));
		}
		
		$similar = $this->AircraftSimilar->find("first", array("conditions" => array("AircraftSimilar.id" => $id) ) );

		$this->request->allowMethod('post', 'delete');
		if ($this->AircraftSimilar->delete()) {
				$this->Session->setFlash(__('A similaridade foi removida.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
		} else {
			$this->Session->setFlash(__('Não foi possível remover a similaridade.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning'
				));
		}
		return $this->redirect(array('controller' => 'aircraft_models', 'action' => 'edit', $similar["AircraftSimilar"]["aircraft_model_id"]));
	}
}