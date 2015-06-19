<div role="tabpanel" class="tab-pane" id="inputs">

    <!--<ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#criar-input" role="tab" data-toggle="tab">Criar novo registro</a></li>
        <li role="presentation"><a href="#arquivo-input" role="tab" data-toggle="tab">Arquivo</a></li>
    </ul>-->

<div class="tab-content">

    <div id="criar-input" class="tab-pane">

        <div class="row">
            <?php $i_materias = 1; foreach($atores as $ac) : ?>
            <div class="col-md-6">
                    <h3><span class="label label-default"><?php echo $ac; ?></span></h3>

                <?php echo $this->Form->create("StudentInputValue", array("url" => array("controller" => "students", "action" => "add_student_input_value") ) ); ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->Form->input("StudentInputValue.date", array("type" => "text", "class" => "calendario", "value" => date("d/m/Y")) ); ?>
                    </div>

                    <div class="col-md-12">
                        <?php echo $this->element("Students/_tab_inputs_campos", array("ac" => $ac, "i_materias" => $i_materias) ); ?>
                    </div>
                </div>

            <?php endforeach; ?>

            <button type="submit" class="btn btn-success">Salvar Registro</button>

            <?php echo $this->Form->end(); ?>


        </div> <!-- .row -->
    </div>

    <div id="arquivo-input" class="tab-pane active">


        <div class="row">
            <?php echo $this->Form->create("Input", array("url" => array("controller" => "exportacao", "action" => "input") ) ); ?>
            <?php echo $this->Form->input("student_id", array("type" => "hidden", "value" => $this->request->data['Student']['id'] ) ); ?>

            <div class="col-md-6">

                <div class="row">

                <div class="col-md-12">
                    <h4>Exportação</h4>
                    <?php $options = array('tutor' => 'Tutor', 'pais' => 'Pais', 'psiquiatra' => 'Terapeuta', 'mediador' => 'Mediador', 'coordenador' => 'Coordenador'); ?>
                    <?php echo $this->Form->input("actor", array("label" => "Atores (opcional)", 'multiple' => true, 'class' => 'form-control', "type" => "select", 'empty' => 'Selecionar', "options" => $options)); ?>
                    <?php $formatos = array('Excel5' => 'Excel', 'CSV' => 'CSV'); echo $this->Form->input("formato", array("label" => "Formato", 'options' => $formatos)); ?>

                </div>
                <div class="col-md-6">
                    <?php echo $this->Form->input("date_start", array("label" => "Data Inicial a ser Exportado", "class" => "calendario")); ?>
                </div>

                <div class="col-md-6">
                     <?php echo $this->Form->input("date_end", array("label" => "Data Final a ser Exportado", "class" => "calendario")); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $this->Form->input("student_input_id", array("label" => "Filtro: Inputs (opcional)", 'options' => $options_inputs, "multiple" => true)); ?>
                </div>

                <div class="col-md-6">
                     <?php echo $this->Form->input("student_lesson_id", array("label" => "Filtro: Matérias (opcional)", 'options' => $options_lessons, "multiple" => true)); ?>
                     </div>

                <div class="col-md-12 text-center">
                    <small class="text-center" style="font-style: italic;">Obs.: Se não for preenchido nenhum campo, será exportado todos os inputs.</small>

                    <button type="submit" class="btn btn-success btn-block">Exportar Dados</button>
                </div>

                </div>

            </div>

                <div class="col-md-6">

                    <div class="row">

                        <h4>Recentes</h4>

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
                                    <td colspan="3" style="background: #F2F1EF; color: #ABB7B7; font-weight: bold; text-align: left;">
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
                                        <?php echo (!empty($_a["StudentInput"]["name"])) ? $_a["StudentInput"]["name"] : "Matéria: " . $_a["StudentLesson"]["name"]; ?>
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


                    </div>

                </div>

            <?php echo $this->Form->end(); ?>
        </div>

    </div> <!-- #arquivo-input -->

    </div> <!-- .tab-content -->

</div> <!-- #inputs -->