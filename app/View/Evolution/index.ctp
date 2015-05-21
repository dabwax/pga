
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
                    <?php echo $this->element("grafico_nota"); ?>
                </div>
            </div> <!-- .grafico -->
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {

    // Itera todos os gráficos
    <?php foreach($charts as $c) : ?>

        // Se for um gráfico de linha
        <?php if($c['Chart']['type'] == "line") : ?>

            // Gera configuração própria para o gráfico de linha
            <?php
                // faz um cache dos dados antigos
                $config = json_decode($c['config']);
                $datapoints = $config->data[0]->dataPoints;
                $datapoints_novo = array();

                // remove os datapoints atuais
                unset($config->data[0]->dataPoints);

                // gera as linhas de JS
                foreach($datapoints as $d) {
                    $mes = $d->x[1] - 1;

                    $mes = str_pad($mes, 2, '0', STR_PAD_LEFT);

                    $datapoints_novo[] = "{x: new Date(" . $d->x[0] . ", " . ($mes) . ", " . $d->x[2] . "), y: " . $d->y . "}";
                }
            ?>
            var config = <?php echo json_encode($config); ?>;
            var id = <?php echo $c['Chart']['id']; ?>;
            var dataPoints = [<?php echo implode(",", $datapoints_novo); ?>];
            config["data"][0]["dataPoints"] = dataPoints;

            var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico" + id, config);

        // Se for um gráfico de número absoluto
        <?php elseif($c['Chart']['type'] == "num_absoluto") : ?>
            
        // Se for um gráfico comum
        <?php else : ?>

            // Se existir configuração para o gráfico
            <?php if(!empty($c['config'])) : ?>
                 // Instancia o CanvasJS
                var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);
            <?php endif; ?>

        <?php endif; ?>

             // Se não for um gráfico de número absoluto, é renderizado o CanvasJS
            <?php if(!empty($c['config']) && $c['Chart']['type'] != "num_absoluto" ) : ?>
                chart<?php echo $c['Chart']['id']; ?>.render();
            <?php endif; ?>
    <?php endforeach; ?>
});
</script>