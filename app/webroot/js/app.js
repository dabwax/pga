$(document).ready(function() {

	// Ranges (Escala Numérica)
	$( ".range-slider" ).slider({
      range: "min",
      value: $( ".range-slider" ).data("min"),
      min: $( ".range-slider" ).data("min"),
      max: $( ".range-slider" ).data("max"),
      slide: function( event, ui ) {
      	var input = $( ".range-slider" ).data("input");
      	var resultado = $( ".range-slider" ).data("resultado");

        $(input).val( ui.value );
        $(resultado).html( ui.value );
      }
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