<?php

class StaffDesignationsController extends CadastroAppController {

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaffDesignation->create();
			if ($this->StaffDesignation->save($this->request->data)) {
				$this->Session->setFlash(__('A designação foi salva.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				
			} else {
				$this->Session->setFlash(__('A designação não pôde ser salva. Confirme os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["StaffDesignation"]["staff_id"]));
		}
	}

}
