<?php

    $campos = array();

    foreach($student_inputs as $k => $si) : ?>

        <?php if($si["StudentInput"]["actor"] == strtolower($ac)) : $campos[$ac][] = $si; ?>

            <?php echo $this->Form->input("StudentInputValue." . $k . ".student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"]) ); ?>
            <?php echo $this->Form->input("StudentInputValue." . $k . ".actor", array("type" => "hidden", "value" => strtolower($ac) ) ); ?>
            <?php echo $this->Form->input("StudentInputValue." . $k . ".student_input_id", array("type" => "hidden", "value" => $si["StudentInput"]["id"]) ); ?>

            <label for=""><?php echo $si["StudentInput"]["name"]; ?></label>

            <?php if( $si["Input"]["id"] == $this->Html->getInputId("Calendário") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "calendario", "type" => "text", "value" => date("d/m/Y") ) ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Número") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "numero", "type" => "text" ) ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Intervalo de Tempo") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "time-value", "type" => "hidden") ); ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".config.time_start", array("label" => false, "type" => "time", "interval" => 10, "timeFormat" => "24") ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $k . ".config.time_end", array("label" => false, "type" => "time", "interval" => 10, "timeFormat" => "24") ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Texto") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "ckeditor form-control") ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Texto Privativo") ) : ?>

                <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false) ); ?>

            <?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Escala Numérica") ) : ?>

                <!-- Começo - label -->

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-left">
                                De <?php echo $si["StudentInput"]["config"]["range_start"] ?> a <?php echo $si["StudentInput"]["config"]["range_end"] ?>
                            </th>
                            <th class="text-right">
                                Atual: <span id='<?php echo "ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>'>1</span>
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
                        "value" => 1,
                    ));
                ?>

                <!-- Fim - range -->

            <?php endif; ?>

        <?php endif; ?>

    <?php endforeach; ?>

    <ul class="list-group">
    <!-- Matérias -->
    <?php foreach($student_lessons as $sl) : ?>
        <li class="list-group-item">

            <a class="btn-selecionar-materia" href="javascript:;"><?php echo $sl["StudentLesson"]["name"]; ?></a>

            <div class="toggle hide">
                <?php $sizeof = sizeof($student_inputs) + $i_materias; ?>
                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"]) ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".actor", array("type" => "hidden", "value" => strtolower($ac) ) ); ?>
                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".student_lesson_id", array("type" => "hidden", "value" => $sl["StudentLesson"]["id"]) ); ?>

                <?php echo $this->Form->input("StudentInputValue." . $sizeof . ".value", array("label" => false, "type" => "textarea", "placeholder" => "Observações " . $sl["StudentLesson"]["name"] ) ); ?>
            </div>

        </li>
    <?php $i_materias++; endforeach; ?>
    </ul>

    <?php if(empty($campos[$ac])) : ?>
        <div class="alert alert-info">
            Não há inputs para este ator.
        </div>
    <?php endif; ?>
</div>