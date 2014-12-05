<?php 
class StudentController extends StudentAppController {

	public $uses = array("Student");

	public function index() {
		$latest_student_exercises = $this->Student->StudentExercise->find("all", array(
			"conditions" => array(
				"StudentExercise.student_id" => AuthComponent::user("Student.Student.id"),
			),
			"order" => array(
				"created DESC"
			),
			"limit" => 5
		) );

		$this->set(compact("latest_student_exercises", "important_student_exercises"));
	}

	public function reply($id = null) {
		$exercise = $this->Student->StudentExercise->find("first", array(
			"conditions" => array(
				"StudentExercise.id" => $id
			)
		) );

		$this->set(compact("exercise"));

		if($this->request->is("post")) {
			$this->Student->StudentExercise->save($this->request->data);
			$this->Session->setFlash("A sua resposta foi enviada para o tutor. Ele será notificado.");
			return $this->redirect( array("action" => "reply", $id ) );
		}
	}

	public function all() {

		$student_exercises = $this->Student->StudentExercise->find("all", array(
			"conditions" => array(
				"StudentExercise.student_id" => AuthComponent::user("Student.Student.id"),
			),
			"order" => array(
				"created DESC"
			),
			"limit" => 5
		) );

		$this->set(compact("student_exercises"));
	}
}