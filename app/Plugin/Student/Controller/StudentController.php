<?php 
class StudentController extends StudentAppController {

	public $uses = array("Student", "Feed");

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

	public function input() {
		$this->set("title_for_layout", "Criar Novo Input");

		$actor = "aluno";
		$student_id = AuthComponent::user("Student.Student.id");

		// Busca todos os inputs para o estudante
		$student_inputs = $this->Student->StudentInput->find("all", array(
			"conditions" => array(
				"StudentInput.student_id" => AuthComponent::user("Student.Student.id"),
				"StudentInput.actor" => $actor
			),
			"contain" => array(
				"Input"
			)
		) );

		// busca todas as matérias do estudante
		$student_lessons = $this->Student->StudentLesson->find("all", array(
			"conditions" => array(
				"StudentLesson.student_id" => AuthComponent::user("Student.Student.id")
			),
		) );

		$last_entry = $this->Student->StudentInput->StudentInputValue->find("first", array(
			"conditions" => array(
				"StudentInputValue.date" => date("d/m/Y"),
				"StudentInputValue.actor" => "aluno"
			),
			"order" => array(
				"StudentInputValue.id DESC"
			)
		) );

		if(!empty($last_entry)) {
			$has_input = true;
		} else {
			$has_input = false;
		}

		$this->set(compact("student_id", "student_inputs", "student_lessons", "actor", "has_input"));
	}

	public function add_input() {
		if($this->request->is("post")) {

			$input_date = $this->request->data["StudentInputValue"]["date"];
			unset($this->request->data["StudentInputValue"]["date"]);

			// adiciona os inputs
			foreach($this->request->data["StudentInputValue"] as $k => $input_value) {

				if(!empty($input_value["value"]) && !empty($input_value["student_input_id"])) {

					$input_value["date"] = $input_date;

					$this->Student->StudentInput->StudentInputValue->create();

					$this->Student->StudentInput->StudentInputValue->save($input_value);

				}

			}

			// limpa o array de matérias
			// apenas por organização
			foreach($this->request->data["StudentInputValue"] as $k => $input_value) {
				if(empty($input_value["value"])) {
					unset($this->request->data["StudentInputValue"][$k]);
				}
			}

			// adiciona as matérias
			foreach($this->request->data["StudentInputValue"] as $k => $input_value) {

				if(!empty($input_value["value"]) && !empty($input_value["student_lesson_id"])) {

					$input_value["date"] = $input_date;

					$this->Student->StudentInput->StudentInputValue->create();

					$this->Student->StudentInput->StudentInputValue->save($input_value);

				}

			}

			// joga o input para o feed
			$this->Feed->generate($input_date, $this->request->data["StudentInputValue"]);
		}

		$this->Session->setFlash(__('O novo registro de input foi salvo.'));

		return $this->redirect( array("action" => "index") );
	}
}