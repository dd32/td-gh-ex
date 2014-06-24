/*
 * Customizer.js to reload changes on Theme Customizer Preview asynchronously.
 *
 */

( function( $ ) {

	/* Default WordPress Customizer settings */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#logo .site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#logo .site-description' ).text( to );
		} );
	} );
	
	/* Theme Colors */		
	wp.customize( 'airballoon_theme_options[navi_color]', function( value ) {
		value.bind( function( newval ) {
			$('#mainnav, #mainnav-menu ul, #mainnav-mobile-menu, #mainnav-menu')
				.css('background', newval );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			$('#logo .site-title, .post-title, .post-title a:link, .post-title a:visited')
				.css('color', newval );
			$('.post-title a:hover, .post-title a:active')
				.css('color', '#333333' );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			$('.entry a, .entry a:link, .entry a:visited, .postinfo a, .comment a:link, .comment a:visited, .post-pagination a:link, .post-pagination a:visited, #footer a')
				.css('color', newval );
			$('.post-pagination .current')
				.css('background', newval );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[button_color]', function( value ) {
		value.bind( function( newval ) {
			$('input[type="submit"], .widget-tabnav li a, #commentform #submit, #frontpage-intro-button a, .more-link span, .read-more, #image-nav .nav-previous a, #image-nav .nav-next a, #frontpage-slider .zeeslide .slide-entry .slide-more .slide-link')
				.css('background', newval );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			$('.widgettitle')
				.css('color', newval );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[widget_link_color]', function( value ) {
		value.bind( function( newval ) {
			$('.widget a:link, .widget a:visited')
				.css('color', newval );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[frontpage_widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			$('.frontpage-widgets .widget .widgettitle, .widget-frontpage-services .widget-service-icon span')
				.css('color', newval );
		} );
	} );
	
	wp.customize( 'airballoon_theme_options[frontpage_widget_link_color]', function( value ) {
		value.bind( function( newval ) {
			$('.frontpage-widgets .widget a:link, .frontpage-widgets .widget a:visited')
				.css('color', newval );
		} );
	} );
	

} )( jQuery );