<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Lista de Modelos de Aeronaves</h3>
                    <hr>
                    <?php if(!empty($aircraft_models)) : ?>
                    <div class="listing table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                                    <th><?php echo $this->Paginator->sort('model', 'Modelo'); ?></th>
                                    <th><?php echo $this->Paginator->sort('class', 'Classe'); ?></th>
                                    <th><?php echo $this->Paginator->sort('size', 'Porte'); ?></th>
                                    <th><?php echo $this->Paginator->sort('motor', 'Motorização'); ?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($aircraft_models as $m): ?>
                                <tr>
                                    <td><?php echo h($m['AircraftModel']['name']); ?></td>
                                    <td><?php echo h($m['AircraftModel']['model']); ?></td>
                                    <td><?php echo h($m['AircraftModel']['class']); ?></td>
                                    <td><?php echo h($m['AircraftModel']['size']); ?></td>
                                    <td><?php echo h($m['AircraftModel']['motor']); ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url( array("action" => "edit", $m['AircraftModel']['id']) ); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php echo $this->Form->postLink(
                                           $this->Html->tag('i', '', array('class' => 'fa fa-trash')),
                                                array('plugin' => 'cadastro', 'controller' => 'aircraft_models', 'action' => 'delete', $m['AircraftModel']['id']),
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
                        <?php
                            echo $this->Paginator->numbers(array('separator' => ''));
                        ?>
                    </div>
                    <?php else: ?>
                <div class="alert alert-warning">
                    Não há modelos de aeronaves cadastradas.
                </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>