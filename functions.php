<?php
/*
 * fCorpo functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

if ( ! function_exists( 'fcorpo_setup' ) ) :
/**
 * fCorpo setup.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function fcorpo_setup() {

	load_theme_textdomain( 'fcorpo',  get_stylesheet_directory() . '/languages' );

}
endif; // fcorpo_setup
add_action( 'after_setup_theme', 'fcorpo_setup' );


?>