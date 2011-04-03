<?php
/**
* Chip Controller
*/

locate_template( array( 'chip/config.php' ), true, false );

/**
* Chip Mehtods
*/

locate_template( array( CHIP_LIFE_FSROOT . 'methods.php' ), true, false );

/**
* Chip Options
*/

locate_template( array( CHIP_LIFE_OPTION_FSROOT . 'options.php' ), true, false );

/**
* Chip Widgets
*/

locate_template( array( CHIP_LIFE_WIDGET_FSROOT . 'chip-social/chip-social.php' ), true, false );

function chip_life_widgets() {	
	register_widget('chip_social');
}

/**
* Chip Sidebars
*/

function chip_life_sidebars() {
	
	register_sidebar( array (
		'name'			=>	'Top Right Sidebar',
		'id'			=>	'top-right-sidebar',
		'before_widget'	=>	'<div id="%1$s" class="sidebarbox sidebarboxw1 chipstyle3 margin10b %2$s"><div class="sidebarboxw1data">',
		'after_widget'	=>	'<br class="clear" /></div></div>',
		'before_title'	=>	'<h2 class="blue chipstyle3 padding5 margin10b">',
		'after_title'	=> '</h2>',
	) );	
	
}

/**
* Chip Menus
*/

function chip_life_menus() {
	register_nav_menus(
		array(
			'primary-menu'		=>	__( 'Primary Menu' ),
			'secondary-menu'	=>	__( 'Secondary Menu' ),
		)
	);
}

/**
* Chip Excerpt Length
*/

function chip_life_excerpt_length( $length ) {
	return 30;
}

function chip_life_continue_reading_link() {
	return '<div class="margin10t"><a href="'. get_permalink() . '" class="more-link">Read More</a></div>';
}

function chip_life_excerpt_length_more( $more ) {
	return ' &hellip;' . chip_life_continue_reading_link();
}

/**
* Chip Remove Gallery CSS
*/

function chip_life_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

/**
* Content Width
*/

if ( !isset( $content_width ) ) {
	$content_width = 555;
}

/**
* Editor Style
*/

add_editor_style();

/**
* Custom Background
*/

add_custom_background();

/**
* Header Logic
*/

define( 'HEADER_TEXTCOLOR', 'ffffff' );
define( 'HEADER_IMAGE', '%s/images/headers/chip_life.jpg' );
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'chip_life_header_image_width', 960 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'chip_life_header_image_height', 200 ) );
define( 'NO_HEADER_TEXT', true );

add_custom_image_header( '', 'chip_life_admin_header_style' );

/**
* Support(s)
*/

add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true );

/**
* Action(s)
*/

add_action( 'admin_init'	, array( 'Chip_Life_Options', 'chip_admin_init' ) );
add_action( 'admin_menu'	, array( 'Chip_Life_Options', 'chip_admin_menu' ) );
add_action( 'init'			, array( 'Chip_Life_Options', 'chip_init_default' ) );

add_action( 'init'			, 'chip_life_menus' );
add_action( 'init'			, 'chip_life_sidebars' );
add_action( 'widgets_init'	, 'chip_life_widgets' );

/**
* Filters(s)
*/

add_filter( 'gallery_style'		, 'chip_life_remove_gallery_css' );
add_filter( 'excerpt_length'	, 'chip_life_excerpt_length' );
add_filter( 'excerpt_more'		, 'chip_life_excerpt_length_more' );

/**
* Global Variable
*/

$chip_life_global = array (		
		'theme_options'	=> get_option( 'chip_life_options' ),
		'chip_image'	=> false,
	);

/**
* Chip Life Admin Header Style
*/

function chip_life_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
.appearance_page_custom-header #headimg {
	width: 960px;
	height: 200px;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}