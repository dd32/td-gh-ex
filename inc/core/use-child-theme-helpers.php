<?php
/**
 * Generate child theme
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0
 */

/**
 * Display Use Child theme warning on add admin pages
 */
function ast_child_enable_notice_on_all_pages() {
	$screen = get_current_screen();
	return $screen->id;
}

add_filter( 'uct_admin_notices_screen_id', 'ast_child_enable_notice_on_all_pages' );

/**
 * Added below code in functions.php template for the child theme
 */
function astra_child_theme_functions_php_code() {

	ob_start();

	echo '<?php' . PHP_EOL . PHP_EOL;

	?>
function child_enqueue_styles() {

	wp_enqueue_style( 'ast-child-style', get_stylesheet_directory_uri() . '/style.css', array('ast-theme-css'), AST_THEME_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );
	<?php

	$output = ob_get_clean();

	return $output;
}

add_filter( 'astra_child_theme_functions_php', 'astra_child_theme_functions_php_code' );
