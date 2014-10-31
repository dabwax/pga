<?php
App::uses('AppController', 'Controller');
/**
 * Students Controller
 *
 * @property Student $Student
 * @property PaginatorComponent $Paginator
 */
class StudentsController extends AppController {
	public $uses = array("Student", "Input");

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
		$this->Student->recursive = 0;
		$this->set('students', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
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
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Student->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
		}

		$atores = array(
			"Tutor",
			"Psico",
			"Escola",
			"Pais",
			"Aluno"
		);

		$inputs = $this->Input->find("all");

		$student_inputs = $this->Student->StudentInput->find("all", array(
			"conditions" => array(
				"StudentInput.student_id" => $id
			),
			"contain" => array(
				"Input"
			)
		) );

		$this->set(compact("atores", "inputs", "student_inputs"));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Student->delete()) {
			$this->Session->setFlash(__('The student has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function add_input($input_id, $student_id, $actor) {

		if($this->request->is("post")) {

			$this->Student->StudentInput->create();

			$dados = array(
				"student_id" => $student_id,
				"input_id" => $input_id,
				"actor" => strtolower($actor),
				"name" => $this->request->data["StudentInput"]["name"]
			);

			$this->Student->StudentInput->save($dados);

			$this->Session->setFlash(__('O novo input foi salvo.'));

			return $this->redirect( array("action" => "edit", $student_id) );

		} // - post

		$input = $this->Input->findById($input_id);
		$student = $this->Student->findById($student_id);

		$this->set(compact("input", "student"));
	}

	public function delete_student_input($student_input_id, $student_id) {
		$this->Student->StudentInput->delete($student_input_id);

		$this->Session->setFlash(__('O input foi deletado.'));

		return $this->redirect( array("action" => "edit", $student_id) );
	}
}
