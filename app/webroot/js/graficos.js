$(document).ready(function() {

    $(".pga-grafico").each(function() {
        var type = $(this).data("type");
        var ctx = $(this).get(0).getContext("2d");
        var data = $(this).data('config');

        console.log(data);

        // gráfico de linha
        if(type == "line") {

            var novo_label = data.labels.map(function(label) {

                var tmp = moment(label, "YYYY-MM-DD");

                return tmp.format('DD/MM');
            });
            // configuração do gráfico
            var lineChart = new Chart(ctx).Line({labels: novo_label, datasets: data.datasets}, {
                responsive: true,
                multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
            });

            // inclui a legenda
            var legend = lineChart.generateLegend();

            $(legend).insertAfter($(this));
        }

        // gráfico de barra
        if(type == "bar") {

            var novo_label = data.labels.map(function(label) {

                var tmp = moment(label, "YYYY-MM-DD");

                return tmp.format('DD/MM');
            });

            // configuração do gráfico
            var barChart = new Chart(ctx).Bar({labels: novo_label, datasets: data.datasets}, {
                responsive: true,
                multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
            });

            // inclui a legenda
            var legend = barChart.generateLegend();

            $(legend).insertAfter($(this));
        }
    });

});