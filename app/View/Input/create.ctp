<div class="titulo-tab" style="height: 54px;">
    <div class="btn-group" style="text-align: right;">
        <a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-info">Criar Novo Registro</a>
        <a href="<?php echo $this->Html->url( array("action" => "archive") ); ?>" class="btn btn-default btn-arquivo-input">Arquivo</a>
    </div>
    <div class="clearfix"></div>
</div>


<?php if(!$has_input) : ?>
<div class="row">
<?php echo $this->Form->create("StudentInputValue", array("url" => array("controller" => "input", "action" => "add_student_input_value") ) ); ?>

    <div class="col-md-6">

    <?php echo $this->Form->input("StudentInputValue.date", array("type" => "text", "class" => "calendario", "value" => date("d/m/Y"), "label" => "Data da Aula") ); ?>

    <?php

    $campos = array();

    foreach($student_inputs as $k => $si) : ?>

        <?php if($si["StudentInput"]["actor"] == strtolower($actor)) : $campos[$actor][] = $si; ?>

            <?php echo $this->Form->input("StudentInputValue." . $k . ".student_id", array("type" => "hidden", "value" => $student_id) ); ?>
            <?php echo $this->Form->input("StudentInputValue." . $k . ".actor", array("type" => "hidden", "value" => strtolower($actor) ) ); ?>
            <?php echo $this->Form->input("StudentInputValue." . $k . ".student_input_id", array("type" => "hidden", "value" => $si["StudentInput"]["id"]) ); ?>

            <label for=""><?php echo $si["StudentInput"]["name"]; ?></label>

            <?php if( $si["Input"]["id"] == $this->Html->getInputId("Calendário") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "calendario", "type" => "text", "value" => date("d/m/Y") ) ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Número") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".type", array("type" => "hidden", "value" => "numerico" ) ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "numero", "type" => "text" ) ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Intervalo de Tempo") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "time-value", "type" => "hidden") ); ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".config.time_start", array("label" => false, "type" => "time", "interval" => 10, "timeFormat" => "24") ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $k . ".config.time_end", array("label" => false, "type" => "time", "interval" => 10, "timeFormat" => "24") ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Texto") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".type", array("type" => "hidden", "value" => "texto" ) ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "ckeditor", "div" => array("style" => "margin-bottom: 0px;") ) ); ?>


                <div class="clearfix"></div>
                
                <a href="<?php echo $this->Html->url( array('controller' => 'hashtags', 'action' => 'lightbox', $student_id, $k) ); ?>" class="btn btn-default btn-iframe disable-ajax">#</a>

                <div class="clearfix"></div>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Texto Privativo") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false) ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Escala Numérica") ) : ?>

                <!-- Começo - label -->

                <table class="table table-intervalo">
                    <thead>
                        <tr>
                            <th class="text-left">
                                De <?php echo $si["StudentInput"]["config"]["range_start"] ?> a <?php echo $si["StudentInput"]["config"]["range_end"] ?>
                            </th>
                            <th class="text-right">
                                Atual: <span id='<?php echo "ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>' class="fwb">1</span>
                            </th>
                        </tr>
                    </thead>
                </table>

                <!-- Fim - label -->

                <!-- Começo - range -->

                <div class="range-slider" data-min="<?php echo $si["StudentInput"]["config"]["range_start"]; ?>" data-max="<?php echo $si["StudentInput"]["config"]["range_end"]; ?>" data-input="<?php echo "#CampoEscalaNumerica" . $si["StudentInput"]["id"]; ?>" data-resultado="<?php echo "#ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>"></div>

                <?php
                    echo $this->Form->input("StudentInputValue." . $k . ".value", array(
                        "label" => false,
                        "type" => "hidden",
                        "id" => "CampoEscalaNumerica" . $si["StudentInput"]["id"],
                        "value" => 1,
                    ));
                ?>

                <!-- Fim - range -->

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Escala Texto") ) : ?>

                <!-- Começo - label -->

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-left">
                                <?php foreach($si["StudentInput"]["config"] as $k_config => $c) : ?>
                                    <?php echo $c["name"]; ?> <?php echo ($k_config != sizeof($si["StudentInput"]["config"])) ? "/" : ""; ?>
                                <?php endforeach; ?>
                            </th>
                            <th class="text-right">
                                Atual: <span id='<?php echo "ResultadoEscalaTexto" . $si["StudentInput"]["id"]; ?>'><?php echo $si["StudentInput"]["config"][1]["name"]; ?></span>
                            </th>
                        </tr>
                    </thead>
                </table>

                <!-- Fim - label -->

                <!-- Começo - range -->

                <div class="range-texto-slider" data-min="1" data-max="<?php echo sizeof($si["StudentInput"]["config"]); ?>" data-config='<?php echo json_encode($si["StudentInput"]["config"]); ?>' data-input="<?php echo "#CampoEscalaTexto" . $si["StudentInput"]["id"]; ?>" data-resultado="<?php echo "#ResultadoEscalaTexto" . $si["StudentInput"]["id"]; ?>"></div>

                <?php
                    echo $this->Form->input("StudentInputValue." . $k . ".value", array(
                        "label" => false,
                        "type" => "hidden",
                        "id" => "CampoEscalaTexto" . $si["StudentInput"]["id"],
                        "value" => $si["StudentInput"]["config"][1]['name'],
                    ));
                ?>

                <!-- Fim - range -->

            <?php endif; ?>

        <?php endif; ?>

    <?php endforeach; ?>

    <?php if(empty($campos[$actor])) : ?>
        <div class="alert alert-info">
            Não há inputs para este ator.
        </div>
    <?php endif; ?>


</div>

<div class="col-md-6">

    <label style="margin-top: 14px;">Matérias</label>
    <ul class="list-group" style="margin-top: 0px;">
    <!-- Matérias -->
    <?php $i_materias = 0; foreach($student_lessons as $sl) : ?>
        <li class="list-group-item">

            <input type="checkbox" class="checkbox-materia" />
            <a class="btn-selecionar-materia" href="javascript:;"><?php echo $sl["StudentLesson"]["name"]; ?></a>

            <div class="toggle hide">
                <?php $sizeof = sizeof($student_inputs) + $i_materias; ?>
                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".student_id", array("type" => "hidden", "value" => AuthComponent::user("Student.Student.id")) ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".actor", array("type" => "hidden", "value" => strtolower($actor) ) ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".student_lesson_id", array("type" => "hidden", "value" => $sl["StudentLesson"]["id"]) ); ?>

                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".value", array("label" => false, "type" => "textarea", "class" => "ckeditor", "placeholder" => "Observações " . $sl["StudentLesson"]["name"] ) ); ?>

                <div class="col-md-12 text-center">
                    <label for="">Teste</label>

                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_1", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Esperada" ) ); ?>
                        </div>
                        <div class="col-md-6">
                        <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_2", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Alcançada") ); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <label for="">Prova</label>

                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_3", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Esperada" ) ); ?>
                        </div>
                        <div class="col-md-6">
                        <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_4", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Alcançada") ); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <label for="">Trabalho</label>

                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_5", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Esperada" ) ); ?>
                        </div>
                        <div class="col-md-6">
                        <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_6", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Alcançada") ); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <label for="">Nota Bimestral</label>

                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_7", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Esperada" ) ); ?>
                        </div>
                        <div class="col-md-6">
                        <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".nota_8", array("label" => false, "type" => "text", "class" => "form-control", "div" => "form-group", "placeholder" => "Alcançada") ); ?>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

        </li>
    <?php $i_materias++; endforeach; ?>
    </ul>
</div>

<div class="clearfix"></div>

<div class="col-md-12">

<button type="submit" class="btn btn-success btn-block btn-enviar-inputs"><i class="fa fa-paper-plane"></i> Enviar Inputs</button>
</div>
<?php echo $this->Form->end(); ?>

</div>
<?php else : ?>
    <div class="alert alert-info">Você já inseriu input para a aula de hoje.</div>
<?php endif; ?>