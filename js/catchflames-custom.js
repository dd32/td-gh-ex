// Catch Flames Custom Scripts
jQuery(document).ready(function() {
	
	//Check if waypoint exists
	if ( jQuery.isFunction( jQuery.fn.waypoint ) ) {
		//Fixed Header Top
		jQuery( "#page" )
		.waypoint( function( direction ) {
			if( direction == 'down' ) {
			   jQuery('#header-top').addClass( 'fixed-header' );
			}
		})
		.waypoint( function( direction ) { // has offset on the way up
			if( direction == 'up' ) {
				jQuery('#header-top').removeClass( 'fixed-header' );
			}
		}, {offset: -1});
	}

	//sidr
	jQuery('#fixed-header-menu').sidr({
		name: 'mobile-top-nav',
		side: 'left' // By default
	});
	jQuery('#header-left-menu').sidr({
		name: 'mobile-header-left-nav',
		side: 'left' // By default
	});
	jQuery('#header-right-menu').sidr({
		name: 'mobile-header-right-nav',
		side: 'right' // By default
	});
	jQuery('#mobile-footer-menu').sidr({
		name: 'mobile-footer-nav',
		side: 'left' // By default
	});	

	// Social and Search at Fixed Header Top
	var jQueryheader_social = jQuery( '#header-social-toggle' );
	jQueryheader_social.click( function() {
		var jQuerythis_el = jQuery(this),
			jQueryform = jQuerythis_el.siblings( '#header-social' );
			jQueryhideform = jQuerythis_el.siblings( '#header-search' );
	
		if ( jQueryform.hasClass( 'displaynone' ) ) {
			//jQuery(this).removeClass( 'closed' ).addClass( 'opened' );
			
			
			jQueryform.removeClass( 'displaynone' ).addClass( 'displayblock' ).animate( { opacity : 1 }, 300 );
			
			if ( jQueryhideform.hasClass( 'displayblock' ) ) {
				jQueryhideform.removeClass( 'displayblock' ).addClass( 'displaynone' ).animate( { opacity : 0 }, 300 );
			}
			//jQueryhideform.removeClass( 'displayblock' ).animate( { opacity : 0 }, 300 );
			
		} else {
			jQueryform.removeClass( 'displayblock' ).addClass( 'displaynone' ).animate( { opacity : 0 }, 300 );
			//jQueryform.animate( { opacity : 0 }, 300 );			
		}
	});
	var jQueryheader_search = jQuery( '#header-search-toggle' );
	jQueryheader_search.click( function() {
		var jQuerythis_el_search = jQuery(this),
			jQueryform_search = jQuerythis_el_search.siblings( '#header-search' );
			jQueryhideform_search = jQuerythis_el_search.siblings( '#header-social' );
	
		if ( jQueryform_search.hasClass( 'displaynone' ) ) {
			//jQuery(this).removeClass( 'closed' ).addClass( 'opened' );
			
			
			jQueryform_search.removeClass( 'displaynone' ).addClass( 'displayblock' ).animate( { opacity : 1 }, 300 );
			
			if ( jQueryhideform_search.hasClass( 'displayblock' ) ) {
				jQueryhideform_search.removeClass( 'displayblock' ).addClass( 'displaynone' ).animate( { opacity : 0 }, 300 );
			}
			//jQueryhideform_search.removeClass( 'displayblock' ).animate( { opacity : 0 }, 300 );
			
		} else {
			jQueryform_search.removeClass( 'displayblock' ).addClass( 'displaynone' ).animate( { opacity : 0 }, 300 );
			//jQueryform_search.animate( { opacity : 0 }, 300 );			
		}
	});
	
	//scrollUP
	jQuery("#scrollup").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 1000) {
				jQuery('#scrollup').fadeIn();
			} else {
				jQuery('#scrollup').fadeOut();
			}
		});
		jQuery('#scrollup').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});	
	});

	
});