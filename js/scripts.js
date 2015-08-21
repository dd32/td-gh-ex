/**
 *	jQuery Ready
 */
jQuery( document ).ready( function($) {
	var aboutUsContainerHeight = $( '#about-us' ).height();
	$( '#about-us .image' ).css( 'height', aboutUsContainerHeight + 17 );

	$( window ).on( 'resize', function() {
		var aboutUsContainerHeight = $( '#about-us' ).height();
		$( '#about-us .image' ).css( 'height', aboutUsContainerHeight + 17 );
	});
});