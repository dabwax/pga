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