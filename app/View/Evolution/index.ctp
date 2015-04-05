<h2 class="titulo-tab" style="height: 50px;">
</h2>

<div class="row">
    <?php foreach($charts as $c) : ?>
        <div class="col-md-<?php echo $c['Chart']['columns']; ?>">
            <div class="grafico">

                <div id="grafico<?php echo $c['Chart']['id']; ?>" style="height: 300px; width: 100%;"></div>
            </div> <!-- .grafico -->
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {

    <?php foreach($charts as $c) : ?>

    <?php if($c['Chart']['type'] != 'line') : ?>
        var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);
    <?php else : $config = json_decode($c['config']); ?>
        var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", {
            'backgroundColor': '<?php echo $config->backgroundColor; ?>',
            'title':  {'text': '<?php echo $config->title->text; ?>'},
            'data': [
                {
                    'type': '<?php echo $c["Chart"]["type"]; ?>',
                    'dataPoints': [<?php echo $config->data[0]->dataPoints; ?>]
                }
            ]
        });
    <?php endif; ?>

    chart<?php echo $c['Chart']['id']; ?>.render();
    <?php endforeach; ?>
});
</script>