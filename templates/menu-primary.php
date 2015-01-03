<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly


if (weaverx_getopt( 'm_primary_hide') != 'hide' && !weaverx_is_checked_page_opt('_pp_hide_menus') ) {

	weaverx_clear_both('menu-primary');

	$class = weaverx_menu_class( 'm_primary' );

	$align = weaverx_getopt( 'm_primary_align' );

	$menu_class = 'weaverx-theme-menu wvrx-menu menu-hover';
	if ($align == 'center') {
		$menu_class .= ' wvrx-center-menu';
	} else if ( $align == 'right' ) {
		$menu_class .= ' menu-alignright';
	} else {
		$menu_class .= ' menu-alignleft';
	}

	$loc = apply_filters('weaverx_menu_name','primary');

	$left = weaverx_getopt('m_primary_html_left');
	$right = weaverx_getopt('m_primary_html_right');


	if ( $left ) {
		$hide = ' ' . weaverx_getopt('m_primary_hide_left');
		$left = '<span class="wvrx-menu-html wvrx-menu-left' . $hide .'">' . do_shortcode( $left ) . '</span>';
	}

	if ( $right ) {
		$hide = ' ' . weaverx_getopt('m_primary_hide_right');
		$right = '<span class="wvrx-menu-html wvrx-menu-right ' . $hide . '">' . do_shortcode( $right ) . '</span>';
	} // not needed... else {$right = '<span class="wvrx-menu-clear"></span>'; }

	echo "\n\n<div id=\"nav-primary\" class=\"menu-primary\">\n";
	wp_nav_menu( array(
		'fallback_cb'     => 'weaverx_page_menu',
		'theme_location'  => $loc,
		'menu_class'      => $menu_class,
		'container'       => 'div',
		'container_class' => 'wvrx-menu-container ' . $class,
		'items_wrap'      => $left . $right . '<div class="wvrx-menu-clear"></div><ul id="%1$s" class="%2$s">%3$s</ul><div style="clear:both;"></div>'
	));

	echo "</div><div class='clear-menu-primary-end' style='clear:both;'></div><!-- /.menu-primary -->\n\n";

}
?>
