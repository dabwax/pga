<div class="students form">
<?php echo $this->Form->create('Student'); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#perfil" role="tab" data-toggle="tab">Perfil</a></li>
  <li role="presentation"><a href="#conteudo" role="tab" data-toggle="tab">Conteúdo</a></li>
  <li role="presentation"><a href="#relatorios" role="tab" data-toggle="tab">Relatórios</a></li>
  <li role="presentation"><a href="#alertas" role="tab" data-toggle="tab">Alertas</a></li>
  <li role="presentation"><a href="#materias" role="tab" data-toggle="tab">Matérias</a></li>
  <li role="presentation"><a href="#exercicios" role="tab" data-toggle="tab">Exercícios</a></li>
  <li role="presentation"><a href="#inputs" role="tab" data-toggle="tab">Inputs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="perfil">
  	
  	<?php
		echo $this->Form->input('Student.id');
	?>

	<fieldset>
	<?php
		echo $this->Form->input('Student.name');
		echo $this->Form->input('Student.date_of_birth');
		echo $this->Form->input('Student.school');
		echo $this->Form->input('Student.clinical_condition');
		echo $this->Form->input('Student.description');
	?>
	</fieldset>
	<fieldset>
		<legend>Psico</legend>
		<?php
		echo $this->Form->input('StudentPsychiatrist.id');
		echo $this->Form->input('StudentPsychiatrist.name');
		echo $this->Form->input('StudentPsychiatrist.phone');
		echo $this->Form->input('StudentPsychiatrist.email');
	?>
	</fieldset>
	<fieldset>
		<legend>Escola - Mediador</legend>
		<?php
		echo $this->Form->input('StudentSchool.id');
		echo $this->Form->input('StudentSchool.mediator_name');
		echo $this->Form->input('StudentSchool.mediator_phone');
		echo $this->Form->input('StudentSchool.mediator_email');
	?>
		<legend>Escola - Coordenador</legend>
		<?php
		echo $this->Form->input('StudentSchool.coordinator_name');
		echo $this->Form->input('StudentSchool.coordinator_phone');
		echo $this->Form->input('StudentSchool.coordinator_email');
	?>
	</fieldset>
	<fieldset>
		<legend>Responsável - Pai</legend>
		<?php
		echo $this->Form->input('StudentParent.id');
		echo $this->Form->input('StudentParent.dad_name');
		echo $this->Form->input('StudentParent.dad_phone');
		echo $this->Form->input('StudentParent.dad_email');
	?>
		<legend>Responsável - Mãe</legend>
		<?php
		echo $this->Form->input('StudentParent.mom_name');
		echo $this->Form->input('StudentParent.mom_phone');
		echo $this->Form->input('StudentParent.mom_email');
	?>
	</fieldset>

	<?php echo $this->Form->end(__('Submit')); ?>

  </div> <!-- #perfil -->
  <div role="tabpanel" class="tab-pane" id="conteudo">
  	
  	<ul class="nav nav-tabs" role="tablist">
  		<?php $i = 0; foreach($atores as $a) : $i++; ?>
	  	<li role="presentation" class="<?php echo ($i == 1) ? 'active' : ''; ?>"><a href="#<?php echo strtolower($a); ?>" role="tab" data-toggle="tab"><?php echo $a; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<div class="tab-content">

	<?php $i = 0; foreach($atores as $a) : $i++; ?>
		<div role="tabpanel" class="tab-pane <?php echo ($i == 1) ? 'active' : ''; ?>" id="<?php echo strtolower($a); ?>">
			<h2>Inputs</h2>

			<div class="row">
				
				<div class="col-xs-8">
					
					<div id="container-final" class="col-xs-12" style="background: #CCC; min-height: 80px;">
						<!--<small>Arraste o novo input para cá</small>-->

						<ul>
							<?php foreach($student_inputs as $si) : ?>
							<?php if($si["StudentInput"]["actor"] == strtolower($a) ) : ?>
							<li>
									<?php echo $si["Input"]["name"]; ?> - <?php echo $si["StudentInput"]["name"]; ?>
								<a href="<?php echo $this->Html->url( array("action" => "delete_student_input", $si["StudentInput"]["id"], $this->request->data["Student"]["id"] ) ); ?>">
									[X]
								</a>
							</li>
							<?php endif; ?>
							<?php endforeach; ?>
						</ul>

						<!--<ul id="lista-final" class="list" style="clear: both; width: 100%; height: 100px; background: red;"></ul>-->
					</div> <!-- #container-final -->

				</div>

				<div class="col-xs-4">
					<strong>Novo Input</strong>

					<div id="container-novo" class="col-xs-12" style="background: #DDD;">
						
						<ul id="lista-novo" class="list">
							<?php foreach($inputs as $i) : ?>
							<li>
								<a href="<?php echo $this->Html->url( array("action" => "add_input", $i["Input"]["id"], $this->request->data["Student"]["id"], $a) ); ?>" class="btn btn-default"><?php echo $i["Input"]["name"]; ?></a>
							</li>
							<?php endforeach; ?>
						</ul>

					</div> <!-- #container-novo -->
				</div>

			</div> <!-- .row -->

		</div>
	<?php endforeach; ?>

	</div>

  </div> <!-- #conteudo -->

  <div role="tabpanel" class="tab-pane" id="inputs">

  	<ul class="nav nav-tabs" role="tablist">
  		<li role="presentation"><a href="#criar-input" role="tab" data-toggle="tab">Criar novo registro</a></li>
  		<li role="presentation"><a href="#arquivo-input" role="tab" data-toggle="tab">Arquivo</a></li>
	</ul>

	<div class="tab-content">

		<div id="criar-input" class="tab-pane">
			
			<?php foreach($atores as $ac) : ?>

				<h3>Como <?php echo $ac; ?></h3>

				<?php echo $this->Form->create("StudentInputValue", array("url" => array("controller" => "students", "action" => "add_student_input_value") ) ); ?>

				<?php echo $this->Form->input("StudentInputValue.date", array("type" => "text", "class" => "calendario", "value" => date("d/m/Y")) ); ?>

				<?php

				$campos = array();
				
				foreach($student_inputs as $k => $si) : ?>

					<?php if($si["StudentInput"]["actor"] == strtolower($ac)) : $campos[$ac][] = $si; ?>

						<?php echo $this->Form->input("StudentInputValue." . $k . ".student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"]) ); ?>
						<?php echo $this->Form->input("StudentInputValue." . $k . ".actor", array("type" => "hidden", "value" => strtolower($ac) ) ); ?>
						<?php echo $this->Form->input("StudentInputValue." . $k . ".student_input_id", array("type" => "hidden", "value" => $si["StudentInput"]["id"]) ); ?>

						<label for=""><?php echo $si["StudentInput"]["name"]; ?></label>

						<?php if( $si["Input"]["name"] == "Calendário" ) : ?>
							<?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "calendario") ); ?>
						<?php elseif ( $si["Input"]["name"] == "Texto" ) : ?>
							<?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false) ); ?>
						<?php endif; ?>

					<?php endif; ?>

				<?php endforeach; ?>

				<?php if(empty($campos[$ac])) : ?>
					<div class="alert alert-info">
						Não há inputs para este ator.
					</div>
				<?php endif; ?>
			
			<?php endforeach; ?>

			<button type="submit" class="btn btn-success">Salvar Registro</button>

			<?php echo $this->Form->end(); ?>
		</div>

		<div id="arquivo-input" class="tab-pane">

			<table class="table">
				<thead>
					<tr>
						<th>
							Ator
						</th>
						<th>
							Campo
						</th>
						<th>
							Valor
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($aulas as $data => $_aulas) : ?>
					<?php foreach($_aulas as $ator => $_aula) : ?>
					<tr>
						<td colspan="4" style="background: #000; color: #FFF; font-weight: bold; text-align: center;">
							<?php echo $data; ?>	
						</td>
					</tr>
					<?php foreach($_aula as $_a) : ?>
					<tr>
						<td>
							<span class="label label-default">
								<?php echo ucfirst($ator); ?>
							</span>
						</td>
						<td>
							<?php echo $_a["StudentInput"]["name"]; ?>
						</td>
						<td>
							<?php echo $_a["StudentInputValue"]["value"]; ?>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php endforeach; ?>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div> <!-- #arquivo-input -->
  	
  	</div> <!-- .tab-content -->

  </div> <!-- #inputs -->

  <div role="tabpanel" class="tab-pane" id="materias">
  	
  	<table class="table">
  		<thead>
  			<tr>
  				<th>
  					Nome
  				</th>
  				<th>
  					Ações
  				</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach($student_lessons as $l) : ?>
  			<tr>
  				<td>
  					<?php echo $l["StudentLesson"]["name"]; ?>
  				</td>
  				<td>
  					<a href="<?php echo $this->Html->url( array("action" => "delete_student_lesson", $l["StudentLesson"]["id"], $this->request->data["Student"]["id"]) ); ?>" class="btn btn-primary">
  						Deletar
  					</a>
  				</td>
  			</tr>
  			<?php endforeach; ?>
  		</tbody>
  	</table>

  	<?php echo $this->Form->create("StudentLesson", array("url" => array("controller" => "students", "action" => "add_student_lesson") ) ); ?>

  	<?php echo $this->Form->input("student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"] ) ); ?>

  	<?php echo $this->Form->input("name"); ?>

  	<?php echo $this->Form->end("Salvar"); ?>
  	
  </div> <!-- #exercicios -->

  <div role="tabpanel" class="tab-pane" id="exercicios">
  	
  	<table class="table">
  		<thead>
  			<tr>
  				<th>
  					Data
  				</th>
  				<th>
  					Enunciado
  				</th>
  				<th>
  					Previsão
  				</th>
  				<th>
  					Resposta
  				</th>
  				<th>
  					Ações
  				</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach($student_exercises as $s_e) : ?>
  			<tr>
  				<td>
  					<?php echo $s_e["StudentExercise"]["date"]; ?>
  				</td>
  				<td>
  					<?php echo $s_e["StudentExercise"]["enunciation"]; ?>
  				</td>
  				<td>
  					<?php echo $s_e["StudentExercise"]["due_to"]; ?>
  				</td>
  				<td>
  					<?php echo $s_e["StudentExercise"]["answer"]; ?>
  				</td>
  				<td>
  					<a href="<?php echo $this->Html->url( array("controller" => "students", "action" => "delete_student_exercise", $s_e["StudentExercise"]["id"], $this->request->data["Student"]["id"]) ); ?>" class="btn btn-default">
  						Deletar
  					</a>
  				</td>
  			</tr>
  			<?php endforeach; ?>
  		</tbody>
  	</table>

  	<?php echo $this->Form->create("StudentExercise", array("url" => array("controller" => "students", "action" => "add_student_exercise") ) ); ?>

  	<?php echo $this->Form->input("student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"]) ); ?>
  	<?php echo $this->Form->input("date", array("label" => "Data do Exercício") ); ?>
  	<?php echo $this->Form->input("due_to", array("label" => "Data de Entrega") ); ?>
  	<?php echo $this->Form->input("student_lesson_id", array("label" => "Matéria", "options" => $o_student_lessons) ); ?>
  	<?php echo $this->Form->input("enunciation", array("label" => "Enunciado") ); ?>

  	<?php echo $this->Form->end("Salvar"); ?>
  	
  </div> <!-- #exercicios -->

</div>

	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Student.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
	</ul>
</div>
