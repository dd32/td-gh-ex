// Catch Flames Custom Scripts
jQuery(document).ready(function() {
	
	/* Waypoint */
	if ( jQuery.isFunction( jQuery.fn.waypoint ) ) {
		var waypoint = new Waypoint({
			element: document.getElementById('page'),
			handler: function(direction) {
				if( direction == 'down' ) {
					jQuery('#header-top').addClass( 'fixed-header' );
				}
				else {
					jQuery('#header-top').removeClass( 'fixed-header' );
				}
			},
			offset: -50
		})

		var waypoint = new Waypoint({
			element: document.getElementById('page'),
			handler: function(direction) {
				if( direction == 'down' ) {
					jQuery('#scrollup').fadeIn();
					jQuery('#scrollup').click(function () {
						jQuery('body,html').animate({
							scrollTop: 0
						}, 800);
						return false;
					});	
				}
				else {
					jQuery('#scrollup').fadeOut();
				}
			},
			offset: -500
		})
	}

	/* Social */
	jQuery( '#header-social-toggle' ).on( 'click.catchflames', function( event ) {
		var that    = jQuery( this ),
			wrapper = jQuery( '#header-social' );

			that.toggleClass( 'displayblock' );
			wrapper.toggleClass( 'displaynone' );

	});

	/* Search */
	jQuery( '#header-search-toggle' ).on( 'click.catchflames', function( event ) {
		var that    = jQuery( this ),
			wrapper = jQuery( '#header-search' );

			that.toggleClass( 'displayblock' );
			wrapper.toggleClass( 'displaynone' );

	});	

	//sidr
	jQuery('#fixed-header-menu').sidr({
		name: 'mobile-top-nav',
		side: 'left' // By default
	});
	jQuery('#header-left-menu').sidr({
		name: 'mobile-header-left-nav',
		side: 'left' // By default
	});

});