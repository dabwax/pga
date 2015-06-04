<!-- Se for  um gráfico de número absoluto -->
<?php if($c['Chart']['type'] == "num_absoluto") : ?>
<?php 

    // Se não for um gráfico de nota
    if($c['Chart']['sub_type'] != "nota") {
        // Armazena as configurações do gráfico
        $config = json_decode($c['config']);

        // Armazena o datapoint do gráfico
        $datapoints = $config->data;

        // Armazena os totais
        $total = $datapoints[0]->total;
        $total_dias = $datapoints[0]->total_dias;

        // Se o total não for zerado, calcula a media, do contrário a média é 0
        if($total > 0 && $total_dias > 0) {
            $media = $total / $total_dias;
        } else {
            $media = 0;
            $total_dias = 0;
        }
    }
    ?>


    <!-- Se for um ráfico de média -->
    <?php if($c['Chart']['sub_type'] == "media") { ?>
    <div class="text-center" title="Total: <?php echo $total;?> - Total de Dias: <?php echo $total_dias ?>">
        <h2><?php echo $media; ?> </h2>
        <p><?php echo $config->title->text; ?></p>
        <small><?php echo $total_dias; ?> dias</small>
    </div>
<!-- Se for um gráfico de total -->
<?php } elseif($c['Chart']['sub_type'] == "total") { ?>
    <div class="text-center" title="Total: <?php echo $total;?>">
        <h2><?php echo $total; ?> </h2>
        <p><?php echo $config->title->text; ?></p>
    </div>
<!-- Se for um gráfico de nota -->
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