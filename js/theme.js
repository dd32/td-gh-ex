( function( $ ) {
	$( '.main-navigation' )
		.find( '.menu-item-has-children > a' ).after( '<i class="fa fa-caret-down"></i>' )
		.end()
		.find( '.menu-item-has-children i' ).on( 'click', function() {
			var $el = $(this),
				$parent = $el.parent();

			$el.parent().parent().find( 'li' ).not( $parent ).removeClass( 'menu-open' );
			$el.parent().toggleClass( 'menu-open' );
		} );

	if ( jQuery.support.touch ) {
        $( '#page, #sidebar' )
            .bind( 'swipeleft', function(e) {
				$( 'body' ).addClass( 'open-sidebar' );
                e.stopImmediatePropagation();
                return false;
            } )
            .bind( 'swiperight', function( e ) {
				$( 'body' ).removeClass( 'open-sidebar' );
                e.stopImmediatePropagation();
                return false;
            } );
	}

	$( '.nav-open-top-menu' ).click( function() {
		$( 'body' ).toggleClass( 'top-menu-open' ).removeClass( 'search-open' );
	} );

	$( '.nav-search i' ).click( function() {
		$( 'body' ).toggleClass( 'search-open' ).removeClass( 'top-menu-open' );
	} );

	var header_height = $( '#masthead' ).outerHeight(),
		$body = $( 'body' );

	if ( 'fixed' === $( '#masthead' ).css( 'position' ) ) {
		$body.css( 'padding-top', header_height );
		header_height = ( $body.hasClass( 'admin-bar' ) ) ? header_height + 32 : header_height;
		header_height = ( $body.hasClass( 'home' ) ) ? 380 + header_height: header_height;
		$(window).bind( 'scroll', function() {
			if ( $(window).scrollTop() > ( header_height - 66 ) ) {
				$body.addClass( 'shrink-nav' );
			} else {
				$body.removeClass( 'shrink-nav' );
			}
		} ).scroll();
	}
} )( jQuery );