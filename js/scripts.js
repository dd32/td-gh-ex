/* <![CDATA[ */
var $ = jQuery.noConflict();
jQuery(document).ready(function($){ // START

	// Input title
	$( 'input[title], textarea[title]' ).each(function() {if($(this).val() === '') {$(this).val($(this).attr('title'));}
		$(this).focus(function() {if($(this).val() == $(this).attr('title')) {$(this).val('').addClass('focused');}});
		$(this).blur(function() {if($(this).val() === '') {$(this).val($(this).attr('title')).removeClass('focused');}});
	});

	// Fade in and out
	$( '.fade' ).hover( function() {$(this).fadeTo( "medium", 1 );}, function() {$(this).fadeTo( "medium", 0.5 );} );

	// Accordion
	$( '.accordion-content' ).hide();
	$( '.accordion-title' ).click(function() {
	  $( ".accordion-content" ).slideUp( "normal" );
	  $( ".accordion-title" ).removeClass( "accordion-open" );
		if($(this).next().is( ":hidden" ) == true) {
		  $(this).next().slideDown( "normal" );
		  $(this).addClass( "accordion-open" );
		} 
	});

	// Add .has-sub class into sub menu parent
	$( 'ul ul' ).parent().addClass( "has-sub" );

	// Double Tap To Go
	$( '.nav li:has(ul)' ).doubleTapToGo();

	// Burger Menu
	$( '.nav .menu-click' ).click( function(){
		$( this ).toggleClass( 'menu-open' );
		$( '.nav .main-menu' ).slideToggle( 300 );
	});

	// Fluid video
	$( '.article' ).fitVids();

}); // END
/* ]]> */