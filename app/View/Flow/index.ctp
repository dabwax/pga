<h2 class="titulo-tab">
	<i class="fa fa-comments"></i> Fluxo
</h2>

<div class="row">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default">Criar Mensagem</a>
	</div>
</div>

<div class="row">
	<?php foreach($messages as $m) : ?>
		<div class="col-xs-12 item-mensagem">
			<h4><?php echo $m["Message"]["name"]; ?> <small>Por <?php echo $m["MessageAuthor"]["name"]; ?></small></h4>

			<?php echo $m["Message"]["content"]; ?>

			<span class="label label-default"><?php echo $m["Message"]["views"]; ?> visualizações</span>

			<span class="label label-default timeago" title="<?php echo (new DateTime($m['Message']['created']))->format('c'); ?>"></span>

			<a class="label label-primary" href="<?php echo $this->Html->url( array("action" => "view", $m["Message"]["id"]) ); ?>"><?php echo count($m['MessageReply']); ?> comentário(s). Clique aqui para comentar</a>

			<hr>
		</div> <!-- .item-mensagem -->
	<?php endforeach; ?>
</div>