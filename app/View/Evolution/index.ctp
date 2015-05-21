<div class="col-md-8 pull-right text-right" style="margin-right: 0px; padding-right: 0px;">

    <?php echo $this->Form->create("Search", array('class' => 'form-pesquisar hide col-md-6', 'url' => array('controller' => 'search', 'action' => 'evolution_index') ) ); ?>

    <div class="col-md-5" style="padding: 0px;">
        <?php echo $this->Form->input("date_start", array('label' => false, 'div' => false, 'placeholder' => 'Data Inicial', 'class' => 'form-control calendario', 'value' => $date_start->format("d/m/Y") ) ); ?>
    </div>

    <div class="col-md-5" style="padding: 0px;">
        <?php echo $this->Form->input("date_finish", array('label' => false, 'div' => false, 'placeholder' => 'Data Final', 'class' => 'form-control calendario', 'value' => $date_finish->format("d/m/Y") ) ); ?>
    </div>

    <div class="col-md-1 text-right" style="padding: 0px;">
        <button href="#" class="btn btn-default btn-enviar-calendario"><i class="fa fa-check-square"></i></button>
    </div>

    <?php echo $this->Form->end(); ?>

    <a href="#" class="btn btn-default btn-pesquisar" data-target="calendario"><i class="fa fa-calendar"></i></a>
    <a href="<?php echo $this->Html->url( array('controller' => 'search', 'action' => 'clear', 'evolucao') ); ?>" class="btn btn-default btn-limpar-busca disable-ajax">Limpar Busca</a>
    <a href="<?php echo $this->Html->url( array('controller' => 'evolution', 'action' => 'export', AuthComponent::user('Student.Student.id'), $date_start->format('Y_m_d'), $date_finish->format('Y_m_d') ) ); ?>" target="_blank" class="btn btn-default disable-ajax">Relatório</a>

</div>

<div class="row">
    <?php foreach($charts as $c) : ?>
        <div class="col-md-<?php echo $c['Chart']['columns']; ?>">
    
            <!-- Se for gráfico de nota -->
            <?php if($c['Chart']['sub_type'] == "nota") : ?>
                <div class="grafico" style="width: 100%;">
            <!-- Se for um gráfico comum -->
            <?php else: ?>
                <div class="grafico" style="height: <?php echo $c['Chart']['height']; ?>px; width: 100%;">
             <?php endif; ?>

                <div id="grafico<?php echo $c['Chart']['id']; ?>" class="<?php echo $c['Chart']['type']; ?>" style="width: 100%;">
                    <?php echo $this->element("grafico_nota", array('c' => $c) ); ?>
                </div>
            </div> <!-- .grafico -->
        </div>
    <?php endforeach; ?>
</div>

<?php foreach($charts as $c) : ?>
<?php if($c['Chart']['type'] == "line") : ?>

<script type="text/javascript">
    $(document).ready(function() {

        <?php
            $config = $this->Html->prepareLineChart($c);

            $config = str_replace('"x":"new', '"x":new', $config);
            $config = str_replace('01)"', '01)', $config);
        ?>

    var config = <?php echo $config; ?>;
    var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", config);
    chart<?php echo $c['Chart']['id']; ?>.render();

    });
</script>

<?php endif; ?>
<?php endforeach; ?>

<script type="text/javascript">
$(document).ready(function() {

    // Itera todos os gráficos
    <?php foreach($charts as $c) : ?>

            // Se existir configuração para o gráfico
            <?php if(!empty($c['config']) && $c['Chart']['type'] != "line") : ?>
                 // Instancia o CanvasJS
                var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);
            <?php endif; ?>

             // Se não for um gráfico de número absoluto, é renderizado o CanvasJS
            <?php if(!empty($c['config']) && $c['Chart']['type'] != "num_absoluto" && $c['Chart']['type'] != "line" ) : ?>
                chart<?php echo $c['Chart']['id']; ?>.render();
            <?php endif; ?>
    <?php endforeach; ?>
});
</script>