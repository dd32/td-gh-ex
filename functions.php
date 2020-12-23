<?php
/**
 * Avadanta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Avadanta
 */

if( ! defined( 'ABSPATH' ) )
{
	exit;
}

define('AVADANTA_THEME_DIR', get_template_directory());
define('AVADANTA_THEME_URI', get_template_directory_uri() );

/**
 * Custom Header feature.
 */
require( AVADANTA_THEME_DIR . '/theme-setup.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avadanta_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'avadanta_content_width', 696 );
}
add_action( 'after_setup_theme', 'avadanta_content_width', 0 );	

$theme = wp_get_theme();

require( AVADANTA_THEME_DIR .'/library/customizer/customizer-alpha-color-picker/class-avadanta-customize-alpha-color-control.php');

require( AVADANTA_THEME_DIR . '/library/breadcrumbs-trail.php');

require( AVADANTA_THEME_DIR . '/script/enqueue-scripts.php');

require( AVADANTA_THEME_DIR . '/library/template-functions.php');

require(AVADANTA_THEME_DIR . '/library/template-tags.php');

require(AVADANTA_THEME_DIR . '/library/class-tgm-plugin-activation.php');

require(AVADANTA_THEME_DIR . '/library/hook-tgm.php');

require(AVADANTA_THEME_DIR . '/library/avadanta-typography.php');

require(AVADANTA_THEME_DIR . '/library/customizer/avadanta_customizer_sections.php');

require ( AVADANTA_THEME_DIR . '/library/customizer/avadanta-customizer.php' );

require ( AVADANTA_THEME_DIR . '/library/custom-header.php' );