<?php
App::uses('AppController', 'Controller');
/**
 * StaffLicences Controller
 */
class StaffLicencesController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaffLicence->create();
			if ($this->StaffLicence->save($this->request->data)) {
				$this->Session->setFlash(__('A habilitação foi salva com sucesso.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
			} else {
				$this->Session->setFlash(__('A qualificação não pôde ser salva. Verifique os dados.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["StaffLicence"]["staff_id"]));
		}
	}
}
