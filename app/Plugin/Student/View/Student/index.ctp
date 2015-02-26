<h1>Seja bem-vindo ao PGA</h1>

<a href="<?php echo $this->Html->url( array("action" => "all") ); ?>" class="btn btn-xs btn-default">Ver todos exercícios</a>
<a href="<?php echo $this->Html->url( array("action" => "input") ); ?>" class="btn btn-xs btn-default">Input</a>

<h3>Últimos Exercícios</h3>

<ul>
	<?php foreach($latest_student_exercises as $se) : ?>
	<li>
		<a href="<?php echo $this->Html->url( array("action" => "reply", $se["StudentExercise"]["id"]) ); ?>" class="label label-primary"><?php echo $se["StudentExercise"]["enunciation"]; ?></a>
		<p>Data: <?php echo $se["StudentExercise"]["date"]; ?></p>
		<p>Expira em: <?php echo $se["StudentExercise"]["due_to"]; ?></p>
		<p>Você já respondeu? <span class="label label-default"><?php echo (empty($se["StudentExercise"]["answer"])) ? "Não": "Sim"; ?></span>
		
		<?php if(!empty($se["StudentExercise"]["observations"])) : ?>
		<p>Observação: <?php echo $se["StudentExercise"]["observations"]; ?></p>
		<?php endif; ?>

		<div class="clearfix"></div>

		<?php if(empty($se["StudentExercise"]["answer"])) : ?>
		<a href="<?php echo $this->Html->url( array("action" => "reply", $se["StudentExercise"]["id"]) ); ?>" class="label label-success">Responder agora</a>
		<?php endif; ?>

		<div class="clearfix"></div>

		<?php if(!empty($se["StudentExercise"]["attachment"])) : ?>
		<a href="<?php echo $this->Html->url( array("action" => "download", $se["StudentExercise"]["id"]) ); ?>" class="label label-success">Baixar anexo</a>
		<?php endif; ?>

		</p>
	</li>
	<?php endforeach; ?>
</ul>