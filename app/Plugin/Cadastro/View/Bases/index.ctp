<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Lista de Bases</h3>
                    <hr>


                    <?php if(!empty($bases)) : ?>
                    <div class="listing table-responsive">

                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>Telefone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bases as $basis): ?>
                                <tr>
                                    <td><?php echo h($basis['Basis']['name']); ?></td>
                                    <td><?php echo h($basis['Basis']['city']); ?></td>
                                    <td><?php echo h($basis['Basis']['uf']); ?></td>
                                    <td><?php echo h($basis['Basis']['phone']); ?></td>
                                    <td><a href="<?php echo $this->Html->url( array("action" => "edit", $basis['Basis']['id']) ); ?>"><i class="fa fa-pencil"></i></a> <?php echo $this->Form->postLink(
                                           $this->Html->tag('i', '', array('class' => 'fa fa-trash')),
                                                array('plugin' => 'cadastro', 'controller' => 'bases', 'action' => 'delete', $basis['Basis']['id']),
                                                array('escape'=>false),
                                            __('Você tem certeza que quer apagar este registro? Esta ação é PERMANENTE!'),
                                           array('class' => 'btn btn-mini')
                                        ); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-warning">
                        Não há bases cadastradas.
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>