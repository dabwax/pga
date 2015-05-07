<?php echo $this->Form->create("StudentExercise", array('type' => 'file', "url" => array("controller" => "exercises", "action" => "edit", $s_e['StudentExercise']['id']) ) ); ?>

  <div class="modal-body">

   <?php echo $this->Form->input("student_id", array("type" => "hidden", "value" => $s_e['StudentExercise']['student_id']) ); ?>

    <div class="row">

      <div class="col-xs-6">
        <?php echo $this->Form->input("student_lesson_id", array("label" => "Matéria", "options" => $o_student_lessons, "class" => "form-control", "value" => $s_e['StudentExercise']['student_lesson_id'] ) ); ?>
      </div>

      <div class="col-xs-6">
        <?php echo $this->Form->input("attachment", array("label" => "Anexo", "class" => "", "type" => "file") ); ?>
     </div>

     <div class="clearfix"></div>

      <div class="col-xs-6">
        <?php echo $this->Form->input("date", array("label" => "Data do Exercício", "type" => "text", "class" => "calendario", "value" => $s_e['StudentExercise']['date']) ); ?>

        <?php echo $this->Form->input("enunciation", array("label" => "Enunciado", "class" => "ckeditor", "value" => $s_e['StudentExercise']['enunciation']) ); ?>

        </div>

      <div class="col-xs-6">
        <?php echo $this->Form->input("due_to", array("label" => "Data de Entrega", "type" => "text", "class" => "calendario", "value" => $s_e['StudentExercise']['due_to']) ); ?>

        <?php echo $this->Form->input("observation", array("label" => "Observação", "class" => "form-control", "value" => $s_e['StudentExercise']['observation']) ); ?>
      </div>

     <div class="clearfix"></div>

    </div>




  </div>
  <div class="modal-footer">

    <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Editar Exercício</button>
  </div>

<?php echo $this->Form->end(); ?>