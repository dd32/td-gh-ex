<?php
/* 	Small Business Theme's Functions
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/
  
	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	function smallbusiness_about_page() { 
	add_theme_page( 'Small Business Options', 'Small Business Options', 'edit_theme_options', 'theme-about', 'smallbusiness_theme_about' ); 
	}
	add_action('admin_menu', 'smallbusiness_about_page');
	function smallbusiness_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }	
	function smallbusiness_ppp() { return array( 'post_type'=> 'post', 'ignore_sticky_posts' => 1, 'posts_per_page'  => 2 ); }
	function smallbusiness_setup() {
	load_theme_textdomain( 'small-business', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
  	register_nav_menus( array( 'main-menu' => __( 'Main Menu', 'small-business' ), 'top-menu' => __( 'Top Menu', 'small-business' ) ) );

//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 650;
	add_theme_support( "title-tag" );
	
	add_editor_style('editor-style.css');

// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'slide-thumb', 930, 354 ); //for featured sliders
	
		
// 	WordPress 3.4 Custom Background Support	
	$smallbusiness_custom_background = array(
	'default-color'          => 'AAAAAA',
	'default-image'          => '',
	);
	add_theme_support( 'custom-background', $smallbusiness_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$smallbusiness_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => 'B81005',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $smallbusiness_custom_header ); }
	add_action( 'after_setup_theme', 'smallbusiness_setup' );

// 	Functions for adding script
	function smallbusiness_enqueue_scripts() {
	wp_enqueue_style('smallbusiness-style', get_stylesheet_uri(), false, '1.7');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script( 'smallbusiness-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_enqueue_style('smallbusiness-gfonts', '//fonts.googleapis.com/css?family=Coda:400', false );
	wp_enqueue_script( 'slider-main', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ) );
	}
	add_action( 'wp_enqueue_scripts', 'smallbusiness_enqueue_scripts' );
	
// 	Functions for adding script to Admin Area
	function smallbusiness_admin_style() { wp_enqueue_style( 'smallbusiness_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'smallbusiness_admin_style' );

// 	Functions for adding some custom code within the head tag of site
	function smallbusiness_custom_code() {
	
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	
	color: #<?php echo get_header_textcolor(); ?>;
	}
	
	.entrytext {
    background: <?php if (is_page()): echo 'transparent;'; endif; ?>
    padding: 10px 0;
	}
	
	</style>
	
	<?php 
	
}
	
	add_action('wp_head', 'smallbusiness_custom_code');
	

//	function tied to the excerpt_more filter hook.
	function smallbusiness_excerpt_length( $length ) {
	global $sbExcerptLength;
	if ($sbExcerptLength) {
    return $sbExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'smallbusiness_excerpt_length', 999 );
	
	function smallbusiness_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">'.__('Read the rest of this page &raquo;', 'small-business').'</a>';
	}
	add_filter('excerpt_more', 'smallbusiness_excerpt_more');

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function smallbusiness_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'smallbusiness_page_menu_args' );
	function smallbusiness_credit() {
		echo '&nbsp;| Small Business Theme by: <a href="'.esc_url('http://d5creation.com').'" target="_blank"><img  width="30px" src="' . get_template_directory_uri() . '/images/d5logofooter.png" /> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a>';
	}

//	Registers the Widgets and Sidebars for the site
	function smallbusiness_widgets_init() {

	
	register_sidebar( array(
		'name' => __('Front Page Sidebar','small-business'), 
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __('Main Sidebar','small-business'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
	register_sidebar( array(
		'name' => __('Footer Area One','small-business'), 
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Two','small-business'), 
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three','small-business'), 
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
	}
	add_action( 'widgets_init', 'smallbusiness_widgets_init' );
		
	// 	When the post has no post title, but is required to link to the single-page post view.

	add_filter('the_title', 'smallbusiness_title');
	function smallbusiness_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else { return $title; } 
    }

//	Remove WordPress Custom Header Support for the theme smallbusiness
//	remove_theme_support('custom-header');