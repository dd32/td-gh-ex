( function( $ ) {

	$('.preview-notice').append('<a class="getpremium" target="_blank" href="' + lookilite_details.url + '">' + lookilite_details.label + '</a>'); 
	$('.preview-notice').on("click",function(a){a.stopPropagation()});

} )( jQuery );   