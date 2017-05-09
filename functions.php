<?php
/**
 * Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  basepress
 */

/**
 * Assign the base version to a var
 */
$theme              = wp_get_theme( 'basepress' );
$basepress_version = $theme['Version'];

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function basepress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'basepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'basepress_content_width', 0 );

$base = (object) array(
	'version' => $basepress_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-base.php',
	/*'customizer' => require 'inc/tc/customizer/class-base-customizer.php',*/
);

require 'inc/base-functions.php';
require 'inc/base-template-hooks.php';
require 'inc/base-template-functions.php';


/**
|------------------------------------------------------------------------------
| TODO: Enqueue Admin scripts and styles.
|------------------------------------------------------------------------------
*/

function basepress_admin_scripts() {
	wp_enqueue_style( 'basepress-admin-css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'basepress_admin_scripts' );