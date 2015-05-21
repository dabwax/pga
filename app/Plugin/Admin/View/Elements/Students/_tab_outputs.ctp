<?php if(!empty($houve_criacao)) : ?>
<script type="text/javascript">
    $(document).ready(function() {

        $(".btn-editar-<?php echo $houve_criacao; ?>").click();
    });
</script>
<?php endif; ?>

<div role="tabpanel" class="tab-pane" id="outputs">
    <div class="tab-content">


          <div class="row">

                <div class="col-md-3">

                    <?php echo $this->Form->create("Chart", array('url' => array('controller' => 'charts', 'action' => 'add') ) ); ?>

                    <?php echo $this->Form->input("name", array('label' => 'Nome') ); ?>
                    <?php echo $this->Form->input('input_id', array('label' => 'Tipo de Input', 'options' => $inputs_o, 'empty' => 'Selecionar', 'data-disable-select' => 'true', 'class' => 'form-control select-tipo-de-input') ); ?>
                    <?php
                        $options = array(
                            'bar' => 'Barra',
                            'column' => 'Coluna',
                            'line' => 'Linha',
                            'pie' => 'Pizza',
                            'doughnut' => 'Donut',
                            'num_absoluto' => 'Número Absoluto',
                        );
                        echo $this->Form->input('type', array('label' => 'Gráfico', 'options' => $options, 'empty' => 'Selecionar', 'data-disable-select' => 'true', 'class' => 'form-control select-tipo-grafico') ); ?>
                      <?php echo $this->Form->input("student_id", array('type' => 'hidden', 'value' => $this->request->data['Student']['id']) ); ?>
                      <?php echo $this->Form->input("columns", array('label' => 'Colunas', 'type' => 'select', 'options' => array(3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 12 =>  12)  ) ); ?>
                      <?php echo $this->Form->input("order", array('label' => 'Ordem', 'value' => 0, 'class' => 'form-control', 'type' => 'text' ) ); ?>
                      <?php echo $this->Form->input("height", array('label' => 'Altura (em pixels)', 'class' => 'form-control', 'type' => 'text', 'value' => 300 ) ); ?>

                          <button type="submit" class="btn btn-default btn-incluir-input btn-block" style="margin-top: 20px;">
                            <i class="fa fa-plus-square"></i> Criar Gráfico
                          </button>

                        <?php echo $this->Form->end(); ?>

                </div>

              <div class="col-md-9">

                <table class="table table-datatable">
                        <thead>
                        <tr>
                                <th>Ordem</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Pode dar problema?</th>
                                <th>Data de Inserção</th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($charts as $chart): ?>
                        <tr>
                            <td><?php echo h($chart['Chart']['order']); ?>&nbsp;</td>
                            <td><?php echo h($chart['Chart']['name']); ?>&nbsp;</td>
                            <td><?php echo $this->Html->formatChartType($chart['Chart']['type']); ?>&nbsp;</td>
                            <td><?php 
                            $vai_dar_merda = false;

                                if($chart['Chart']['type'] == 'bar' && $chart['Chart']['input_id']  == 2) {
                                    $vai_dar_merda = true;
                                }
                             ?>

                             <?php if($vai_dar_merda) : ?>
                             <span class="label label-warning">
                                 <i class="fa fa-exclamation-triangle"></i>
                             </span>
                         <?php else: ?>
                     <?php endif; ?>
                         </td>
                            <td><?php $datetime = new DateTime($chart['Chart']['created']); echo $datetime->format("d/m/Y"); ?>&nbsp;</td>
                            <td class="actions">
                                <a href="<?php echo $this->Html->url(array('controller' => 'charts', 'action' => 'edit', $chart['Chart']['id'] )); ?>" class="btn btn-default btn-editar-<?php echo $chart['Chart']['id']; ?> fancybox">
                                    <i class="fa fa-pencil"></i> Editar
                                </a>
                                <a href="<?php echo $this->Html->url(array('controller' => 'charts', 'action' => 'view', $chart['Chart']['id'] )); ?>" class="btn btn-primary fancybox">
                                    <i class="fa fa-eye"></i> Visualizar
                                </a>
                                <a href="<?php echo $this->Html->url(array('controller' => 'charts', 'action' => 'delete', $chart['Chart']['id'] )); ?>" onclick="if(!confirm('Você tem certeza disto? Esta ação é PERMANENTE!')){ return false; }" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Deletar
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