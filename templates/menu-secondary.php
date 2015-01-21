<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly


$menu = apply_filters('weaverx_menu_name','secondary');
if (weaverx_getopt( 'm_secondary_hide') != 'hide' && has_nav_menu( $menu )  && !weaverx_is_checked_page_opt('_pp_hide_menus') ) {


	$class = weaverx_menu_class( 'm_secondary' );

	$align = weaverx_getopt( 'm_secondary_align' );
	$menu_class = 'weaverx-theme-menu wvrx-menu menu-hover';
	if ($align == 'center') {
		$menu_class .= ' wvrx-center-menu';
	} else if ( $align == 'right' ) {
		$menu_class .= ' menu-alignright';
	} else {
		$menu_class .= ' menu-alignleft';
	}

	$left = weaverx_getopt('m_secondary_html_left');
	$right = weaverx_getopt('m_secondary_html_right');

	if ( $left ) {
		$hide = ' ' . weaverx_getopt('m_secondary_hide_left');
		$left = '<span class="wvrx-menu-html wvrx-menu-left' . $hide .'">' . do_shortcode( $left ) . '</span>';
		$left = str_replace('%','%%',$left);	// wp_nav_menu uses sprintf! This will almost always fix the issue.
	}

	if ( $right ) {
		$hide = ' ' . weaverx_getopt('m_secondary_hide_right');
		$right = '<span class="wvrx-menu-html wvrx-menu-right ' . $hide . '">' . do_shortcode( $right ) . '</span>';
		$right = str_replace('%','%%',$right);	// wp_nav_menu uses sprintf!
	} // else { $right = '<span class="wvrx-menu-clear"></span>'; }

	echo "\n\n<div id=\"nav-secondary\" class=\"menu-secondary\">\n";
	wp_nav_menu( array(
		'fallback_cb'     => '',
		'theme_location'  => $menu,
		'menu_class'      => $menu_class,
		'container'       => 'div',
		'container_class' => 'wvrx-menu-container ' . $class,
		'items_wrap'      => $left . $right . '<div class="wvrx-menu-clear"></div><ul id="%1$s" class="%2$s">%3$s</ul><div style="clear:both;"></div>'
	));

	echo "\n</div><div class='clear-menu-secondary-end' style='clear:both;'></div><!-- /.menu-secondary -->\n\n";
}
?>
