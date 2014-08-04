<?php
/**
 * Top Mag theme admin bar setup
**/
function topmag_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'FasterThemes', 'topmag' ),
	'href' => 'http://fasterthemes.com/',
	'meta' => array('title' => 'FasterThemes', 'class' => 'topmagpanel') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'topmag_option',
	'parent' => 'custom_menu',
	'title' => __( 'FT Options', 'topmag' ),
	'href' => $admin_dir .'themes.php?page=fasterthemes_framework',
	'meta' => array('title' => 'Top Mag - Theme options') ) );


	$wp_admin_bar->add_menu( array(
	'id' => 'topmag_fb',
	'parent' => 'custom_menu',
	'title' => __( 'Become our fan on Facebook', 'topmag' ),
	'href' => 'https://www.facebook.com/faster.themes',
	'meta' => array('target' => 'blank', 'title' => 'Become our fan on Facebook') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'topmag_tw',
	'parent' => 'custom_menu',
	'title' => __( 'Follow us on Twitter', 'topmag' ),
	'href' => 'https://twitter.com/fasterthemes',
	'meta' => array('target' => 'blank', 'title' => 'Follow us on Twitter')
		) );
}
add_action('admin_bar_menu', 'topmag_bar_menu', '999');

function topmag_buy_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
				
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu_theme',
	'title' => __( 'Live Demos', 'topmag' ),
	'href' => 'http://fasterthemes.com/',
	'meta' => array('target' => 'blank', 'title' => 'Learn more about TopMag Theme. ', 'class' => 'topmagpanel') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'topmag_pro',
	'parent' => 'custom_menu_theme',
	'title' => __( 'Top Mag PRO', 'topmag' ),
	'href' => 'http://topmagpro.fasterthemes.com',
	'meta' => array('target' => 'blank', 'title' => 'Learn more about TopMag PRO') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'topmag_free',
	'parent' => 'custom_menu_theme',
	'title' => __( 'Top Mag FREE', 'topmag' ),
	'href' => 'http://topmagfree.fasterthemes.com',
	'meta' => array('target' => 'blank', 'title' => 'Learn more about TopMag FREE')
		) );
}
add_action('admin_bar_menu', 'topmag_buy_menu', '1000');