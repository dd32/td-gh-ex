jQuery(function() {

    jQuery('.widget-area-toggle .genericon').click(function() {
    	jQuery('.widget-area').slideToggle();
    });
    
	jQuery(window).scroll (function() {
		if ( jQuery( window ).scrollTop() > 100 ) {
			jQuery( "#back-to-top" ).fadeIn( 500 );
		} else {
			jQuery( "#back-to-top" ).fadeOut( 500 );
		}
	});

	jQuery( "#back-to-top" ).click( function(){
		jQuery( 'body, html' ).animate( {scrollTop:0}, 1000 );
		return false;
	});
    
});
