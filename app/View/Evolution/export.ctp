
<div class="row">
    <?php echo $this->Form->create("Evolution"); ?>
    <div class="col-md-6">
        <?php echo $this->Form->input("date_start", array("label" => "Data Inicial", "value" => $date_start->format("d/m/Y")) ); ?>
    </div>
    <div class="col-md-6">
        <?php echo $this->Form->input("date_finish", array("label" => "Data Final", "value" => $date_finish->format("d/m/Y")) ); ?>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-block btn-success">Recarregar</button>
        <a href="javascript:;" class="btn btn-block btn-primary">Exportar</a>
    </div>
<?php $this->Form->end(); ?>
</div>
<div class="row">
    <?php foreach($charts as $c) : ?>
        <div class="col-md-<?php echo $c['Chart']['columns']; ?>">

            <?php if($c['Chart']['sub_type'] == "nota") : ?>
            <div class="grafico" style="width: 100%;">
        <?php else: ?>
            <div class="grafico" style="height: <?php echo $c['Chart']['height']; ?>px; width: 100%;">
    <?php endif; ?>

                <div id="grafico<?php echo $c['Chart']['id']; ?>" class="<?php echo $c['Chart']['type']; ?>" style="width: 100%;">
                    <?php if($c['Chart']['type'] == "num_absoluto") : ?>
                    <?php 

                        if($c['Chart']['sub_type'] != "nota") {
                            $config = json_decode($c['config']);
                            $datapoints = $config->data[0]->dataPoints;
                            $total = $datapoints[0]->total;
                            $total_dias = $datapoints[0]->total_dias;

                            if($total > 0 && $total_dias > 0) {
                                $media = $total / $total_dias;
                            } else {
                                $media = 0;
                                $total_dias = 0;
                            }
                        }
                        ?>

                        <?php if($c['Chart']['sub_type'] == "media") { ?>
                        <div class="text-center" title="Total: <?php echo $total;?> - Total de Dias: <?php echo $total_dias ?>">
                            <h2><?php echo $media; ?> </h2>
                            <p><?php echo $config->title->text; ?></p>
                            <small><?php echo $total_dias; ?> dias</small>
                        </div>
                    <?php } elseif($c['Chart']['sub_type'] == "total") { ?>
                        <div class="text-center" title="Total: <?php echo $total;?>">
                            <h2><?php echo $total; ?> </h2>
                            <p><?php echo $config->title->text; ?></p>
                        </div>
                    <?php } elseif($c['Chart']['sub_type'] == "nota") {?>

                        <?php foreach($materias as $materia) : ?>
                        <div class="text-center pull-left" style="width: 100%;">
                            <h2 style="font-size: 20px;"><?php echo $materia['nome'] ?></h2>
                        <?php foreach($materia['notas'] as $nota) : ?>
                        <?php if($nota['esperado'] > 0 && $nota['alcancado'] > 0) : ?>
                            <h3 style="font-size: 17px;"><?php echo $nota['esperado'] ?> / <?php echo $nota['alcancado']; ?></h3>
                            <p style="font-size: 13px;"><?php echo $nota['label'] ?></p>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>

                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div> <!-- .grafico -->
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {

    <?php foreach($charts as $c) : ?>

        <?php if($c['Chart']['type'] == "line") : ?>

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

        
        <?php elseif($c['Chart']['type'] == "num_absoluto") : ?>
            
        <?php else : ?>

            <?php if(!empty($c['config'])) : ?>
                var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);
            <?php endif; ?>

        <?php endif; ?>

            <?php if(!empty($c['config']) && $c['Chart']['type'] != "num_absoluto" ) : ?>
    chart<?php echo $c['Chart']['id']; ?>.render();
    <?php endif; ?>
    <?php endforeach; ?>
});
</script>