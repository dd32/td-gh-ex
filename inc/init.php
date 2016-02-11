<?php
/**
 * actions engine room
 *
 * @package actions
 */

/**
 * Setup.
 * Enqueue styles, register widget regions, etc.
 */
require( trailingslashit(get_template_directory()) . 'inc/functions/setup.php' );

/**
 * Structure.
 * Template functions used throughout the theme.
 */
require( trailingslashit(get_template_directory()) . 'inc/structure/markup-functions.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/hooks.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/post.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/page.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/header.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/footer.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/comments.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/template-tags.php');
require( trailingslashit(get_template_directory()) . 'inc/structure/search.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require( trailingslashit(get_template_directory()) . 'inc/functions/extras.php');