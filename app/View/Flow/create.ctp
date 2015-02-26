<h2 class="titulo-tab">
	<i class="fa fa-comments"></i> Fluxo <small>Criar Mensagem</small>
</h2>

<div class="row">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "index") ); ?>" class="btn btn-default">Voltar</a>
	</div>
</div>

<div class="row">
	<?php echo $this->Form->create("Message"); ?>

	<?php echo $this->Form->input("name", array("label" => "Título") ); ?>
	<?php echo $this->Form->input("content", array("label" => "Mensagem", "class" => "ckeditor") ); ?>

	<?php echo $this->Form->input("MessageAuthor.model", array("type" => "hidden", "value" => AuthComponent::user("Actor.model")) ); ?>
	<?php echo $this->Form->input("MessageAuthor.prefix", array("type" => "hidden", "value" => AuthComponent::user("Actor.prefix")) ); ?>
	<?php echo $this->Form->input("MessageAuthor.foreign_key", array("type" => "hidden", "value" => AuthComponent::user("Actor.id")) ); ?>

	<?php echo $this->Form->input("MessageRecipient.recipients", array("label" => "Destinatários", "type" => "select", "options" => $recipientes, "multiple" => true) ); ?>

	<button type="submit" class="btn btn-primary">Salvar</button>

	<?php echo $this->Form->end(); ?>
</div>