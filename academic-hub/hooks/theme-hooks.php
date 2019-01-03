<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Academic Hub
 * @author      Podamibe Nepal
 * @copyright   Copyright (c) 2018, Podamibe Nepal
 * @link        http://podamibenepal.com
 * @since       Academic Hub 1.0.0
 * */


/**
 * Define the version of THA support, in case that becomes useful down the road.
 */
define( 'academic_hub_HOOKS_VERSION', '1.0-draft' );

/**
 * Themes and Plugins can check for academic_hub_hooks using current_theme_supports( 'academic_hub_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 * 		// Declare support for all hook types
 * 		add_theme_support( 'academic_hub_hooks', array( 'all' ) );
 *
 * 		// Declare support for certain hook types only
 * 		add_theme_support( 'academic_hub_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support( 'academic_hub_hooks', array(

	/**
	 * As a Theme developer, use the 'all' parameter, to declare support for all
	 * hook types.
	 * Please make sure you then actually reference all the hooks in this file,
	 * Plugin developers depend on it!
	 */
	'all',

	/**
	 * Themes can also choose to only support certain hook types.
	 * Please make sure you then actually reference all the hooks in this type
	 * family.
	 *
	 * When the 'all' parameter was set, specific hook types do not need to be
	 * added explicitly.
	 */
	'html',
	'body',
	'head',
	'header',
	'content',
	'entry',
	'comments',
	'sidebars',
	'sidebar',
	'footer',

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of THA supplied by the theme
	 * supports Core hooks.
	 */
	//'core',
) );

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 * 		if ( current_theme_supports( 'academic_hub_hooks', 'header' ) )
 * 	  		add_action( 'academic_hub_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool $bool true
 * @param array $args The hook type being checked
 * @param array $registered All registered hook types
 *
 * @return bool
 */
function academic_hub_current_theme_supports( $bool, $args, $registered ) {
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-academic_hub_hooks', 'academic_hub_current_theme_supports', 10, 3 );

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $academic_hub_supports[] = 'html;
 */
function academic_hub_html_before() {
	do_action( 'academic_hub_html_before' );
}
/**
 * HTML <body> hooks
 * $academic_hub_supports[] = 'body';
 */
function academic_hub_body_top() {
	do_action( 'academic_hub_body_top' );
}

function academic_hub_body_bottom() {
	do_action( 'academic_hub_body_bottom' );
}

/**
 * HTML <head> hooks
 *
 * $academic_hub_supports[] = 'head';
 */
function academic_hub_head_top() {
	do_action( 'academic_hub_head_top' );
}

function academic_hub_head_bottom() {
	do_action( 'academic_hub_head_bottom' );
}

/**
 * Semantic <header> hooks
 *
 * $academic_hub_supports[] = 'header';
 */
function academic_hub_top_header_section() {
	do_action( 'academic_hub_top_header' );
}


function academic_hub_header_before() {
	do_action( 'academic_hub_header_before' );
}

function academic_hub_header() {
	do_action( 'academic_hub_header' );
}



function academic_hub_header_after() {
	do_action( 'academic_hub_header_after' );
}

function academic_hub_after_header() {
	do_action( 'academic_hub_after_header' );
}





/**
 * Semantic <content> hooks
 *
 * $academic_hub_supports[] = 'content';
 */
function academic_hub_content_before() {
	do_action( 'academic_hub_content_before' );
}

function academic_hub_content_after() {
	do_action( 'academic_hub_content_after' );
}

function academic_hub_content_top() {
	do_action( 'academic_hub_content_top' );
}

function academic_hub_content_bottom() {
	do_action( 'academic_hub_content_bottom' );
}



/**
 * Comments block hooks
 *
 * $academic_hub_supports[] = 'comments';
 */
function academic_hub_comments_before() {
	do_action( 'academic_hub_comments_before' );
}

function academic_hub_comments_after() {
	do_action( 'academic_hub_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $academic_hub_supports[] = 'sidebar';
 */
function academic_hub_sidebars_before() {
	do_action( 'academic_hub_sidebars_before' );
}

function academic_hub_sidebars_after() {
	do_action( 'academic_hub_sidebars_after' );
}



/**
 * Semantic <footer> hooks
 *
 * $academic_hub_supports[] = 'footer';
 */
function academic_hub_footer_before() {
	do_action( 'academic_hub_footer_before' );
}

function academic_hub_footer() {
	do_action( 'academic_hub_footer' );
}


function academic_hub_footer_after() {
	do_action( 'academic_hub_footer_after' );
}


function academic_hub_pagination(){
	do_action('academic_hub_pagination');
}



/**
 * Homepage Slider Section
 */
function academic_hub_slider() {
	do_action( 'academic_hub_slider' );
}


/**
 * Homepage Notices Section
 */
function academic_hub_notices() {
	do_action( 'academic_hub_notices' );
}

/**
 * Homepage Special Info Section
 */
function academic_hub_special_info() {
	do_action( 'academic_hub_special_info' );
}

/**
 * Homepage Our Teams Section
 */
function academic_hub_our_teams() {
	do_action( 'academic_hub_our_teams' );
}


/**
 * Homepage Event Section
 */
function academic_hub_event() {
	do_action( 'academic_hub_event' );
}



/**
 * Homepage Blog Section
 */
function academic_hub_blog() {
	do_action( 'academic_hub_blog' );
}



/**
 * Homepage About Us Section
 */
function academic_hub_about_us() {
	do_action( 'academic_hub_about_us' );
}






/**
 * Homepage Blog Before main
 */
function academic_hub_before_mainsec() {
	do_action( 'academic_hub_before_mainsec' );
}



/**
 * Homepage Blog After main
 */
function academic_hub_after_mainsec() {
	do_action( 'academic_hub_after_mainsec' );
}