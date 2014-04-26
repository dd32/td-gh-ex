/**
/* Responsive Navigation Menu
 * @author Stanko Metodiev
 * 
 */

jQuery( document ).ready( function( $ ) {
	
	$( '#site-navigation li a' ).addClass( 'top-level-menu' );
	
	// Add Classed for Second and Third Menu level
	$( '#site-navigation ul li a' ).addClass( 'second-level-menu' );
	$( '#site-navigation ul ul li a' ).addClass( 'third-level-menu' );
	$( '#site-navigation ul ul ul li a' ).addClass( 'forth-level-menu' );
	
	$( '<select id="responsive-menu" />' ).appendTo( '#masthead' );

	// Create default Option"
	$( '<option />', {
		'selected'	: 'selected',
		'value' 	: '',
		'text' 		: 'Navigation',
	}).appendTo( '#masthead select' );

	// Generate Responsive Menu Items
	$( '#site-navigation li a' ).each(function() {
		var el = $( this );
		$( '<option />', {
			'value'	: el.attr( 'href' ),
			'text' 	: el.text(),
			'class' : el.attr( 'class' ),
		}).appendTo( '#masthead select' );
	});

	// Adds a dashes to sub menu classes
	$( '<span>- </span>' ).prependTo( 'option.second-level-menu' );
	$( '<span>- </span>' ).prependTo( 'option.third-level-menu' );
	$( '<span>- </span>' ).prependTo( 'option.forth-level-menu' );
	
	// Allows user to automatically choose and go to selected page
	$( '#responsive-menu' ).change(function() {
		window.location = $( this ).find( 'option:selected' ).val();
	});
	
});