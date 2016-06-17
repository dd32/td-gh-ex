( function($) {
	$( '#customize-theme-controls' ).on( 'click', '#abc-reset-theme-options', function(e) {
		e.preventDefault();

        if ( window.confirm( ABC_Customizer.confirmText ) ) {
			window.location.href = ABC_Customizer.customizerURL + '?abc-reset=' + ABC_Customizer.exportNonce;
		}
	} );
} )(jQuery);