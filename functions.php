<?php
/*
|--------------------------
| Chip Controller
|--------------------------
*/

require_once(TEMPLATEPATH . '/chip/config.php');

/*
|--------------------------
| Chip Mehtods
|--------------------------
*/

require_once(CHIP_FSROOT . 'methods.php');

/*
|--------------------------
| Chip Options
|--------------------------
*/

require_once(OPTION_FSROOT . 'options.php');

/*
|--------------------------
| Chip Widgets
|--------------------------
*/

require_once(WIDGET_FSROOT . 'chip-social/chip-social.php');

function chip_widgets() {	
	register_widget('chip_social');
}

/*
|--------------------------
| Chip Sidebars
|--------------------------
*/

function chip_sidebars() {
	
	register_sidebar(array(
		'name'			=>	'Top Right Sidebar',
		'id'			=>	'top-right-sidebar',
		'before_widget'	=>	'<div id="%1$s" class="sidebarbox sidebarboxw1 chipstyle3 margin10b %2$s"><div class="sidebarboxw1data">',
		'after_widget'	=>	'</div></div>',
		'before_title'	=>	'<h2 class="blue chipstyle3 padding5 margin10b">',
		'after_title'	=> '</h2>',
	));	
	
}

/*
|--------------------------
| Chip Menus
|--------------------------
*/

function chip_menus() {
	register_nav_menus(
		array(
			'primary-menu'		=>	__( 'Primary Menu' ),
			'secondary-menu'	=>	__( 'Secondary Menu' ),
		)
	);
}

/*
|--------------------------
| Chip Excerpt Length
|--------------------------
*/

function chip_excerpt_lenght($length) {
	return 30;
}

function chip_excerpt_lenght_more($more) {
	return ' ...';
}

/*
|--------------------------
| Content Width
|--------------------------
*/

if ( !isset( $content_width ) ) {
	$content_width = 555;
}

/*
|--------------------------
| Editor Style
|--------------------------
*/

add_editor_style();

/*
|--------------------------
| Action(s)
|--------------------------
*/

add_action('admin_menu'		, 'chip_theme_page');
add_action('init'			, 'chip_menus');
add_action('init'			, 'chip_sidebars');
add_action('widgets_init'	, 'chip_widgets');

/*
|--------------------------
| Filters(s)
|--------------------------
*/

add_filter('gallery_style'	, create_function('$a', 'return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);'));
add_filter('excerpt_length'	, 'chip_excerpt_lenght');
add_filter('excerpt_more'	, 'chip_excerpt_lenght_more' );

/*
|--------------------------
| Support(s)
|--------------------------
*/

add_theme_support('menus');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150, true );
add_custom_background();

?>