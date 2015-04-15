<div class="row">
    <div class="col-md-12">

          <div class="panel panel-default">
              <div class="panel-heading">

                <div class="col-md-3">
                  <h3 class="panel-title">Gráficos <small>Adicionar</small></h3>
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
        echo $this->Form->input('name');
        $options = array(
            'bar' => 'Barra',
            'column' => 'Coluna',
            'line' => 'Linha',
            'pie' => 'Pizza',
            'doughnut' => 'Donut',
            'stacked_column' => 'Coluna (Stacked)',
        );
        echo $this->Form->input('type', array('label' => 'Tipo', 'options' => $options, 'empty' => 'Selecionar') );
        echo $this->Form->input('input_id', array('label' => 'Tipo de Input', 'empty' => 'Selecionar') );
        echo $this->Form->input('student_id', array('label' => 'Estudante') );
    ?>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Salvar Gráfico</button>
    </div>
<?php echo $this->Form->end(); ?>
</div>

            </div>

        </div>

    </div>
</div>