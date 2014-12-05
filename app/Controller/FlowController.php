<?php
/**
 * Páginas envolvendo fluxo encontram-se aqui.
 */
class FlowController extends AppController {
	public $uses = array(
		"Message",
		"User"
	);

	public function index() {
		$this->set("title_for_layout", "Fluxo");

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
		$this->set("title_for_layout", "Criar Mensagem");

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
		$label = $psychiatrist["name"] . " (Psico)";
		$value = $psychiatrist["id"] . ",psico";

		$recipients[$value] = $label;

		$this->set("recipientes", $recipients);

		if($this->request->is("post")) {
			$recipients = array();

			$i = 1;

			foreach($this->request->data["MessageRecipient"]["recipients"] as $r) {
				$explode = explode(",", $r);
				$actor = $explode[1];
				$foreign_key = $explode[0];
				$model = $this->User->getActorInfo($actor, "model");
				$prefix = $this->User->getActorInfo($actor, "prefix");

				$recipients["recipient_" . $i . "_model"] = $model;
				$recipients["recipient_" . $i . "_prefix"] = $prefix;
				$recipients["recipient_" . $i . "_foreign_key"] = $foreign_key;

				$i++;
			}

			$this->request->data["Message"]["student_id"] = AuthComponent::user("Student.Student.id");
			$this->request->data["MessageRecipient"] = $recipients;

			$this->Message->saveAll($this->request->data);
			
			$this->Session->setFlash("Aqui está a mensagem criada. Os destinatários receberão uma notificação.");

			return $this->redirect( array("action" => "view", $this->Message->getInsertID() ) );
		}
	}

	public function view($id = null) {
		$message = $this->Message->find("first", array(
			"conditions" => array(
				"Message.id" => $id
			),
			"contain" => array(
				"MessageAuthor",
				"MessageRecipient",
				"MessageReply",
			)
		) );
		
		$this->set("title_for_layout", $message["Message"]["name"] . " - Fluxo");

		$this->set(compact("message"));

		$this->Message->save( array(
			"id" => $message["Message"]["id"],
			"views" => $message["Message"]["views"] + 1
		) );

		if($this->request->is("post")) {
			$this->Message->MessageReply->create();

			$this->Message->MessageReply->save( $this->request->data );

			$this->Session->setFlash("Sua resposta foi inserida a mensagem. Os destinatários serão notificados.");

			return $this->redirect( array("action" => "view", $id) );
		}
	}
}