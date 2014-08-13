<?php
/**
 * Food Recipes theme admin bar setup
**/
function foodrecipes_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'FasterThemes', 'foodrecipes' ),
	'href' => 'http://fasterthemes.com/',
	'meta' => array('title' => 'FasterThemes', 'class' => 'foodrecipespanel') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'foodrecipes_option',
	'parent' => 'custom_menu',
	'title' => __( 'FT Options', 'foodrecipes' ),
	'href' => $admin_dir .'themes.php?page=fasterthemes_framework',
	'meta' => array('title' => 'Food Recipes - Theme options') ) );


	$wp_admin_bar->add_menu( array(
	'id' => 'foodrecipes_fb',
	'parent' => 'custom_menu',
	'title' => __( 'Become our fan on Facebook', 'foodrecipes' ),
	'href' => 'https://www.facebook.com/faster.themes',
	'meta' => array('target' => 'blank', 'title' => 'Become our fan on Facebook') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'foodrecipes_tw',
	'parent' => 'custom_menu',
	'title' => __( 'Follow us on Twitter', 'foodrecipes' ),
	'href' => 'https://twitter.com/fasterthemes',
	'meta' => array('target' => 'blank', 'title' => 'Follow us on Twitter')
		) );
}
add_action('admin_bar_menu', 'foodrecipes_bar_menu', '999');

function foodrecipes_buy_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
				
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu_theme',
	'title' => __( 'Live Demos', 'foodrecipes' ),
	'href' => 'http://foodrecipes.fasterthemes.com/',
	'meta' => array('target' => 'blank', 'title' => 'Learn more about foodrecipes Theme. ', 'class' => 'foodrecipespanel') ) );

	$wp_admin_bar->add_menu( array(
	'id' => 'foodrecipes_paid',
	'parent' => 'custom_menu_theme',
	'title' => __( 'Foodrecipes PAID', 'foodrecipes' ),
	'href' => 'http://foodrecipes.fasterthemes.com/',
	'meta' => array('target' => 'blank', 'title' => 'Learn more about Foodrecipes PAID') ) );
	
	$wp_admin_bar->add_menu( array(
	'id' => 'foodrecipes_free',
	'parent' => 'custom_menu_theme',
	'title' => __( 'Foodrecipes FREE', 'foodrecipes' ),
	'href' => 'http://wporgfoodrecipes.fasterthemes.com/',
	'meta' => array('target' => 'blank', 'title' => 'Learn more about Foodrecipes FREE')
		) );
}
add_action('admin_bar_menu', 'foodrecipes_buy_menu', '1000');