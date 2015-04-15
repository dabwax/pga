<div class="titulo-tab" style="height: 54px;">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "index") ); ?>" class="btn btn-default"><i class="fa fa-list-ul"></i> Arquivo</a>
		<a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nova Mensagem</a>
	</div>
</div>

<div class="row">
	<?php echo $this->Form->create("Message"); ?>
	
	<div class="col-md-6">
		<?php echo $this->Form->input("name", array("label" => "Título") ); ?>
		
	<?php echo $this->Form->input("MessageRecipient.recipients", array("label" => "Destinatários", "type" => "select", "options" => $recipientes, "multiple" => true, 'style' => 'width: 100%;') ); ?>
	</div>

	<div class="col-md-6">
		<?php echo $this->Form->input("content", array("label" => "Mensagem", "class" => "ckeditor") ); ?>
	</div>

	<?php echo $this->Form->input("MessageAuthor.model", array("type" => "hidden", "value" => AuthComponent::user("Actor.model")) ); ?>
	<?php echo $this->Form->input("MessageAuthor.prefix", array("type" => "hidden", "value" => AuthComponent::user("Actor.prefix")) ); ?>
	<?php echo $this->Form->input("MessageAuthor.foreign_key", array("type" => "hidden", "value" => AuthComponent::user("Actor.id")) ); ?>


	<button type="submit" class="btn btn-primary">Salvar</button>

	<?php echo $this->Form->end(); ?>
</div>