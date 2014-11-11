$(document).ready(function() {

	$('.numero').mask('09999');

	$(".btn-selecionar-materia").click(function() {
		$(this).parent().toggleClass("ativo");
		$(this).parent().find(".toggle").toggleClass("hide");
	});

	// Intervalo de Tempo
	$(".input.time select").change(function() {
		var div 			= $(this).parent().parent();
		var hora_inicial 	= $(div).find("select:eq(0)").val() + ":" + $(div).find("select:eq(1)").val();
		var hora_final 		= $(div).find("select:eq(2)").val() + ":" + $(div).find("select:eq(3)").val();
		var resultado 		= hora_inicial + " a " + hora_final;

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
    $( ".calendario" ).datepicker();

});