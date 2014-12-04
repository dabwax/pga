<?php
/**
 * Páginas envolvendo fluxo encontram-se aqui.
 */
class FlowController extends AppController {
	public $uses = array(
		"Message"
	);

	public function index() {
		$student_id = AuthComponent::user("Student.Student.id");

		// busca todas as mensagens envolvendo o estudante
		$messages = $this->Message->find("all", array(
			"conditions" => array(
				"Message.student_id" => $student_id
			)
		) );

		$this->set(compact("messages"));
	}

	public function create() {
		// limpa o array de destinatários
		$recipients = array();

		// pais
		$parents = AuthComponent::user("Student.StudentParent");

		// adicionando a mae
		$label = $parents["mom_name"] . " (Mãe)";
		$value = $parents["id"] . ",mae";

		$recipients[$value] = $label;

		// adicionando o pai
		$label = $parents["dad_name"] . " (Pai)";
		$value = $parents["id"] . ",pai";

		$recipients[$value] = $label;

		// adicionando o tutor
		$label = $parents["tutor_name"] . " (Tutor)";
		$value = $parents["id"] . ",tutor";

		$recipients[$value] = $label;

		// adicionando o psiquiatra
		$psychiatrist = AuthComponent::user("Student.StudentPsychiatrist");
		$label = $psychiatrist["name"] . " (Pai)";
		$value = $psychiatrist["id"] . ",psico";

		$recipients[$value] = $label;

		$this->set("recipientes", $recipients);
	}

	public function view($id = null) {
		
	}
}