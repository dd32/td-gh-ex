<?php
/**
 * Admin functions - Functions that add some functionality to WordPress admin panel
 *
 * @package Astra
 * @since 1.0
 */

/**
 * Register menus
 */
if ( ! function_exists( 'ast_register_menu_locations' ) ) {

	/**
	 * Register menus
	 *
	 * @since 1.0
	 */
	function ast_register_menu_locations() {

		/**
		 * Menus
		 *
		 * @var $menus
		 */
		$menus = array(
			'primary' => __( 'Primary Menu', 'astra-theme' ),
		);

		// Footer Menu.
		$small_footer_layout = ast_get_option( 'footer-sml-layout', '', 'footer-sml-layout-1' );
		if ( 'disabled' != $small_footer_layout ) {
			$menus['footer_menu'] = __( 'Footer Menu', 'astra-theme' );
		}

		register_nav_menus( $menus );
	}
}

add_action( 'init', 'ast_register_menu_locations' );

/**
 * Remove More Link Scroll
 */
if ( ! function_exists( 'ast_remove_more_link_scroll' ) ) {

	/**
	 * Remove More Link Scroll
	 *
	 * @since 1.0
	 * @param string $link Link.
	 * @return string Return the link
	 */
	function ast_remove_more_link_scroll( $link ) {
	    return preg_replace( '|#more-[0-9]+|', '', $link );
	}
}

add_filter( 'the_content_more_link', 'ast_remove_more_link_scroll' );
