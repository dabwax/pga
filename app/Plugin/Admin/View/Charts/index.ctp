<div class="row">
    <div class="col-md-12">

          <div class="panel panel-default">
              <div class="panel-heading">

                <div class="col-md-3">
                  <h3 class="panel-title">Gráficos <small>Listar</small></h3>
                </div>

                <div class="col-md-9">
                    <?php echo $this->Html->link(__('Adicionar Novo Gráfico'), array('action' => 'add'), array( "class" => "btn btn-primary pull-right") ); ?>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="panel-body">

                    <table class="table table-datatable">
                        <thead>
                        <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Estudante</th>
                                <th>Data de Inserção</th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($charts as $chart): ?>
                        <tr>
                            <td><?php echo h($chart['Chart']['id']); ?>&nbsp;</td>
                            <td><?php echo h($chart['Chart']['name']); ?>&nbsp;</td>
                            <td><?php echo h($chart['Chart']['type']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($chart['Student']['name'], array('controller' => 'students', 'action' => 'view', $chart['Student']['id'])); ?>
                            </td>
                            <td><?php $datetime = new DateTime($chart['Chart']['created']); echo $datetime->format("d/m/Y"); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $chart['Chart']['id']), array('class' => 'btn btn-primary') ); ?>
                                <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $chart['Chart']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $chart['Chart']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        </tbody>
                        </table>

            </div>

        </div>

    </div>
</div>