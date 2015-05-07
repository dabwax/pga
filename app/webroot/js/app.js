function carregarTimeline(timeline_data, options) {
    var timeline = new Timeline($('#timeline'), timeline_data);
    timeline.setOptions(options);
    timeline.display();
}

$(document).ready(function() {

    var imgLiquid=imgLiquid||{VER:"0.9.944"};imgLiquid.bgs_Available=!1,imgLiquid.bgs_CheckRunned=!1,imgLiquid.injectCss=".imgLiquid img {visibility:hidden}",function(i){function t(){if(!imgLiquid.bgs_CheckRunned){imgLiquid.bgs_CheckRunned=!0;var t=i('<span style="background-size:cover" />');i("body").append(t),!function(){var i=t[0];if(i&&window.getComputedStyle){var e=window.getComputedStyle(i,null);e&&e.backgroundSize&&(imgLiquid.bgs_Available="cover"===e.backgroundSize)}}(),t.remove()}}i.fn.extend({imgLiquid:function(e){this.defaults={fill:!0,verticalAlign:"center",horizontalAlign:"center",useBackgroundSize:!0,useDataHtmlAttr:!0,responsive:!0,delay:0,fadeInTime:0,removeBoxBackground:!0,hardPixels:!0,responsiveCheckTime:500,timecheckvisibility:500,onStart:null,onFinish:null,onItemStart:null,onItemFinish:null,onItemError:null},t();var a=this;return this.options=e,this.settings=i.extend({},this.defaults,this.options),this.settings.onStart&&this.settings.onStart(),this.each(function(t){function e(){-1===u.css("background-image").indexOf(encodeURI(c.attr("src")))&&u.css({"background-image":'url("'+encodeURI(c.attr("src"))+'")'}),u.css({"background-size":g.fill?"cover":"contain","background-position":(g.horizontalAlign+" "+g.verticalAlign).toLowerCase(),"background-repeat":"no-repeat"}),i("a:first",u).css({display:"block",width:"100%",height:"100%"}),i("img",u).css({display:"none"}),g.onItemFinish&&g.onItemFinish(t,u,c),u.addClass("imgLiquid_bgSize"),u.addClass("imgLiquid_ready"),l()}function d(){function e(){c.data("imgLiquid_error")||c.data("imgLiquid_loaded")||c.data("imgLiquid_oldProcessed")||(u.is(":visible")&&c[0].complete&&c[0].width>0&&c[0].height>0?(c.data("imgLiquid_loaded",!0),setTimeout(r,t*g.delay)):setTimeout(e,g.timecheckvisibility))}if(c.data("oldSrc")&&c.data("oldSrc")!==c.attr("src")){var a=c.clone().removeAttr("style");return a.data("imgLiquid_settings",c.data("imgLiquid_settings")),c.parent().prepend(a),c.remove(),c=a,c[0].width=0,setTimeout(d,10),void 0}return c.data("imgLiquid_oldProcessed")?(r(),void 0):(c.data("imgLiquid_oldProcessed",!1),c.data("oldSrc",c.attr("src")),i("img:not(:first)",u).css("display","none"),u.css({overflow:"hidden"}),c.fadeTo(0,0).removeAttr("width").removeAttr("height").css({visibility:"visible","max-width":"none","max-height":"none",width:"auto",height:"auto",display:"block"}),c.on("error",n),c[0].onerror=n,e(),o(),void 0)}function o(){(g.responsive||c.data("imgLiquid_oldProcessed"))&&c.data("imgLiquid_settings")&&(g=c.data("imgLiquid_settings"),u.actualSize=u.get(0).offsetWidth+u.get(0).offsetHeight/1e4,u.sizeOld&&u.actualSize!==u.sizeOld&&r(),u.sizeOld=u.actualSize,setTimeout(o,g.responsiveCheckTime))}function n(){c.data("imgLiquid_error",!0),u.addClass("imgLiquid_error"),g.onItemError&&g.onItemError(t,u,c),l()}function s(){var i={};if(a.settings.useDataHtmlAttr){var t=u.attr("data-imgLiquid-fill"),e=u.attr("data-imgLiquid-horizontalAlign"),d=u.attr("data-imgLiquid-verticalAlign");("true"===t||"false"===t)&&(i.fill=Boolean("true"===t)),void 0===e||"left"!==e&&"center"!==e&&"right"!==e&&-1===e.indexOf("%")||(i.horizontalAlign=e),void 0===d||"top"!==d&&"bottom"!==d&&"center"!==d&&-1===d.indexOf("%")||(i.verticalAlign=d)}return imgLiquid.isIE&&a.settings.ieFadeInDisabled&&(i.fadeInTime=0),i}function r(){var i,e,a,d,o,n,s,r,m=0,h=0,f=u.width(),v=u.height();void 0===c.data("owidth")&&c.data("owidth",c[0].width),void 0===c.data("oheight")&&c.data("oheight",c[0].height),g.fill===f/v>=c.data("owidth")/c.data("oheight")?(i="100%",e="auto",a=Math.floor(f),d=Math.floor(f*(c.data("oheight")/c.data("owidth")))):(i="auto",e="100%",a=Math.floor(v*(c.data("owidth")/c.data("oheight"))),d=Math.floor(v)),o=g.horizontalAlign.toLowerCase(),s=f-a,"left"===o&&(h=0),"center"===o&&(h=.5*s),"right"===o&&(h=s),-1!==o.indexOf("%")&&(o=parseInt(o.replace("%",""),10),o>0&&(h=.01*s*o)),n=g.verticalAlign.toLowerCase(),r=v-d,"left"===n&&(m=0),"center"===n&&(m=.5*r),"bottom"===n&&(m=r),-1!==n.indexOf("%")&&(n=parseInt(n.replace("%",""),10),n>0&&(m=.01*r*n)),g.hardPixels&&(i=a,e=d),c.css({width:i,height:e,"margin-left":Math.floor(h),"margin-top":Math.floor(m)}),c.data("imgLiquid_oldProcessed")||(c.fadeTo(g.fadeInTime,1),c.data("imgLiquid_oldProcessed",!0),g.removeBoxBackground&&u.css("background-image","none"),u.addClass("imgLiquid_nobgSize"),u.addClass("imgLiquid_ready")),g.onItemFinish&&g.onItemFinish(t,u,c),l()}function l(){t===a.length-1&&a.settings.onFinish&&a.settings.onFinish()}var g=a.settings,u=i(this),c=i("img:first",u);return c.length?(c.data("imgLiquid_settings")?(u.removeClass("imgLiquid_error").removeClass("imgLiquid_ready"),g=i.extend({},c.data("imgLiquid_settings"),a.options)):g=i.extend({},a.settings,s()),c.data("imgLiquid_settings",g),g.onItemStart&&g.onItemStart(t,u,c),imgLiquid.bgs_Available&&g.useBackgroundSize?e():d(),void 0):(n(),void 0)})}})}(jQuery),!function(){var i=imgLiquid.injectCss,t=document.getElementsByTagName("head")[0],e=document.createElement("style");e.type="text/css",e.styleSheet?e.styleSheet.cssText=i:e.appendChild(document.createTextNode(i)),t.appendChild(e)}();

    $(".img-avatar").imgLiquid();

    $("#timeline").on("click", ".ler-mais-feed", function(){
        var toggle = $(this).data("toggle");
            var restante = $(this).parent().find(".restante");

        if(toggle == false) {
            $(this).data("toggle", true);


            $(restante).show();
            $(this).text("esconder");    
        } else {
            $(this).data("toggle", false);

            $(restante).hide();
            $(this).text("ver mais");    
        }
    });

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
        var tipo = $(this).data("tipo");
        var value = $(this).html();

        if(tipo == "input") {
            window.parent.$("#StudentInputValue" + id + "Value").redactor('code.set', "" + value);
        }

        if(tipo == "busca") {
            window.parent.$("#SearchS").val(value).focus();
        }

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
        var hash = window.location.hash;

        // quando trocar de aba, destruir todos os objetos de timeline

        $("#tabbed-nav").zozoTabs({
            animation: {
                duration: 500,
                effects: "slideV"
            },
            deeplinking: true,
            select: function(event, item) {
                if(hash == "#input_arquivo") {
                    $(".btn-arquivo-input").click();
                }
            },
            deactivate: function(event, item) {
                if(item.index == 0) {
                    window.location.reload();
                 }
            }
        });
        
        if(hash == "") {
            if($("#tabbed-nav").length > 0) {
                $("#tabbed-nav").data('zozoTabs').select(0);
            }
        }
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


        $("#MessageRecipientRecipients").select2();
    }

    function IsEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    $("#UserPassword").keyup(function() {
        if($(this).val().length > 3) {
            $("#btn-entrar").attr("disabled", false);
        }
    });

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

                    if(data.tipo == "sem_senha") {
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

    if(hash == "#input_arquivo") {
        $("#tabbed-nav").data('zozoTabs').select(0);
        $(".btn-arquivo-input").click();
    }

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