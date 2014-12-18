<div class="row">
	<div class="col-xs-12">
		<h2 style="text-align: center; margin-bottom: 20px;"><i class="fa fa-user"></i> Selecionar Aluno</h2>

		<?php foreach($actors as $a) : ?>
			<a href="<?php echo $this->Html->url( array("action" => "set_student", $this->Html->dados($a, 'Student', 'id'), $this->Html->dados($a, 'id'), $a["prefix"] ) ); ?>" class="btn-escolher-estudante">
				<img class="img-circle img-center img-responsive" src="http://i1117.photobucket.com/albums/k591/supervaidosa/perfil.jpg" alt="thumb">
				<p class="nome"><?php echo $this->Html->dados($a, "Student", "name"); ?></p>

				<?php if(!IN_PRODUCTION) : ?>
				<p class="ator"><?php echo $this->Html->dados($a, "name"); ?> <span><?php echo $a["actor"]; ?></span></p>
				<?php endif; ?>
			</a>
		<?php endforeach; ?>
	</div>
	</div>
</div>