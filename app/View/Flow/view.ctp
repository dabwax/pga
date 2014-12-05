<h1>Fluxo <small><?php echo $message["Message"]["name"]; ?></small></h1>

<div class="row">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default">Criar Mensagem</a>
		<a href="<?php echo $this->Html->url( array("action" => "index") ); ?>" class="btn btn-default">Voltar</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		
		<p style="margin-top: 20px;">
			<?php echo $message["Message"]["content"]; ?>
		</p>

		<?php if(!empty($message["MessageReply"])) : ?>
			<h3>Respostas</h3>

			<ul>
				<?php foreach($message["MessageReply"] as $r) : ?>
				<li>
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
		<h3>Responder</h3>

		<?php echo $this->Form->create("MessageReply"); ?>

		<?php echo $this->Form->input("message_id", array("type" => "hidden", "value" => $message["Message"]["id"])); ?>

		<?php echo $this->Form->input("model", array("type" => "hidden", "value" => AuthComponent::user("Actor.model") ) ); ?>
		<?php echo $this->Form->input("prefix", array("type" => "hidden", "value" => AuthComponent::user("Actor.prefix") ) ); ?>
		<?php echo $this->Form->input("foreign_key", array("type" => "hidden", "value" => AuthComponent::user("Actor.id") ) ); ?>

		<?php echo $this->Form->input("content", array("label" => false) ); ?>

		<button type="submit" class="btn btn-primary">Salvar comentário</button>
		<?php echo $this->Form->end(); ?>
	</div>
</div>