<?php

class AdminController extends AdminAppController {

	public function beforeFilter() {

		// somente admin pode acessar o admin (durr)
		if ($this->Auth->login()) {

			$user = AuthComponent::user();

			if($user["User"]["role"] == 'actor') {
				$this->Session->setFlash("Área restrita.");
				return $this->redirect('/');
			}
		} else {
			$this->Session->setFlash("Área restrita.");
			return $this->redirect('/');
		}
	}

	public function index() {

	}
}