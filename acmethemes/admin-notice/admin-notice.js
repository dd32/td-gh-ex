/**
 * Getting Started
 */
jQuery( document ).ready( function ( $ ) {

	$( '.at-gsm-btn' ).click( function ( e ) {
		e.preventDefault();

		// Show updating gif icon.
        $( this ).addClass( 'updating-message' );

		// Change button text.
        $( this ).text( acmeblog_adi_install.btn_text );

		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: {
                action     : 'at_getting_started',
                security : acmeblog_adi_install.nonce
            },
			success:function( response ) {
                var extra_uri, redirect_uri, dismiss_nonce;

                if ( $( '.at-gsm-close' ).length ) {
					dismiss_nonce = $( '.at-gsm-close' ).attr( 'href' ).split( 'at_gsm_admin_notice_nonce=' )[1];
					extra_uri     = '&at_gsm_admin_notice_nonce=' + dismiss_nonce;
				}
				redirect_uri         = response.data.redirect + extra_uri;
                window.location.href = redirect_uri;
			},
			error: function( xhr, ajaxOptions, thrownError ){
				console.log(thrownError);
			}
		});
	} );
} );
