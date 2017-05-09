( function( $ ) {

	$('.preview-notice').append('<a class="getsueva" target="_blank" href="' + suevafree_details.sueva_url + '">' + suevafree_details.sueva_label + '</a>'); 
	$('.preview-notice').append('<a class="getavana" target="_blank" href="' + suevafree_details.avana_url + '">' + suevafree_details.avana_label + '</a>'); 
	$('.preview-notice').on("click",function(a){a.stopPropagation()});

} )( jQuery );   