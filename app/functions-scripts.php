<?php
/**
 * Silver Quantum ( functions-scripts.php )
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace SilverQuantum;

/**
 * Enqueue Scripts and Styles
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		/**
		 * Rather than enqueue the main stylesheet, we are going to enqueue sceen.css since all of the styles will
		 * go here. We only need parse the information for the Theme in style.css so that it can be activated.
		 */
		wp_enqueue_style( 'silver-quantum-screen', get_theme_file_uri( 'public/css/screen.css' ), array(), '1.0.0' );

		/**
		 * We will be enqueue the app.js file, which mainly be for the navigation only.
		 */
		wp_enqueue_script( 'silver-quantum-app', get_theme_file_uri( 'public/js/app.js' ), array('jquery'), '1.0.0', true );

		/**
		 * This allows users to comment by clicking on reply so that it gets nested.
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
);

add_action( 'wp_enqueue_scripts', function() {
	$text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $text_color ) {
		return;
	}
	$value      = display_header_text() ? sprintf( 'color: #%s', esc_html( $text_color ) ) : 'display: none;';
	$custom_css = "
		.site-branding .site-title a,
		.site-description {
			{$value}
		}
	";
	wp_add_inline_style( 'silver-quantum-screen', $custom_css );
} );

add_action( 'wp_enqueue_scripts', function() {
	$header_image = esc_url( get_theme_mod( 'header_image', get_theme_file_uri( '/public/images/header-image.jpg' ) ) );

	$custom_css = "
		.site-header.header-image {
			background-attachment: scroll;
			background: url( {$header_image} );
			background-position: center;
			background-repeat: no-repeat;
			padding: 9em;
		}

		@media screen and ( max-width: 20em ) {
			.site-header.header-image {
				padding: 2.5em;
			}

			.site-header .site-branding .site-title a {
				font-size: 1em;
			}
		}

		@media screen and ( min-width: 20.063em ) and ( max-width: 30em ) {
			.site-header.header-image {
				padding: 3em;
			}

			.site-header .site-branding .site-title a {
				font-size: 1.125em;
			}
		}

		@media screen and ( min-width: 30.063em ) and ( max-width: 37.5em ) {
			.site-header.header-image {
				padding: 3em;
			}

			.site-header .site-branding .site-title a {
				font-size: 1.250em;
			}
		}

		@media screen and ( min-width: 37.563em ) and ( max-width: 48em ) {
			.site-header.header-image {
				padding: 5em;
			}

			.site-header .site-branding .site-title a {
				font-size: 1.250em;
			}
		}

		@media screen and ( min-width: 48.063em ) and ( max-width: 64em ) {
			.site-header.header-image {
				padding: 6em;
			}

			.site-header .site-branding .site-title a {
				font-size: 1.5em;
			}
		}
	";
	wp_add_inline_style( 'silver-quantum-screen', $custom_css );
} );

add_action(
	'enqueue_block_editor_assets',
	function() {
		wp_enqueue_style( 'silver-quantum-custom-fonts', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/fonts/custom-fonts.css' ), array(), '1.0.0' );
	}
);