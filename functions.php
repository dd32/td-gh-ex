<?php
/**
 * adbooster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adbooster
 */

/**
 * Assign the adbooster version to a var
 */
$theme              = wp_get_theme( 'adbooster' );
$adbooster_version = $theme->get('Version');
$adbooster_slug = $theme->get('adbooster');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$azonbooster = (object) array(
	'version' => $adbooster_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-adbooster.php',
	'customizer' => require 'inc/customizer/class-customizer.php',
);
require 'inc/class-tgm-plugin-activation.php';

require 'inc/functions.php';
require 'inc/template-hooks.php';
require 'inc/template-functions.php';
require 'inc/customizer/class-customizer-output.php';
require 'inc/customizer/class-homepage-ouput.php';