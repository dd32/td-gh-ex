/*
** Instantly live-update customizer settings in the preview for improved user experience.
*/

(function( $ ) {

/*
** Colors
*/

	asheLivePreview( 'colors_content_accent', function( val ) {
		var selectors = '\
			#page-content h1 a,\
			#page-content .post-comments,\
			#page-content .post-author a,\
			#page-content .post-share a,\
			#page-content .related-posts h4 a,\
			#page-content .author-description h4 a,\
			#page-content .blog-pagination a,\
			#page-content .post-date,\
			#page-content .post-author,\
			#page-content .related-post-date,\
			#page-content .comment-meta a,\
			#page-content .author-share a\
		';

		$( '#page-content a' ).not( selectors ).css( 'color', val );

		var css = '\
			#page-content a:hover {\
				color: '+ asheHex2Rgba( val, 0.8 ) +';\
			}\
			.post-categories {\
				color: '+ val +';\
			}\
		';
		asheStyle( 'colors_content_accent', css );
	});


/*
** General Layouts
*/
	// General
	asheLivePreview( 'general_bg_image', function( val ) {
		$( '#page-wrap' ).css( 'background-image', 'url("'+ val +'")' );
	});

	asheLivePreview( 'general_bg_image_size', function( val ) {
		$( '#page-wrap' ).css( 'background-size', val );
	});

	asheLivePreview( 'general_bg_image_type', function( val ) {
		$( '#page-wrap' ).css( 'background-attachment', val );
	});


/*
** Page Header
*/

	asheLivePreview( 'page_header_bg_image', function( val ) {
		$( '.entry-header' ).css( 'background-image', 'url("'+ val +'")' );
	});

	asheLivePreview( 'page_header_bg_image_size', function( val ) {
		$( '.entry-header' ).css( 'background-size', val );
	});

	asheLivePreview( 'page_header_bg_image_type', function( val ) {
		$( '.entry-header' ).css( 'background-attachment', val );
	});

	asheLivePreview( 'page_header_logo_width', function( val ) {
		$('.header-logo a').css( 'width', val +'px' );
	});


/*
** Custom Functions
*/
	// Previewer
	function asheLivePreview( control, func ) {
		wp.customize( 'ashe_options['+ control +']', function( value ) {
			value.bind( function( val ) {
				func( val );
			} );
		} );
	}

	// convert hex color to rgba
	function asheHex2Rgba( hex, opacity ) {
		if ( typeof(hex) === 'undefined' ) {
		 return;
		}

		var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex ),
			rgba = 'rgba( '+ parseInt( result[1], 16 ) +', '+ parseInt( result[2], 16 ) +', '+ parseInt( result[3], 16 ) +', '+ opacity +')';

		// return converted RGB
		return rgba;
	}

	// Style Tag
	function asheStyle( id, css ) {
		if ( $( '#'+ id ).length === 0 ) {
			$('head').append('<style id="'+ id +'"></style>')
		}

		$( '#'+ id ).text( css );
	}

} )( jQuery );
