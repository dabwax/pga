$(document).ready(function() {

    $(".btn-enviar-calendario").on("click", function() {
        $(this).html('<i class="fa fa-times-circle"></i>');
        $(this).removeClass("btn-enviar-calendario").addClass("btn-fechar-calendario");

        $(".form-pesquisar").submit();

        return false;
    });
    $(".btn-enviar-busca").on("click", function() {
        $(this).html('<i class="fa fa-times-circle"></i>');
        $(this).removeClass("btn-enviar-busca").addClass("btn-fechar-calendario");

        $(".form-busca").submit();

        return false;
    });

    $(".btn-fechar-calendario").on("click", function() {
        $(this).html('<i class="fa fa-check-square"></i>');
        $(this).removeClass("btn-fechar-calendario").addClass("btn-enviar-calendario");
        $(".form-pesquisar").addClass("hide");
        $(".btn-pesquisar").removeClass("hide");
        return false;
    });

    $(".btn-pesquisar").on("click", function() {
        var target = $(this).data("target");

        if(target == "calendario") {
            $(".form-pesquisar").toggleClass("hide");
        } else {
            $(".form-busca").toggleClass("hide");
        }
        $(this).toggleClass("hide");

        return false;
    });

    $(".btn-hashtag").on("click", function() {
        var id = $(this).data("id");
        var value = $(this).html();
        window.parent.$("#StudentInputValue" + id + "Value").redactor('code.set', "" + value);
        window.parent.$.fancybox.close();

        return false;
    });

    if(jQuery().fancybox) {
        $(".btn-editar-feed,.btn-iframe").fancybox({
            type: 'iframe'
        });
    }

    //Only number and one dot
    function onlyDecimal(element, decimals)
    {
        $(element).keypress(function(event)
        {
            num = $(this).val() ;
            num = isNaN(num) || num === '' || num === null ? 0.00 : num ;
            if ((event.which != 44 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
            {
                event.preventDefault();

            }
            if($(this).val() == parseFloat(num).toFixed(decimals))
            {
                event.preventDefault();
            }

            var atualizado = num.replace(".", ",");
            $(this).val(atualizado);
        });
    }

    onlyDecimal(".numero", 2);

    $("#MessageReplyViewForm").submit(function() {
        var url = $(this).attr("action");
        var data = $(this).serialize();

        $container = $("#tabbed-nav").find("> div");
        $container.append('<span class="z-spinner"></span>');

        $.ajax({
            method: "POST",
            url: url,
            data: data,
            success: function(data) {

                    $(".z-content.z-active").find(".z-content-inner").html(data);
                    $container.find(">.z-spinner").remove();

                    $("#tabbed-nav").data('zozoTabs').refresh();
            }
        });

        return false;
    });

    if(jQuery().zozoTabs) {
        $("#tabbed-nav").zozoTabs({
            animation: {
                duration: 500,
                effects: "slideV"
            },
            deeplinking: true
        });
    }

    $(".checkbox-materia").change(function() {

        if($(this).is(":checked")) {
            $(this).prop("checked", false);
        } else {
            $(this).prop("checked", true);
        }
        $(this).parent().find(".btn-selecionar-materia").click();
    });
    $(".btn-enviar-inputs").click(function() {
        var url = $("#StudentInputValueCreateForm").attr("action");

        $.ajax({
            type: "POST",
            url: url,
            data: $("#StudentInputValueCreateForm").serialize(),
            success: function(data) {
                location.reload();
            }
        });
        return false;
    });

    function loadEditors() {
        if(jQuery().redactor) {
            $('.ckeditor').redactor();
        }
    }

    loadEditors();

    $("body").on("click", ".z-content-inner a", function() {
        var href = $(this).attr("href");

        if(href === "javascript:;") {
            return false;
        }

        if(href === "#") {
            return false;
        }

        if(!$(this).hasClass("disable-ajax")) {

            $container = $("#tabbed-nav").find("> div");
            $container.append('<span class="z-spinner"></span>');

            $.ajax({
                type: "GET",
                url: $(this).attr("href"),
                dataType: "html",
                success: function(data) {
                    $(".z-content.z-active").find(".z-content-inner").html(data);
                    $container.find(">.z-spinner").remove();

                    $("#tabbed-nav").data('zozoTabs').refresh();
                }
            });

            return false;
        }
    });

    if (jQuery().select2) {
        $("select").select2();


        $("#MessageRecipientRecipients").select2({
            maximumSelectionSize: 3
        });
    }

    function IsEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    function checkUsername(obj) {
        var val = $(obj).val();
        var url = $(obj).data("url");

        if(IsEmail(val)) {
            $("#alerta").removeClass("sucesso erro").html("");

            $.ajax({
                type: "POST",
                data: {email: val},
                url: url,
                success: function(data) {

                    if(data.tipo == "sem_senha") {
                        $("#UserPassword").attr("placeholder", "Defina sua senha aqui");
                    } else {
                        $("#alerta").addClass(data.status).html(data.message);
                    }

                    if(data.status == "sucesso") {
                        $("#btn-entrar").attr("disabled", false);

                        $(".form-password").removeClass("hide");
                    } else {
                        $(".form-password").addClass("hide");
                        $("#btn-entrar").attr("disabled", true);
                    }
                }
            });
        } else {
            $("#alerta").removeClass("sucesso erro").html("E-mail inválido.");
        }
    }

    $("#UserUsername").keyup(function() {

        checkUsername($(this));
    });

    $("#UserUsername").blur(function() {

        checkUsername($(this));
    });

    if(jQuery().timeago) {
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
    }

    if (jQuery().mask) {
        //$('.numero').mask('09999');
    }

    $(".btn-selecionar-materia").click(function() {
        $(this).parent().toggleClass("ativo");
        if($(this).parent().find("input[type='checkbox']").is(":checked")) {
            $(this).parent().find("input[type='checkbox']").prop('checked', false);
            $(this).parent().find("textarea").val("");
        } else {
            $(this).parent().find("input[type='checkbox']").prop('checked', true);
            $(this).parent().find("textarea").val(" ");
        }
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

    function setRangeSlider() {
        // Ranges (Escala Texto)
        $( ".range-texto-slider" ).each(function(index, element) {

            var value = $(element).data("value");

            if(!value) {
                value = $(element).data("min");
            }

            $( element ).slider({
              range: "min",
              value: value,
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

            var value = $(element).data("value");

            if(!value) {
                value = $(element).data("min");
            }

            $( element ).slider({
              range: "min",
              value: value,
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
    }

    setRangeSlider();

    // Bootstrap - Tabs (Para carregar com o hash da URL)
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    $(".tab-pane.active").find(".input input").first().focus();

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
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