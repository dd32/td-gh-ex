<?php
/* 	SPARK Theme's Functions
	Copyright: 2014-2015, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
 
// 	Load the D5 Framework Optios Page
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	require_once get_template_directory() . '/inc/options.php';
	
// 	Tell WordPress for wp_title in order to modify document title content
	function spark_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'spark_filter_wp_title' );

	function spark_setup() {
//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;

// 	Tell WordPress for the Feed Link
	register_nav_menus( array( 'main-menu' => "Main Menu" ) );
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'spark-category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	}
	
		
// 	WordPress 3.4 Custom Background Support	
	$spark_custom_background = array( 'default-color' => 'ffffff', );
	add_theme_support( 'custom-background', $spark_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$spark_custom_header = array(
	'default-image'          => '', //get_template_directory_uri() . '/images/logo.png',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $spark_custom_header );
	}
	add_action( 'after_setup_theme', 'spark_setup' );

// 	Functions for adding script
	function spark_enqueue_scripts() { 
	wp_enqueue_style('spark-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_style('spark-font-awesome-css', get_template_directory_uri(). '/css/font-awesome.css' );
	if (is_front_page()): 
	wp_enqueue_style('spark-staffs-css', get_template_directory_uri(). '/css/staffs.css' );
	wp_enqueue_script( 'smart-image-effect', get_template_directory_uri(). '/js/smart-image-effect.js', array( 'jquery' ) );
	endif;
	wp_enqueue_script( 'spark-menu-style', get_template_directory_uri(). '/js/menu.js',  array( 'jquery' ) );
	wp_register_style('spark-gfonts', '//fonts.googleapis.com/css?family=Anaheim|Merienda+One|Advent+Pro', false );
	wp_enqueue_style('spark-gfonts');
	wp_enqueue_style('spark-responsive', get_template_directory_uri(). '/style-responsive.css' ); 
	}
	
	add_action( 'wp_enqueue_scripts', 'spark_enqueue_scripts' );


// 	Functions for adding some custom code within the head tag of site
	function spark_custom_code() {
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	
	color: #<?php echo get_header_textcolor(); ?>;
	}
	</style>
	<?php 
	}
	
	add_action('wp_head', 'spark_custom_code');
	

//	function tied to the excerpt_more filter hook.
	function spark_excerpt_length( $length ) {
	global $blExcerptLength;
	if ($blExcerptLength) {
    return $blExcerptLength;
	} else {
    return 80; //default value
    } }
	add_filter( 'excerpt_length', 'spark_excerpt_length', 999 );
	
	function spark_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">Read More ...</a>';
	}
	add_filter('excerpt_more', 'spark_excerpt_more');

	// Content Type Showing
	function spark_content() { the_content('<span class="read-more">Read More ...</span>'); }

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function spark_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'spark_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function spark_widgets_init() {

	register_sidebar( array(
		'name' => 'Primary Sidebar', 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  'Secondary Sidebar', 
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' =>  'Footer Area One', 
		'id' => 'sidebar-3',
		'description' =>  'An optional widget area for your site footer', 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' =>  'Footer Area Two', 
		'id' => 'sidebar-4',
		'description' =>  'An optional widget area for your site footer', 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area Three',
		'id' => 'sidebar-5',
		'description' => 'An optional widget area for your site footer', 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => 'Footer Area Four', 
		'id' => 'sidebar-6',
		'description' => 'An optional widget area for your site footer', 
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'spark_widgets_init' );
	
	
	add_filter('the_title', 'spark_title');
	function spark_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }

