$(document).ready(function() {

  $('.form-validar').validate();


    jQuery.timeago.settings.strings = {
       prefixAgo: "há",
       prefixFromNow: "em",
       suffixAgo: null,
       suffixFromNow: null,
       seconds: "alguns segundos",
       minute: "um minuto",
       minutes: "%d minutos",
       hour: "uma hora",
       hours: "%d horas",
       day: "um dia",
       days: "%d dias",
       month: "um mês",
       months: "%d meses",
       year: "um ano",
       years: "%d anos"
    };

    $("span.timeago").timeago();

    $('.numero').mask('09999');

    // Intervalo de Tempo
    $(".input.time select").change(function() {
        var div             = $(this).parent().parent();
        var hora_inicial    = $(div).find("select:eq(0)").val() + ":" + $(div).find("select:eq(1)").val();
        var hora_final      = $(div).find("select:eq(2)").val() + ":" + $(div).find("select:eq(3)").val();
        var resultado       = hora_inicial + " a " + hora_final;

        $(this).parent().parent().find(".time-value").val(resultado);
    });

    // Ranges (Escala Texto)
    $( ".range-texto-slider" ).each(function(index, element) {

        $( element ).slider({
          range: "min",
          value: $(element).data("min"),
          min: $(element).data("min"),
          max: $(element).data("max"),
          slide: function( event, ui ) {
            var input = $(element).data("input");
            var resultado = $(element).data("resultado");
            var opcoes = $(element).data("config");

            $(input).val( opcoes[ui.value].name );
            $(resultado).html( opcoes[ui.value].name );
          }
        });

    });

    // Ranges (Escala Numérica)
    $( ".range-slider" ).each(function(index, element) {

        $( element ).slider({
          range: "min",
          value: $(element).data("min"),
          min: $(element).data("min"),
          max: $(element).data("max"),
          slide: function( event, ui ) {
            var input = $(element).data("input");
            var resultado = $(element).data("resultado");

            $(input).val( ui.value );
            $(resultado).html( ui.value );
          }
        });

    });

    // Calendário
    $( ".calendario" ).datepicker({
        dateFormat: "dd/mm/yy"
    });

});