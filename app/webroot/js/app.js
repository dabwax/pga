$(document).ready(function() {

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

    $( ".calendario" ).datepicker();

});