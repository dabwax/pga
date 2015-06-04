<div class="row">
    <div class="col-md-12">

            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                              <div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <i class="fa fa-caret-down"></i> Passo 1
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">

                                   <?php echo $this->Form->create('Chart'); ?>
                                        <?php
                                            echo $this->Form->input('id');
                                            echo $this->Form->input('name');
                                            echo $this->Form->input('student_lesson_id', array('label' => 'Matéria', 'options' => $lessons_o, 'empty' => 'Selecionar', 'data-disable-select' => 'true', 'class' => 'form-control select-materia') );
                                            $options = array(
                                                'bar' => 'Barra',
                                                'column' => 'Coluna',
                                                'line' => 'Linha',
                                                'pie' => 'Pizza',
                                                'doughnut' => 'Donut',
                                            );

                                            if($this->request->data['Chart']['type'] == "num_absoluto") {
                                                $options['num_absoluto'] = 'Número Absoluto';
                                                $options2 = array(
                                                    'media' => 'Total COM média',
                                                    'total' => 'Total SEM média',
                                                    'nota' => 'Nota',
                                                );
                                            } else {
                                                $options2 = array(

                                                );
                                            }
                                            echo $this->Form->input('type', array('label' => 'Tipo', 'options' => $options, 'empty' => 'Selecionar') );
                                            echo $this->Form->input('sub_type', array('label' => 'Sub-Tipo', 'options' => $options2, 'empty' => 'Selecionar') );
                                            echo $this->Form->input('input_id', array('label' => 'Tipo de Input', 'empty' => 'Selecionar') );

                                        ?>
                                            <?php echo $this->Form->input("columns", array('label' => 'Colunas', 'type' => 'select', 'options' => array(3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 12 =>  12)  ) ); ?>
                                            <?php echo $this->Form->input("order", array('label' => 'Ordem', 'class' => 'form-control', 'type' => 'text' ) ); ?>
                                            <?php echo $this->Form->input("height", array('label' => 'Altura (em pixels)', 'class' => 'form-control', 'type' => 'text' ) ); ?>

                                            <?php
                                                if($this->request->data['Chart']['type'] == 'line') {
                                                    echo $this->Form->input("display_mode", array('label' => 'Modo de Visualização', 'type' => 'select', 'options' => array('mes_a_mes' => 'Mês a mês', 'dia_a_dia' => 'Dia a dia'), ) );
                                                }
                                            ?>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Alterar Gráfico</button>
                                        </div>
                                    <?php echo $this->Form->end(); ?>

                                   </div>
                                </div>

                              </div> <!-- .panel -->

                              <div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <i class="fa fa-caret-down"></i> Passo 2
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">


                                    <?php echo $this->Form->create("ChartStudentInput", array('class' => 'form-validar', 'url' => array('controller' => 'charts', 'action' => 'add_input', $this->request->data['Chart']['id'] ) ) ); ?>
                                    <?php echo $this->Form->input("chart_id", array('type' => 'hidden', 'value' => $this->request->data['Chart']['id'] ) ); ?>
                                    <?php echo $this->Form->input("student_id", array('type' => 'hidden', 'value' => $this->request->data['Chart']['student_id'] ) ); ?>

                                    <div class="form-group">
                                        <?php echo $this->Form->input("student_input_id", array('label' => 'Campo', 'type' => 'select', 'options' => $student_inputs, 'empty' => 'Selecionar', 'class' => 'required') ); ?>
                                    </div> <!-- .form-group -->

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Concluir Edição</button>
                                    </div>

                                    <?php echo $this->Form->end(); ?>

                                    <table class="table table-datatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Input
                                                </th>
                                                <th>
                                                    Ator
                                                </th>
                                                <th>
                                                    Ações
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($chart_student_inputs as $csi) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $csi['StudentInput']['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo ucfirst($csi['StudentInput']['actor']); ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $this->Html->url(array('action' => 'delete_input', $csi['ChartStudentInput']['id'], $this->request->data['Chart']['id'])); ?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Você tem certeza disto? Esta ação é PERMANENTE!')) { return false; }">Deletar</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>



                                    </div>
                                </div>

                              </div> <!-- .panel -->

                        </div> <!-- .panel-group -->


                    </div> <!-- .col-md-6 -->

                </div> <!-- .row -->


        </div>

    </div>
</div>

<style type="text/css">
    body {
        padding-top: 0px !important;
    }
</style>