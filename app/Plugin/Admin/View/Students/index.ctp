<div class="row">
    <div class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title pull-left">Estudantes</h3>
                <?php echo $this->Html->link(__('Adicionar Novo Estudante'), array('action' => 'add'), array( "class" => "btn btn-primary pull-right") ); ?>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">

                <table class="table table-bordered table-datatable">
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
                            <?php echo $this->Html->link(__('Visualizar'), array('action' => 'edit', $student['Student']['id']), array("class" => "btn btn-primary btn-xs") ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </tbody>
                    </table>


              </div>
            </div>

    </div>
</div>