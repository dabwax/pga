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