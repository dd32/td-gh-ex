<?php
/**
 * Catchbase functions and definitions
 *
 * Sets up the theme using core catchbase-core and provides some helper functions using catchbase-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package Catchbase
 */

//define theme version
if ( !defined( 'CATCHBASE_THEME_VERSION' ) )
define ( 'CATCHBASE_THEME_VERSION', '1.0' );

/**
 * Implement the core functions for catchbase
 */
require get_template_directory() . '/inc/catchbase-core.php';