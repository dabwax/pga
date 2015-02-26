<div role="tabpanel" class="tab-pane" id="exercicios">


    <div class="row">
      <div class="col-md-6">

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
            Ações
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($student_exercises as $s_e) : ?>
        <tr>
          <td>
            <span class="label label-default"><?php echo $s_e["StudentExercise"]["date"]; ?></span>

          </td>
          <td>
            <?php echo $s_e["StudentExercise"]["enunciation"]; ?>
          </td>
          <td>
            <span class="label label-default"><?php echo $s_e["StudentExercise"]["due_to"]; ?></span>
          </td>
          <td>
            <a href="<?php echo $this->Html->url( array("controller" => "students", "action" => "delete_student_exercise", $s_e["StudentExercise"]["id"], $this->request->data["Student"]["id"]) ); ?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Você tem certeza disto? Esta ação é PERMANENTE!')) { return false; }">
              <i class="fa fa-trash"></i>
            </a>
            <a title="Ver Resposta" href="javascript:;" data-toggle="modal" data-target="#modalResposta<?php echo $s_e['StudentExercise']['id']; ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-eye"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

      </div>

      <div class="col-md-6">

        <?php echo $this->Form->create("StudentExercise", array("url" => array("controller" => "students", "action" => "add_student_exercise") ) ); ?>

       <?php echo $this->Form->input("student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"]) ); ?>

        <div class="row">

          <div class="col-md-12">
            <?php echo $this->Form->input("student_lesson_id", array("label" => "Matéria", "options" => $o_student_lessons, "class" => "form-control") ); ?>
          </div>

          <div class="col-md-6">
            <?php echo $this->Form->input("date", array("label" => "Data do Exercício", "type" => "text", "class" => "calendario") ); ?>

            <?php echo $this->Form->input("enunciation", array("label" => "Enunciado", "class" => "ckeditor") ); ?>

            </div>

          <div class="col-md-6">
            <?php echo $this->Form->input("due_to", array("label" => "Data de Entrega", "type" => "text", "class" => "calendario") ); ?>

            <?php echo $this->Form->input("observation", array("label" => "Observação", "class" => "") ); ?>
          </div>

          <div class="col-md-12">

            <button type="submit" class="btn btn-success btn-block">Salvar Exercício</button>
          </div>
        </div>

    <?php echo $this->Form->end(); ?>

      </div>
    </div>

  </div> <!-- #exercicios -->


<?php foreach($student_exercises as $s_e) : ?>
  <!-- Modal -->
<div class="modal fade" id="modalResposta<?php echo $s_e['StudentExercise']['id']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" style="font-weight: bold;" id="myModalLabel">Resposta do Aluno para: <?php echo $s_e['StudentExercise']['enunciation']; ?></h4>
      </div>
      <div class="modal-body">
        <strong>Resposta</strong>
        <br>
        <?php echo (!empty($s_e['StudentExercise']['answer'])) ? $s_e['StudentExercise']['answer'] : 'Indisponível'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>