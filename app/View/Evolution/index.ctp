<h2 class="titulo-tab" style="height: 50px;">
</h2>

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

            var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);

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
    chart<?php echo $c['Chart']['id']; ?>.render();
    <?php endforeach; ?>
});
</script>