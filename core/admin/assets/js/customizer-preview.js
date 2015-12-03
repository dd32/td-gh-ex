( function( $ ) {

	$('.preview-notice').append('<a class="getpremium" target="_blank" href="' + alhenalite_details.url + '">' + alhenalite_details.label + '</a>'); 
	$('.preview-notice').on("click",function(a){a.stopPropagation()});

} )( jQuery );   