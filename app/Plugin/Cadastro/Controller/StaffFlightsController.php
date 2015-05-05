<?php
App::uses('AppController', 'Controller');
/**
 * Staff Flights Controller
 */
class StaffFlightsController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaffFlight->create();
			if ($this->StaffFlight->save($this->request->data)) {
				$this->Session->setFlash(__('O horário de vôo foi salvo.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				
			} else {
				$this->Session->setFlash(__('O horário de vôo não pôde ser salvo. Confirme os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["StaffFlight"]["staff_id"]));
		}
	}

}
