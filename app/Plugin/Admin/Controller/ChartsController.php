<?php

class ChartsController extends AdminAppController {
	public $uses = array("Admin.Chart");

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Chart->recursive = 0;
		$this->set('charts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Chart->exists($id)) {
			throw new NotFoundException(__('Invalid chart'));
		}
		$options = array('conditions' => array('Chart.' . $this->Chart->primaryKey => $id));
		$this->set('chart', $this->Chart->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Chart->create();
			if ($this->Chart->save($this->request->data)) {
				$this->Session->setFlash(__('The chart has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chart could not be saved. Please, try again.'));
			}
		}
		$students = $this->Chart->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Chart->exists($id)) {
			throw new NotFoundException(__('Invalid chart'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Chart->save($this->request->data)) {
				$this->Session->setFlash(__('The chart has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chart could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Chart.' . $this->Chart->primaryKey => $id));
			$this->request->data = $this->Chart->find('first', $options);
		}
		$students = $this->Chart->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Chart->id = $id;
		if (!$this->Chart->exists()) {
			throw new NotFoundException(__('Invalid chart'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Chart->delete()) {
			$this->Session->setFlash(__('The chart has been deleted.'));
		} else {
			$this->Session->setFlash(__('The chart could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
