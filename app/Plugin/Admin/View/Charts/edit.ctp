<div class="row">
    <div class="col-md-12">

          <div class="panel panel-default">
              <div class="panel-heading">

                <div class="col-md-3">
                  <h3 class="panel-title">Gráficos <small>Editar</small></h3>
                </div>

                <div class="col-md-9">
                    <?php echo $this->Html->link(__('Voltar'), array('action' => 'index'), array( "class" => "btn btn-primary pull-right") ); ?>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="panel-body">

<div class="charts form">
<?php echo $this->Form->create('Chart'); ?>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        $options = array(
            'bar' => 'Barra',
            'column' => 'Coluna',
            'line' => 'Linha',
            'pie' => 'Pizza',
            'donut' => 'Donut',
            'stacked_column' => 'Coluna (Stacked)',
        );
        echo $this->Form->input('type', array('label' => 'Tipo', 'options' => $options, 'empty' => 'Selecionar') );
        echo $this->Form->input('student_id', array('label' => 'Estudante') );
    ?>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Salvar Gráfico</button>
    </div>
<?php echo $this->Form->end(); ?>
</div>

                <h3>Inputs</h3>

                <?php echo $this->Form->create("ChartStudentInput", array('url' => array('controller' => 'charts', 'action' => 'add_input', $this->request->data['Chart']['id'] ) ) ); ?>
                <?php echo $this->Form->input("chart_id", array('type' => 'hidden', 'value' => $this->request->data['Chart']['id'] ) ); ?>

                <div class="form-group">
                    <?php echo $this->Form->input("student_input_id", array('label' => 'Campo', 'type' => 'select', 'options' => $student_inputs, 'empty' => 'Selecionar' ) ); ?>
                </div> <!-- .form-group -->

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Adicionar Campo</button>
                </div>

                <?php echo $this->Form->end(); ?>

                <table class="table table-datatable">
                    <thead>
                        <tr>
                            <th>
                                Input
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
                                <a href="<?php echo $this->Html->url(array('action' => 'delete_input', $csi['ChartStudentInput']['id'], $this->request->data['Chart']['id'])); ?>" class="btn btn-danger" onclick="if(!confirm('Você tem certeza disto? Esta ação é PERMANENTE!')) { return false; }">Deletar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>