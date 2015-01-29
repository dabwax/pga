<?php
/**
 * Páginas envolvendo fluxo encontram-se aqui.
 */
class FlowController extends AppController {
	public $uses = array(
		"Message",
		"User",
		"Student"
	);

	public function index() {
		$this->layout = "ajax";
		$this->set("title_for_layout", "Fluxo");

		$student_id = AuthComponent::user("Student.Student.id");

		// busca todas as mensagens envolvendo o estudante
		$messages = $this->Message->find("all", array(
			"conditions" => array(
				"Message.student_id" => $student_id
			),
			"order" => array(
				"Message.created DESC"
			)
		) );

		$this->set(compact("messages"));
	}

	/**
	 * Função de atalho para recuperar informações do ator logado.
	 *
	 * auxílio mágico - INFO: daltro.inq
	 */
	public function getActorInfo($field = null) {
		$info = "Actor." . AuthComponent::user("Actor.prefix") . "name";

		return AuthComponent::user($info);
	}

	public function create() {
		$this->layout = "ajax";
		$this->set("title_for_layout", "Criar Mensagem");

		// limpa o array de destinatários
		$recipients = array();

		// pais
		$parents = AuthComponent::user("Student.StudentParent");

		// adicionando a mae
		$label = $parents["mom_name"] . " (Mãe)";
		$value = $parents["id"] . ",mae," . $parents["mom_email"] . "," . $parents["mom_name"];

		$recipients[$value] = $label;

		// adicionando o pai
		$label = $parents["dad_name"] . " (Pai)";
		$value = $parents["id"] . ",pai," . $parents["dad_email"] . "," . $parents["dad_name"];

		$recipients[$value] = $label;

		// adicionando o tutor
		$label = $parents["tutor_name"] . " (Tutor)";
		$value = $parents["id"] . ",tutor," . $parents["tutor_email"] . "," . $parents["tutor_name"];

		$recipients[$value] = $label;

		// adicionando o psiquiatra
		$psychiatrist = AuthComponent::user("Student.StudentPsychiatrist");
		$label = $psychiatrist["name"] . " (Psico)";
		$value = $psychiatrist["id"] . ",psico," . $psychiatrist["email"] . "," . $psychiatrist["name"];

		$recipients[$value] = $label;

		// adicionando o mediador
		$school = AuthComponent::user("Student.StudentSchool");
		$label = $school["mediator_name"] . " (Mediador/a)";
		$value = $school["id"] . ",escola," . $school["mediator_email"] . "," . $school["mediator_name"];

		$recipients[$value] = $label;

		// adicionando o coordenador
		$school = AuthComponent::user("Student.StudentSchool");
		$label = $school["coordinator_name"] . " (Coordenador/a)";
		$value = $school["id"] . ",escola," . $school["coordinator_email"] . "," . $school["coordinator_name"];

		$recipients[$value] = $label;

		$this->set("recipientes", $recipients);

		if($this->request->is("post")) {
			$recipients = array();

			$i = 1;

			$destinatarios = array();

			foreach($this->request->data["MessageRecipient"]["recipients"] as $r) {
				$explode = explode(",", $r);
				$nome = $explode[3];
				$email = $explode[2];
				$actor = $explode[1];
				$foreign_key = $explode[0];
				$model = $this->User->getActorInfo($actor, "model");
				$prefix = $this->User->getActorInfo($actor, "prefix");

				$destinatarios[] = array("nome" => $nome, "email" => $email);

				$recipients["recipient_" . $i . "_model"] = $model;
				$recipients["recipient_" . $i . "_prefix"] = $prefix;
				$recipients["recipient_" . $i . "_foreign_key"] = $foreign_key;

				$i++;
			}

			$this->request->data["Message"]["student_id"] = AuthComponent::user("Student.Student.id");
			$this->request->data["MessageRecipient"] = $recipients;

			$this->Message->saveAll($this->request->data);

			// Avisa aos destinatários que a mensagem foi criada
			foreach($destinatarios as $d) {
				$this->Message->sendAlertNewMessageEmail($this->request->data["Message"]["name"], $this->request->data["Message"]["content"], $this->Message->getInsertID(), $d["email"], $d["nome"], $this->getActorInfo("name") );
			}
			
			$this->Session->setFlash("Aqui está a mensagem criada. Os destinatários receberão uma notificação.");

			return $this->redirect( array("action" => "view", $this->Message->getInsertID() ) );
		}
	}

	public function view($id = null) {
		$this->layout = "ajax";
		
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

		// $this->Message->save( array(
		// 	"id" => $message["Message"]["id"],
		// 	"views" => $message["Message"]["views"] + 1
		// ) );

		if($this->request->is("post")) {
			$this->Message->MessageReply->create();

			$this->Message->MessageReply->save( $this->request->data );

			$this->Session->setFlash("Sua resposta foi inserida a mensagem. Os destinatários serão notificados.");

			$destinatarios = array();

			for($i = 1; $i <= 3; $i++) {
				if(!empty($message["MessageRecipient"]["recipient_" . $i . "_model"])) {
					$model = $message["MessageRecipient"]["recipient_" . $i . "_model"];
					$prefix = $message["MessageRecipient"]["recipient_" . $i . "_prefix"];
					$foreign_key = $message["MessageRecipient"]["recipient_" . $i . "_foreign_key"];

		            $actor = $this->Student->$model->find("first", array(
	                    "conditions" => array(
	                        $model . ".id" => $foreign_key
	                    )
	                ) );

	                $destinatarios[] = $actor[$model][$prefix . "email"];
				}
			}

			foreach($destinatarios as $destinatario) :
				$this->Message->sendAlertNewReplyEmail( $this->getActorInfo("name"), $this->request->data["MessageReply"]["content"], $message["Message"]["name"], $destinatario, $message["Message"]["id"] );
			endforeach;

			return $this->redirect( array("action" => "view", $id) );
		}
	}
}