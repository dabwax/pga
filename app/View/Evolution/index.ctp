<h2 class="titulo-tab" style="height: 50px;">
</h2>

<div class="row">
    <?php foreach($charts as $c) : ?>
        <div class="col-md-<?php echo $c['Chart']['columns']; ?>">
            <div class="grafico">

                <div id="grafico<?php echo $c['Chart']['id']; ?>" style="height: <?php echo $c['Chart']['height']; ?>px; width: 100%;"></div>
            </div> <!-- .grafico -->
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {

    <?php foreach($charts as $c) : ?>

        var chart<?php echo $c['Chart']['id']; ?> = new CanvasJS.Chart("grafico<?php echo $c['Chart']['id']; ?>", <?php echo $c['config']; ?>);

    chart<?php echo $c['Chart']['id']; ?>.render();
    <?php endforeach; ?>
});
</script>