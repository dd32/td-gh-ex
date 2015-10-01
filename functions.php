<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core gridalicious-core and provides some helper functions using gridalicious-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

//define theme version
if ( !defined( 'GRIDALICIOUS_THEME_VERSION' ) )
define ( 'GRIDALICIOUS_THEME_VERSION', '1.3' );

/**
 * Implement the core functions
 */
require get_template_directory() . '/inc/gridalicious-core.php';