<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Lista de Cargos</h3>
                    <hr>


                    <div class="listing table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                        <thead>
                        <tr>
                                <th>Nome</th>
                                <th>Obrigatório Modelo de Aeronave?</th>
                                <th>Obrigatório Base?</th>
                                <th>Valor/H de Treinamento</th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($roles as $role): ?>
                        <tr>
                            <td><?php echo h($role['Role']['name']); ?>&nbsp;</td>
                            <td><?php echo ($role['Role']['aircraft_model'] == 1) ? "<label class='label label-success'>Sim</label>" : '<label class="label label-danger">Não</label>'; ?>&nbsp;</td>
                            <td><?php echo ($role['Role']['base'] == 1) ? "<label class='label label-success'>Sim</label>" : '<label class="label label-danger">Não</label>'; ?>&nbsp;</td>
                            <td><?php echo number_format($role['Role']['training_hour'],1,",",""); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $role['Role']['id']), array('class' => 'btn btn-default') ); ?>
                                <?php echo $this->Form->postLink(__('Deletar'), array('plugin' => 'cadastro', 'controller' => 'roles', 'action' => 'delete', $role['Role']['id']), array('class' => 'btn btn-default'), __('Você tem certeza que quer remover este registro? Esta ação é PERMANENTE e pode afetar outras regiões do SIGTRIP!', $role['Role']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>