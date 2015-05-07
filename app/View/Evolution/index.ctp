
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

</div>

<div class="row">
    <?php foreach($charts as $c) : ?>
        <div class="col-md-<?php echo $c['Chart']['columns']; ?>">
            <div class="grafico" style="height: <?php echo $c['Chart']['height']; ?>px; width: 100%;">

                <div id="grafico<?php echo $c['Chart']['id']; ?>" style="width: 100%;"></div>
            </div> <!-- .grafico -->
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {

    <?php foreach($charts as $c) : ?>


        <?php if($c['Chart']['type'] != "line") : ?>
        
            <?php if(!empty($c['config'])) : ?>
                var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);
            <?php endif; ?>

        <?php else: ?>

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

            console.log(config);

            var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico" + id, config);

        <?php endif; ?>

            <?php if(!empty($c['config'])) : ?>
    chart<?php echo $c['Chart']['id']; ?>.render();
    <?php endif; ?>
    <?php endforeach; ?>
});
</script>