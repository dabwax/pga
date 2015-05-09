
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
                        <?php foreach($materia['notas'] as $nota) : ?>
                        <div class="text-center pull-left" style="width: 50%;">
                            <h2><?php echo $nota['esperado'] ?> / <?php echo $nota['alcancado']; ?></h2>
                            <p><?php echo $nota['label'] ?> - <?php echo $materia['nome'] ?></p>
                        </div>
                        <?php endforeach; ?>
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