<?php
/**
 * Silver Quantum ( functions-scripts.php )
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2019. Benjamin Lu
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
		 * This is the main stylesheet that is being enqueue. This should be used rather than using @import stylesheets.
		 */
		wp_enqueue_style( 'silver-quantum-style', get_stylesheet_uri(), array(), '1.0.0' );

		/**
		 * This allows users to comment by clicking on reply so that it gets nested.
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
);

add_action(
	'wp_enqueue_scripts',
	function() {
		$text_color = get_header_textcolor();
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $text_color ) {
			return;
		}
		$value      = display_header_text() ? sprintf( 'color: #%s', esc_html( $text_color ) ) : 'display: none;';
		$custom_css = "
			.site-header .site-branding .site-title a,
			.site-header .site-branding .site-description {
				{$value}
			}
		";
		wp_add_inline_style( 'silver-quantum-style', $custom_css );
	}
);

add_action( 'wp_enqueue_scripts', function() {
	$header_image = esc_url( get_theme_mod( 'header_image', get_theme_file_uri( '/assets/images/header-image.jpg' ) ) );
	$custom_css = "
		.site-header.header-image {
			background-attachment: scroll;
			background: url( {$header_image} );
			background-position: center;
			background-repeat: no-repeat;
			min-height: 5.5em;
			padding: 8em 0;
		}
	";
	wp_add_inline_style( 'silver-quantum-style', $custom_css );
} );