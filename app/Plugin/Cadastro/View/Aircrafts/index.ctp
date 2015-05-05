<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Lista de Aeronaves</h3>
                    <hr>
                    <?php if(!empty($aircrafts)) : ?>
                    <div class="listing table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('aircraft_model_id', 'Modelo'); ?></th>
                                    <th><?php echo $this->Paginator->sort('registration', 'Matrícula'); ?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($aircrafts as $aircraft): ?>
                                <tr>
                                    <td><?php echo h($aircraft['AircraftModel']['model']); ?></td>
                                    <td><?php echo h($aircraft['Aircraft']['registration']); ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url( array("action" => "edit", $aircraft['Aircraft']['id']) ); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php echo $this->Form->postLink(
                                           $this->Html->tag('i', '', array('class' => 'fa fa-trash')),
                                                array('plugin' => 'cadastro', 'controller' => 'aircrafts', 'action' => 'delete', $aircraft['Aircraft']['id']),
                                                array('escape'=>false),
                                            __('Você tem certeza que quer apagar este registro? Esta ação é PERMANENTE!'),
                                           array('class' => 'btn btn-mini')
                                        ); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="aligncenter">
                    </div>
                    <?php else: ?>
                <div class="alert alert-warning">
                    Não há aeronaves cadastradas.
                </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>