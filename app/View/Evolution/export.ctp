
<div class="row">
    <?php echo $this->Form->create("Evolution"); ?>
    <div class="col-md-6">
        <?php echo $this->Form->input("date_start", array("label" => "Data Inicial", "value" => $date_start->format("d/m/Y"), 'class' => 'calendario') ); ?>
    </div>
    <div class="col-md-6">
        <?php echo $this->Form->input("date_finish", array("label" => "Data Final", "value" => $date_finish->format("d/m/Y"), 'class' => 'calendario') ); ?>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-block btn-success">Recarregar</button>
    </div>
<?php $this->Form->end(); ?>
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