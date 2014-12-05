<?php
App::uses('CakeEmail', 'Network/Email');

class Message extends AppModel {
	public $hasOne = array(
		"MessageAuthor",
		"MessageRecipient"
	);
	
	public $hasMany = array(
		"MessageReply"
	);

	public function sendAlertNewMessageEmail($titulo, $mensagem, $id, $destinatario_email, $destinatario_nome, $autor_nome) {
		$Email = new CakeEmail('smtp');

		$Email->viewVars(array('autor_nome' => $autor_nome, 'destinatario_nome' => $destinatario_nome, 'titulo' => $titulo, 'mensagem' => $mensagem, 'id' => $id));

		$Email->template('nova_mensagem')
		    ->emailFormat('html')
		    ->to($destinatario_email)
		    ->from('contato@pga.com.br')
		    ->subject("[PGA] Nova mensagem \"" . $titulo . "\" por " . $autor_nome)
		    ->send();
	}

	public function sendAlertNewReplyEmail($autor, $mensagem, $titulo, $destinatario, $id) {
		$Email = new CakeEmail('smtp');

		$Email->viewVars(array("autor" => $autor, "mensagem" => $mensagem, "titulo" => $titulo, "id" => $id));

		$Email->template('nova_resposta')
		    ->emailFormat('html')
		    ->to($destinatario)
		    ->from('contato@pga.com.br')
		    ->subject("[PGA] Resposta para \"" . $titulo . "\" por " . $autor)
		    ->send();
	}
}