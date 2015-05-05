<?php

class StaffRolesController extends CadastroAppController {

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaffRole->create();
			if ($this->StaffRole->save($this->request->data)) {
				$this->Session->setFlash(__('O cargo foi salvo.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				
			} else {
				$this->Session->setFlash(__('O cargo não pôde ser salvo. Confirme os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["StaffRole"]["staff_id"]));
		}
	}

}
