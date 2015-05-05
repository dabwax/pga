<section id="warnings">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Lista de Tripulantes</h3>
                    <hr>

                    <?php if(!empty($staffs)) : ?>
                    <div class="listing table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                                    <th><?php echo $this->Paginator->sort('Role.name', 'Cargo'); ?></th>
                                    <th>Licença</th>
                                    <th>CANAC</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($staffs as $staff): ?>
                                <tr class="">
                                    <td><?php echo h($staff['Staff']['name']); ?></td>
                                    <td><?php $last_role = end($staff['StaffRole']); echo $last_role['Role']['name']; ?></td>
                                    <td><?php echo h($staff['Staff']['license']); ?></td>
                                    <td><?php echo h($staff['Staff']['canac']); ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url( array("action" => "edit", $staff['Staff']['id']) ); ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-pencil"></i> Editar
                                        </a>
                                        <a target="_blank" href="<?php echo $this->Html->url( array("plugin" => "exportacao", "controller" => "designacao", "action" => "index", $staff['Staff']['id'], 'view') ); ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-pencil"></i> Designações
                                        </a>
                                        <?php echo $this->Form->postLink(
                                           $this->Html->tag('i', '', array('class' => 'fa fa-trash')) . ' Remover',
                                                array('plugin' => 'cadastro', 'controller' => 'staffs', 'action' => 'delete', $staff['Staff']['id']),
                                                array('escape'=>false, 'class' => 'btn btn-xs btn-default'),
                                            __('Você tem certeza que quer apagar este registro? Esta ação é PERMANENTE!'),
                                           array('class' => 'btn btn-mini')
                                        ); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                <div class="alert alert-warning">
                    Não há tripulantes cadastrados.
                </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>