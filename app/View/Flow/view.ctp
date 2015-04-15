<div class="titulo-tab" style="height: 54px;">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "view", $message['Message']['id']) ); ?>" class="btn btn-default active"><i class="fa fa-eye"></i> Título: <?php echo $message["Message"]["name"]; ?></a>
		<a href="<?php echo $this->Html->url( array("action" => "index") ); ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
		<a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default"><i class="fa fa-plus-circle"></i> Nova Mensagem</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		
		<div style="margin-top: 10px; margin-bottom: 10px;">
			<?php echo $message["Message"]["content"]; ?>
		</div>

		<small>Visualizado <?php echo $message["Message"]["views"]; ?> vezes</small>

		<?php if(!empty($message["MessageReply"])) : ?>
			<h3>Respostas</h3>

			<ul style="list-style: none; padding: 0px; margin: 0px;">
				<?php foreach($message["MessageReply"] as $r) : ?>
				<li class="col-md-6 form-group">
					<p><?php echo $r["content"]; ?></p>
					<strong>Por <?php echo AuthComponent::user("Student." . $r["model"] . "." . $r["prefix"] . "name"); ?></strong>

					<span class="label label-default timeago" title="<?php echo (new DateTime($r['created']))->format('c'); ?>"></span>
				</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<h3><i class="fa fa-reply"></i> Responder esta mensagem</h3>

		<?php echo $this->Form->create("MessageReply"); ?>

		<?php echo $this->Form->input("message_id", array("type" => "hidden", "value" => $message["Message"]["id"])); ?>

		<?php echo $this->Form->input("model", array("type" => "hidden", "value" => AuthComponent::user("Actor.model") ) ); ?>
		<?php echo $this->Form->input("prefix", array("type" => "hidden", "value" => AuthComponent::user("Actor.prefix") ) ); ?>
		<?php echo $this->Form->input("foreign_key", array("type" => "hidden", "value" => AuthComponent::user("Actor.id") ) ); ?>

		<?php echo $this->Form->input("content", array("label" => false, "div" => "form-group", "class" => "form-control") ); ?>

		<button type="submit" class="btn btn-success btn-block btn-lg btn-ajax"><i class="fa fa-floppy-o"></i> Salvar Comentário</button>
		<?php echo $this->Form->end(); ?>
	</div>
</div>