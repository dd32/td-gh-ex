<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * @package WordPress
 * @subpackage weaverx
 */

 $alt_menu = weaverx_get_per_page_value('_pp_alt_mini_menu');

if ( has_nav_menu('header-mini') || $alt_menu != '') {     // weaverx_getopt( 'm_header_mini_hide') != 'hide' &&

	$class = weaverx_menu_class( 'm_header_mini' );

	echo "\n\n<div id=\"nav-header-mini\" class=\"menu-horizontal {$class}\"" . weaverx_schema( 'menu') . ">\n";
	$args = array(
		'fallback_cb'     => '',
		'theme_location'  => 'header-mini',
		'menu_class'      => 'wvrx-header-mini-menu',
		'container'       => 'div',
		'container_class' => ''
	);

	if ( $alt_menu != '' ) {
		$args['theme_location'] = '';
		$args['menu'] = wp_get_nav_menu_object($alt_menu);
	}
	wp_nav_menu( $args ) ;

	weaverx_clear_both('header-mini');
	echo "\n</div><!-- /#nav-header-mini -->\n";
	weaverx_clear_both('nav-header-mini');
}
?>
