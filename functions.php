<?php

function arix_scripts() {
	// load main stylesheet
	wp_enqueue_style( 'arix-style', get_stylesheet_uri() );

	// load google fonts
	wp_enqueue_style( 'arix-fonts', 'https://fonts.googleapis.com/css?family=Dosis:300,500', false );

	// load scripts and styles for comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arix_scripts' );



function arix_functions() {
	// add <title> in <head>
	add_theme_support( 'title-tag' );

	// add RSS feed links in <head>
	add_theme_support( 'automatic-feed-links' );

	// featured image support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 1000 );

	// enable html5 features
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption',
	) );

	// custom background image support
	add_theme_support( 'custom-background' , array(
		'default-color'       => 'dce2e5',
		'default-image'       => '%1$s/images/sun-grass.jpg',
		'default-repeat'      => 'no-repeat',
		'default-position-x'  => 'center',
		'default-position-y'  => 'center',
		'default-attachment'  => 'fixed',
	) );

	// custom logo support
	add_theme_support( 'custom-logo', array(
		'height'      => 160,
		'width'       => 460,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// navigation menu
	register_nav_menus( array(
	    'main_menu' => __( 'Main Menu', 'arix' )
	) );

	// post editor css
	add_editor_style();
}
add_action( 'after_setup_theme', 'arix_functions' );




// widget areas
function arix_widgets() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'arix' ),
		'id'            => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => "</h3>\n",
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'arix' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget one-third %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => "</h3>\n",
	) );
}
add_action( 'widgets_init', 'arix_widgets' );




// content width
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}





// numeric page nav
function arix_page_nav() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	echo '<nav class="pagination">';
	echo paginate_links( array(
		'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
		'format'    => '',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'list',
		'end_size'  => 3,
		'mid_size'  => 3,
	) );
	echo '</nav>';
}






// visual editor font
function arix_add_editor_font() {
    add_editor_style( '//fonts.googleapis.com/css?family=Dosis:300,500' );
}
add_action( 'after_setup_theme', 'arix_add_editor_font' );

// visual editor style
function arix_editor_styles() {
	add_editor_style();
}
add_action( 'admin_init', 'arix_editor_styles' );





?>