( function($) {
	$( window ).load( function() {
		$( '#customize-theme-controls' ).append(
			'<div class="premium-upgrade"><a href="https://alphabetthemes.com/downloads/category/plugins/" target="_blank">' + ABC_Customizer.upgradeAd + '<span class="dashicons dashicons-arrow-right-alt"></span></a></div>'
		);
	} );

	$( '#customize-theme-controls' ).on( 'click', '#abc-reset-theme-options', function(e) {
		e.preventDefault();

        if ( window.confirm( ABC_Customizer.confirmText ) ) {
			window.location.href = ABC_Customizer.customizerURL + '?abc-reset=' + ABC_Customizer.exportNonce;
		}
	} );
} )(jQuery);