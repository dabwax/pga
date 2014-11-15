<div class="row">
	<div class="col-xs-12">
		<h2>Selecionar Estudante</h2>

		<?php foreach($actors as $a) : ?>
			<a href="<?php echo $this->Html->url( array("action" => "set_student", $this->Html->dados($a, 'Student', 'id'), $this->Html->dados($a, 'id') ) ); ?>">
				<?php echo $this->Html->dados($a, "Student", "name"); ?> [<?php echo $this->Html->dados($a, "name"); ?> - <?php echo $a["actor"]; ?>]
			</a>
		<?php endforeach; ?>
	</div>
</div>