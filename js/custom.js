/*
 * Custom v1.0
 * ThemeCot.com
 *
 * Copyright (c) 2013-2014 ThemeCot.com
 *
 * License: GNU General Public License v2 or later
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 */

( function( $ ) {

	var aileron = {

		// Menu
		menuInit: function() {

			// Superfish Menu
			$( 'ul.sf-menu' ).superfish({
				delay: 			1200,
				animation: 		{ opacity : 'show', height : 'show' },
				speed: 			'fast',
				autoArrows: 	false,
				cssArrows: 		true
			});

		},

		// CSS3 Animation
		animationInit: function() {

			// On Hover
			$( '.img-postlist, .img-featured' ).hover(
				function() {
					$( this ).addClass( 'img-grayscale' );
				}, function() {
					$( this ).removeClass( 'img-grayscale' );
				}
			);

		},

		// Fitvids
		fitvidsInit: function() {

			// Fitvids - For responsive videos
			setTimeout( function() {
				$( '.entry-content' ).fitVids();
			}, 500 );

		}

	}

	/** Document Ready */
	$( document ).ready( function() {

		// Menu
		aileron.menuInit();

		// CSS3 Animation
		aileron.animationInit();

		// Fitvids - For responsive videos
		aileron.fitvidsInit();

	} );

} )( jQuery );