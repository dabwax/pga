<h1>Seja bem-vindo ao PGA</h1>

<a href="<?php echo $this->Html->url( array("action" => "all") ); ?>" class="btn btn-xs btn-default">Ver todos exercícios</a>
<a href="<?php echo $this->Html->url( array("action" => "input") ); ?>" class="btn btn-xs btn-default">Input</a>
<a href="<?php echo $this->Html->url( array("action" => "index") ); ?>" class="btn btn-xs btn-default">Voltar</a>

<div class="clearfix"></div>

<h3><?php echo $exercise["StudentExercise"]["enunciation"]; ?></h3>

<p>Data: <?php echo $exercise["StudentExercise"]["date"]; ?></p>
<p>Expira em: <?php echo $exercise["StudentExercise"]["due_to"]; ?></p>

<?php if(!empty($exercise["StudentExercise"]["observations"])) : ?>
<p>Observação: <?php echo $exercise["StudentExercise"]["observations"]; ?></p>
<?php endif; ?>

<div class="clearfix"></div>

<?php if(!empty($exercise["StudentExercise"]["attachment"])) : ?>
<a href="<?php echo $this->Html->url( array("action" => "download", $exercise["StudentExercise"]["id"]) ); ?>" class="label label-success">Baixar anexo</a>
<?php endif; ?>

<div class="clearfix"></div>

<p>Você já respondeu? <span class="label label-default"><?php echo (empty($exercise["StudentExercise"]["answer"])) ? "Não": "Sim"; ?></span> 

<div class="clearfix"></div>

<?php if(!empty($exercise["StudentExercise"]["answer"])) : ?>
<strong>Sua Resposta</strong>
<p><?php echo $exercise["StudentExercise"]["answer"]; ?></p>
<?php endif; ?>
</p>

<div class="clearfix"></div>

<?php if(empty($exercise["StudentExercise"]["answer"])) : ?>

<?php echo $this->Form->create("StudentExercise"); ?>
<?php echo $this->Form->input("id", array("value" => $exercise["StudentExercise"]["id"]) ); ?>
<?php echo $this->Form->input("answer", array("label" => "Resposta") ); ?>
<button type="submit" class="btn btn-primary">Salvar resposta</button>
<?php echo $this->Form->end(); ?>

<?php endif; ?>