$(document).ready(function() {

  $(".campo-studentinput").on("keypress", function(event) {
    if(event.which == 13) {
      $(this).blur();
    }
  });
  $(".campo-studentinput").blur(function() {
    var value = $(this).val();
    var url = $(this).data("url");
    var id = $(this).data("id");
    var field = $(this).data("field");
    var reload = $(this).data("reload");
    var icone = $(this).parent().parent().find(".icone-ajax");
    var icone2 = $(this).parent().parent().find(".icone-sucesso");

    $(icone).fadeIn(200);
    $(".icone-sucesso").fadeOut(200);

    $.ajax({
      type: "POST",
      url: url,
      data: {value: value, id: id, field: field},
      success: function(data) {
        $(icone).fadeOut(200);
        $(icone2).fadeIn(200);

        if(reload == true) {
          window.location.reload();
        }

      }
    });
  });

  $(".select-tipo-de-input").change(function() {
    var value = $(this).val();

    if(value == 5) {
      $(".select-tipo-grafico").find('[value="column"]').remove();
      $(".select-tipo-grafico").find('[value="line"]').remove();
    } else {

      if( $(".select-tipo-grafico").find('[value="line"]').length == 0) {
        $(".select-tipo-grafico").append("<option value='line'>Linha</option>");
      }

      if( $(".select-tipo-grafico").find('[value="column"]').length == 0) {
        $(".select-tipo-grafico").append("<option value='column'>Coluna</option>");
      }

    }
  });

  $('.form-validar').validate();

  $(".btn-excluir-aluno-confirmacao").click(function() {
    var name = $(this).data("name");

    if(prompt("Confirme o nome do aluno para removê-lo. OBS: CAIXA ALTA! " + name) == name) {
      return true;
    } else {
      return false;
    }
  });

    $('select').each(function() {
      var data_disable_select = $(this).data('disable-select');

      if(!data_disable_select) {
        $(this).select2();
      }
    });

    $('.table-datatable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/f2c75b7247b/i18n/Portuguese-Brasil.json"
        }
    });

    $('.ckeditor').redactor();

    var hash = window.location.hash.substring(1);

    if(hash == "tutor" || hash == "psico" || hash == "pais" || hash == "escola" || hash == "aluno") {
        $(window).load(function() {

            $("#btn-conteudo").tab("show");
            $("#btn-" + hash).tab("show");
        });
    }

    if(hash == "conteudo") {
      $(window).load(function() {

            $("#btn-tutor").tab("show");

      });
    }

    if(hash.indexOf('grafico-') > -1) {
      $(window).load(function() {

            $("#btn-outputs").tab("show");
            $("#btn-" + hash).tab("show");

      });
    }

    $(".fancybox").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        type: 'iframe',
        padding: 0
    });

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

    $(".btn-selecionar-materia").click(function() {
        $(this).parent().toggleClass("ativo");
        $(this).parent().find(".toggle").toggleClass("hide");
    });

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

    // Bootstrap - Tabs (Para carregar com o hash da URL)
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    $(".tab-pane.active").find(".input input").first().focus();

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);

        if($(this).attr("id") == "btn-conteudo") {

            $("#btn-tutor").tab("show");
        }
    });

    // Drag and drop dos inputs
    $( "#lista-final, #lista-novo" ).sortable({
        helper:"clone",
        opacity:0.5,
        cursor:"crosshair",
        connectWith: ".list",
        receive: function( event, ui ){
            if($(ui.sender).attr('id')==='lista-final'
               && $('#lista-novo').children('li').length>3){

                $(ui.sender).sortable('cancel');
            }
        }
    });

    $( "#lista-final, #lista-novo" ).disableSelection();

    $( ".draggable" ).draggable({
      connectToSortable: "#lista-final",
      helper: "clone",
      revert: "invalid"
    });

    // Calendário
    $( ".calendario" ).datepicker({
        dateFormat: "dd/mm/yy"
    });

    $(".calendario").datepicker("option", $.datepicker.regional[ "pt-BR" ]);

});