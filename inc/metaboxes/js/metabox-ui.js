jQuery(document).ready(function( $ ) {
	"use strict";

	function ashe_metaboxes( selector ) {
		
		// hide all metaboxes
		$('.acf-postbox').not('#acf-group_592420379b851').css({ 'visibility' : 'hidden', 'height' : '0', 'margin' : '0' });

		// show specific metabox
		if ( selector.val() === '0' ) {
			$('#acf-group_59242e6be2da6').removeAttr('style');
		} if ( selector.val() === 'audio' ) {
			$('#acf-group_592434b17acf0').removeAttr('style');
		} if ( selector.val() === 'video' ) {
			$('#acf-group_592430c291a56').removeAttr('style');
		} if ( selector.val() === 'gallery' ) {
			$('#acf-group_59243761c4be2').removeAttr('style');
		} if ( selector.val() === 'link' ) {
			$('#acf-group_59243c71acc08').removeAttr('style');
		} if ( selector.val() === 'quote' ) {
			$('#acf-group_59243d055a3b3').removeAttr('style');
		}

	}

	// show on load
	ashe_metaboxes( $('input[name=post_format]:checked') );

	// show on change
	$('input[name=post_format]').on( 'change', function() {
		ashe_metaboxes( $(this) );
	});

}); // end dom ready