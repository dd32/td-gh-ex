<?php
function whitespektrum_setup() {
// Setup Content Width value based on the theme's design and stylesheet.
if (!isset($content_width))
	$content_width = 600;
	
// Add Theme Support for feeds
add_theme_support('automatic-feed-links');

//Header Menu Section
register_nav_menu('header-menu', __('Header Menu', 'whitespektrum'));
	
function whitespektrum_widgets_init() {
	register_sidebar( array (
		'name'              => __('Main Sidebar', 'whitespektrum'),
        'id'			    => 'sidebar-1',	
		'description' 		=>__('Appear Only on Posts', 'whitespektrum'),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	));
	
	register_sidebar( array (
		'name' 			=> __('Page Sidebar', 'whitespektrum'),
		'id'			=> 'sidebar-2',	
		'description' 		=>__('Appear Only on Pages', 'whitespektrum'),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	));

	register_sidebar( array (
		'name' 			=> __('Custom Sidebar', 'whitespektrum'),
		'id'			=> 'sidebar-3',	
		'description' 		=>__('Appear Only on Custom Pages', 'whitespektrum'),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	));
	
	register_sidebar( array (
		'name' 			=> __('Profile Sidebar', 'whitespektrum'),
		'id'			=> 'sidebar-4',	
		'description' 		=>__('Appear Only on Profile Page', 'whitespektrum'),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	));
	
	register_sidebar( array (
		'name' 			=> __('Contact Sidebar', 'whitespektrum'),
		'id'			=> 'sidebar-5',	
		'description' 		=>__('Appear Only on Contact Page', 'whitespektrum'),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	));
}
add_action( 'widgets_init', 'whitespektrum_widgets_init' );
	
function whitespektrum_content_nav() {  
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );
}
	
}
add_action('after_setup_theme', 'whitespektrum_setup');

// Scripts
function whitespektrum_scripts_styles() {
	// Enables Ubuntu Font
        wp_enqueue_style('whitespektrum-style', get_stylesheet_uri());
	wp_enqueue_style('whitespektrum-ubuntu','//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
	
	if (is_singular() && comments_open() && get_option( 'thread_comments' ))
		wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'whitespektrum_scripts_styles');