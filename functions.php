<?php
/**
 * Chip Life functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, chiplife_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'chip_life_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Chip Life
 * @since Chip Life 1.3.7
 */


/** Chip Configuration / Constants */
locate_template( array( 'chip/config.php' ), true, false );

/** Chip Mehtods */
locate_template( array( CHIP_LIFE_FSROOT . 'methods.php' ), true, false );

/** Set the content width based on the theme's design and stylesheet. */
if ( !isset( $content_width ) ) {
	$content_width = 555;
}

/** Chip Setup */
locate_template( array( CHIP_LIFE_FSROOT . 'setup.php' ), true, false );

/** Chip Header Callback */
locate_template( array( CHIP_LIFE_FSROOT . 'header-callback.php' ), true, false );

/** Chip Slots */
locate_template( array( CHIP_LIFE_FSROOT . 'filter-hooks.php' ), true, false );

/** Register our sidebars and widgetized areas. Also register the chip life widgets. */
locate_template( array( CHIP_LIFE_FSROOT . 'widgets.php' ), true, false );

/** Global Variable */
$chip_life_global = array (		
	'theme_options'	=> get_option( 'chip_life_options' ),
	'chip_image'	=> false,
);

?>

