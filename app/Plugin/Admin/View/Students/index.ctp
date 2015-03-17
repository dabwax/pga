<div class="row">
    <div class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading">

                <div class="col-md-3">
                  <h3 class="panel-title">Estudantes <small>Listar</small></h3>
                </div>

                <div class="col-md-9">
                    <?php echo $this->Html->link(__('Adicionar Novo Estudante'), array('action' => 'add'), array( "class" => "btn btn-primary pull-right") ); ?>
                </div>

                <div class="clearfix"></div>
            </div>
              <div class="panel-body">

                    <table class="table table-datatable">
                    <thead>
                    <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Escola</th>
                            <th>Condição Clínica</th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
                        <td><?php echo h($student['Student']['name']); ?>&nbsp;</td>
                        <td><?php echo h($student['Student']['school']); ?>&nbsp;</td>
                        <td><?php echo h($student['Student']['clinical_condition']); ?>&nbsp;</td>
                        <td class="actions">
                            <a href="<?php echo $this->Html->url( array('action' => 'edit', $student['Student']['id']) ); ?>" class="btn btn-default">
                                <i class="fa fa-eye"></i> Visualizar
                            </a>

                            <a href="<?php echo $this->Html->url( array('action' => 'delete', $student['Student']['id']) ); ?>" class="btn btn-danger btn-excluir-aluno-confirmacao" data-name="<?php echo strtoupper($student['Student']['name']); ?>">
                                <i class="fa fa-trash"></i> Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </tbody>
                    </table>


              </div>
            </div>

    </div>
</div>