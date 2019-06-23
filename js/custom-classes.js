( function( $ ) {
	$( function() {
		$( 'body:not(:has(.widget-area-1))' ).addClass( 'actinia-no-sidebar' );

		function isFooterWidget( el ) {
			return el.parent().is( '.widget-area-2' );
		}

		if(
			$( '.widget' ).is( '.widget_eu_cookie_law_widget' ) &&
			$( '.widget-area-1' ).children().length === 0 &&
			! isFooterWidget( $( '.widget_eu_cookie_law_widget' ) )
		) {
			$( 'body' ).addClass( 'actinia-no-sidebar' );
			
			if ( $( 'body' ).hasClass( 'left-sidebar' ) ) {
				$( 'body' ).removeClass( 'left-sidebar' );
			}
		}

		if ( $( '.widget-area-1:has(.widget)' ).length >=  1 && $( 'body' ).hasClass( 'actinia-no-sidebar' ) ) {
			$('body').removeClass('actinia-no-sidebar');
		}
		
		if ( $( '.site-description' ).length === 0 ) {
			$( 'body' ).addClass( 'actinia-no-tagline' );
		}
		
		if ( $( '.main-navigation' ).has( 'ul' ).length == 0 ) {
			$( 'body' ).addClass( 'no-menu' );
		}
		
		if (
			$( 'body' ).hasClass( 'navbar-side' ) &&
			$( '.main-navigation' ).has( 'ul' ).length == 0 &&
			$( 'body' ).hasClass( 'actinia-no-sidebar' )
		) {
			$( 'body' ).removeClass( 'navbar-side' );
		}
		
		if ( $( 'body' ).hasClass( 'no-menu' ) && $( 'body' ).hasClass( 'navbar-side' ) ) {
			$( 'body' ).removeClass( 'navbar-side' );
		}
	});
	
})( jQuery );
