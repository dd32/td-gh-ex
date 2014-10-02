<?php
add_action( 'after_setup_theme', 'bartleby_theme_setup' );
function bartleby_theme_setup() {
	require_once ( get_template_directory() . '/theme-options.php' );
	register_nav_menu( 'main-menu', __( 'Main Menu', 'bartleby' ) );
	register_nav_menu( 'bottom-menu', __( 'Footer Menu', 'bartleby' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'audio', 'chat', 'status', 'image', 'video', 'quote', 'link' ) );
	add_theme_support( 'custom-background', array(
	// Background color default
	'default-color' => 'dedede'
	) );
	add_editor_style('/inc/custom-editor-style.css');
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	function bartleby_new_excerpt_more($more) {
		global $post;
		return '...';
	}
	add_filter('excerpt_more', 'bartleby_new_excerpt_more');
	
	function bartleby_custom_excerpt_length( $length ) {
			$bartleby_options = bartleby_get_theme_options();
		if ( $bartleby_options['elength'] == '0' ) {
			return null;
			} else {
			return $bartleby_options['elength'];
		}
	}
	add_filter( 'excerpt_length', 'bartleby_custom_excerpt_length', 999 );
	
	function bartleby_blank_slate_title($title) {
		if ($title == '') {
		return 'Untitled Post';
		} else {
		return $title;
		}
	}
	add_filter('the_title', 'bartleby_blank_slate_title');
	
	function bartleby_wp_title( $title, $sep ) {
		global $paged, $page;
		if ( is_feed() )
		return $title;
		$title .= get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
		if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'bartleby' ), max( $paged, $page ) );
		return $title;
	}
	add_filter( 'wp_title', 'bartleby_wp_title', 10, 2 );
}
// End theme setup
/* Scripts, Fonts & Styles */

function bartleby_scripts_styles() {
	global $wp_styles;
	$protocol = is_ssl() ? 'https' : 'http';
	wp_register_style( 'bartleby-slab', "$protocol://fonts.googleapis.com/css?family=Josefin+Slab" );
	wp_register_style( 'bartleby-ubuntu', "$protocol://fonts.googleapis.com/css?family=Ubuntu+Condensed" );
	wp_register_style( 'bartleby-foundation-style', get_template_directory_uri() . '/stylesheets/foundation.min.css', 
	array(), 
	'2132013', 
	'all' );
	wp_register_script( 'bartleby-modernizr', get_template_directory_uri() . '/javascripts/modernizr.foundation.js', array(), '1.0', true );
	wp_register_script ('bartleby-comment-class', get_template_directory_uri() . '/javascripts/comment-class.js', array('jquery'), '1.0',true);
	wp_register_script( 'bartleby-navigation', get_template_directory_uri() . '/javascripts/navigation.js', array(), '1.0', true );
	wp_register_script ('bartleby-infinite-scroll', get_template_directory_uri() . '/javascripts/jquery.infinitescroll.js', array('jquery'), '2.0.2', true);
	wp_register_script( 'bartleby-scroll-disable', get_template_directory_uri() . '/javascripts/jquery.scroll-disable.js', array('jquery'), '1.0', true );
	wp_register_script ('bartleby-infinite-scroll-init', get_template_directory_uri() . '/javascripts/infinite-init.js', array('jquery'), '1.0', true);	
	
		// enqueing:
	wp_enqueue_style( 'bartleby-foundation-style' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'bartleby-slab' );
	wp_enqueue_style( 'bartleby-ubuntu' );
	wp_enqueue_script( 'bartleby-navigation');
	wp_enqueue_script( 'bartleby-modernizr');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	$bartleby_options = bartleby_get_theme_options();
	if ( !is_singular() && $bartleby_options['infinite_scroll_disable'] == 'off' ) {
		wp_enqueue_script ('bartleby-infinite-scroll');
		wp_enqueue_script ('bartleby-infinite-scroll-init');
		}
	if ( $bartleby_options['infinite_scroll_disable'] == 'on' ) {
		wp_enqueue_script ('bartleby-scroll-disable');
		}
	wp_enqueue_script ('bartleby-comment-class');
}
add_action( 'wp_enqueue_scripts', 'bartleby_scripts_styles' );

function bartleby_upload_script() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('upload-script', get_template_directory_uri().'/javascripts/upload-script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('upload-script');
}
 
function bartleby_upload_style() {
	wp_enqueue_style('thickbox');
}
 
if (isset($_GET['page']) && $_GET['page'] == 'bartleby_theme_options') {
	add_action('admin_print_scripts', 'bartleby_upload_script');
	add_action('admin_print_styles', 'bartleby_upload_style');
}
/* Sidebar Areas */
function bartleby_register_sidebars() {
register_sidebar(array(
	'name' => __( 'Right Sidebar', 'bartleby' ),
	'id' => 'sidebar',
	'description' => __( 'Widgets in this area will be shown on the right-hand side.', 'bartleby' ),
	'before_widget' => '<div>',
	'after_widget' => '</div>',
	'before_title' => '<div class="sidebar-title-block"><h4 class="sidebar">',
	'after_title' => '</h4></div>',
));
register_sidebar(array(
	'name' => __( 'Below Posts' , 'bartleby' ),
	'id' => 'belowposts-sidebar',
	'description' => __( 'Widgets in this area will be shown beneath the blog post type. Use this for sharing, related articles and more.' , 'bartleby' ),
	'before_title' => '<div class="sidebar-title-block"><h4 class="belowposts">',
	'after_title' => '</h4></div>',
	'before_widget' => '<div class="bottom-widget">',
	'after_widget' => '</div><hr>',
));
}
add_action( 'widgets_init', 'bartleby_register_sidebars' );

// loads _s template tags file
// currently used for comment callback only
require get_template_directory() . '/inc/template-tags.php';