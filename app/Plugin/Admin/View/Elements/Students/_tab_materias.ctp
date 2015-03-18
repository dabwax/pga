<div role="tabpanel" class="tab-pane" id="materias">

    <div class="row">

        <div class="col-md-3">

            <?php echo $this->Form->create("StudentLesson", array("url" => array("controller" => "students", "action" => "add_student_lesson") ) ); ?>

            <?php echo $this->Form->input("student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"] ) ); ?>

            <?php echo $this->Form->input("name"); ?>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Salvar Disciplina</button>
            </div>

            <?php echo $this->Form->end(); ?>

        </div>

        <div class="col-md-9">

            <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Disciplinas
                            </th>
                            <th class="text-right">

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
                                <a href="<?php echo $this->Html->url( array("action" => "delete_student_lesson", $l["StudentLesson"]["id"], $this->request->data["Student"]["id"]) ); ?>" class="btn btn-danger btn-xs pull-right"  onclick="if(!confirm('Você tem certeza disto? Esta ação é PERMANENTE!')) { return false; }">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
    </div>

</div> <!-- #exercicios -->