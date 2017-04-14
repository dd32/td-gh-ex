<?php
/**
 * Admin functions - Functions that add some functionality to WordPress admin panel
 *
 * @package Astra
 * @since 1.0.0
 */

/**
 * Register menus
 */
if ( ! function_exists( 'ast_register_menu_locations' ) ) {

	/**
	 * Register menus
	 *
	 * @since 1.0.0
	 */
	function ast_register_menu_locations() {

		/**
		 * Menus
		 */
		register_nav_menus( array(
			'primary'     => __( 'Primary Menu', 'astra' ),
			'footer_menu' => __( 'Footer Menu', 'astra' ),
		) );
	}
}

add_action( 'init', 'ast_register_menu_locations' );
