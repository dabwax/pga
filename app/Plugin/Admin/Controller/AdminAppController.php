<?php
class AdminAppController extends AppController {
	
	public $layout = "admin";
	
	public function beforeFilter() {
		parent::beforeFilter();
		if(AuthComponent::user('User.role') != "admin") {
			$this->Session->setFlash("Você não tem permissão para fazer isto.");
			return $this->redirect("/");
		}
	}
}