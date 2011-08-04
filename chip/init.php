<?php
/** Chip Life Constants */
add_action( 'chip_life_init', 'chip_life_constants' );
function chip_life_constants() {

	/** Define Theme Info Constants */
	define( 'PARENT_THEME_NAME', 'Chip Life' );
	define( 'PARENT_THEME_VERSION', '2.0' );

	/** Define Directory Location Constants */
	define( 'PARENT_DIR', get_template_directory() );
	define( 'CHILD_DIR', get_stylesheet_directory() );
	define( 'CHIP_LIFE_CHIP_DIR', PARENT_DIR . '/chip' );

	/** Define URL Location Constants */
	define( 'PARENT_URL', get_template_directory_uri() );
	define( 'CHILD_URL', get_stylesheet_directory_uri() );
	define( 'CHIP_LIFE_CHIP_URL', PARENT_URL . '/chip' );

}

/** Chip Life Framework */
add_action( 'chip_life_init', 'chip_life_framework' );
function chip_life_framework() {

	/** Load Functions */
	require_once( CHIP_LIFE_CHIP_DIR . '/functions/general.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/functions/layout.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/functions/image.php' );		
	require_once( CHIP_LIFE_CHIP_DIR . '/functions/shortcodes.php' );		
	require_once( CHIP_LIFE_CHIP_DIR . '/functions/filters.php' );
	
	/** Load Structure */
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/setup.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/menu.php' );	
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/custom-header.php' );			
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/header.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/sidebar.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/loops.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/post.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/post-related.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/content.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/comments.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/sponsors.php' );
	require_once( CHIP_LIFE_CHIP_DIR . '/structure/footer.php' );		
	
	/** Load Widgets */
	require_once( CHIP_LIFE_CHIP_DIR . '/widgets/widgets.php' );				
	
	/** Load CSS */
	require_once( CHIP_LIFE_CHIP_DIR . '/css/styles.php' );
	
	/** Load Javascript */
	require_once( CHIP_LIFE_CHIP_DIR . '/js/scripts.php' );		
	
	/** Load Framework */
	require_once( CHIP_LIFE_CHIP_DIR . '/framework.php' );	

}

/** Run chip_life_init Hook */
do_action( 'chip_life_init' );

/** Run chip_life_setup Hook */
do_action( 'chip_life_setup' );
?>