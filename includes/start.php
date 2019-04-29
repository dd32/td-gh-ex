<?php
/**
 * Functions and hooks
 *
 * @package AT_Business
 */

if ( ! function_exists( 'at_business_scripts' ) ) :

	/**
	 * Enqueue scripts and styles.
	 *
	 * @since 1.0.0
	 */
	function at_business_scripts() {
		wp_enqueue_style( 'business-key-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'at-business-style', get_stylesheet_directory_uri() . '/style.css', array( 'business-key-parent' ), '1.0.1' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'at_business_scripts', 99 );

if ( ! function_exists( 'at_business_theme_defaults' ) ) :

	/**
	 * Modify theme option defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Theme option defaults.
	 * @param array Customized theme optiondefaults.
	 */
	function at_business_theme_defaults( $defaults ) {
		$defaults['header_layout']  = 2;
		$defaults['archive_layout'] = 'excerpt-left';

		return $defaults;
	}

endif;

add_filter( 'business_key_filter_default_theme_options', 'at_business_theme_defaults', 99 );
