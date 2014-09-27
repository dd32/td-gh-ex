<?php
/* 	Writing Board's Functions
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/



// Load the D5 Framework Optios Page and Meta Page
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// 	Tell WordPress for wp_title in order to modify document title content
	function writingboard_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'writingboard_filter_wp_title' );
	
	function writingboard_setup() {
	//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;
	
	add_theme_support( 'automatic-feed-links' );
  	register_nav_menus( array( 'main-menu' => "Main Menu", 'footer-menu' => "Footer Menu" ) );
	
	add_editor_style('editor-style.css');

// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	add_image_size( 'category-thumb', 750, 350 ); 
	add_image_size( 'slide-thumb', 1100, 550 ); //for featured sliders
	
		
// 	WordPress 3.4 Custom Background Support	
	$writingboard_custom_background = array(
	'default-color'          => 'bbe8ff',
	'default-image'          => get_template_directory_uri() . '/images/background.png'
	);
	add_theme_support( 'custom-background', $writingboard_custom_background );
	
	
// 	WordPress 3.4 Custom Header Support				
	$writingboard_custom_header = array(
	'default-image'          => '',
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
	add_theme_support( 'custom-header', $writingboard_custom_header ); }
	add_action( 'after_setup_theme', 'writingboard_setup' );

// 	Functions for adding script
	function writingboard_enqueue_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_style('writingboard-style', get_stylesheet_uri(), false); 
	wp_register_style('writingboard-gfonts', '//fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic', false );
	wp_enqueue_style('writingboard-gfonts');
	wp_enqueue_style('writingboard-font-awesome-css', get_template_directory_uri(). '/css/font-awesome.css' );
	
    if (is_front_page()):
	wp_enqueue_script( 'writingboard-flex-js', get_template_directory_uri(). '/js/jquery.flexslider-min.js', array( 'jquery' ) );
	wp_enqueue_style('writingboard-flex-css', get_template_directory_uri(). '/css/flexslider.css' );
	endif;
	
	if ( of_get_option('responsive', '1') == '1' ) :  wp_enqueue_style('writingboard-responsive', get_template_directory_uri(). '/style-responsive.css' ); endif;
	
	}
	add_action( 'wp_enqueue_scripts', 'writingboard_enqueue_scripts' );

//Multi-level pages menu  
function writingboard_page_menu() {
	echo '<ul class="m-menu">'; wp_list_pages(array('sort_column'  => 'menu_order, post_title', 'title_li'  => '' )); echo '</ul>';
}
function writingboard_creditline() {
$writingboard_theme_data = wp_get_theme(); $writingboard_author_uri = $writingboard_theme_data->get( 'AuthorURI' ); echo of_get_option('copyright', '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' )) .' <span class="credit">| Writing Board Theme by: <a href="'. $writingboard_author_uri .'" target="_blank"><img  src="' .  get_template_directory_uri() . '/images/d5logofooter.png" /> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span>'; }
function writingboard_ppp() { return array( 'post_type'=> 'post', 'ignore_sticky_posts' => 1, 'posts_per_page'  => 2 ); }

// 	Functions for adding some custom code within the head tag of site
	function writingboard_custom_code() {
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	
	color: #<?php echo get_header_textcolor(); ?>;
	}
	
     <?php
	
	}
	
	add_action('wp_head', 'writingboard_custom_code');
	

//	function tied to the excerpt_more filter hook.
	function writingboard_excerpt_length( $WritingBoardExcerptLength ) {
	global $WritingBoardExcerptLength;
	if ($WritingBoardExcerptLength) {
    return $WritingBoardExcerptLength;
	} else {
    return 75; //default value
    } }
	add_filter( 'excerpt_length', 'writingboard_excerpt_length', 999 );
		
	function writingboard_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . of_get_option('readmore', 'Read More') . '</a>';
	}
	add_filter('excerpt_more', 'writingboard_excerpt_more');
	
// Content Type Showing
	function writingboard_content() {
	if (( of_get_option('contype', '1') != '2' ) || is_page() || is_single() ) : the_content('<span class="read-more">' . of_get_option('readmore', 'Read More') . '</span>');
	else: the_excerpt();
	endif;	
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function writingboard_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'writingboard_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function writingboard_widgets_init() {
	
	register_sidebar( array(
		'name' => 'Front Page Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
	register_sidebar( array(
		'name' => 'Footer Area One',
		'id' => 'sidebar-3',
		'description' => 'An optional widget area for your site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area Two',
		'id' => 'sidebar-4',
		'description' => 'An optional widget area for your site footer',
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
	add_action( 'widgets_init', 'writingboard_widgets_init' );
	
		
	// 	When the post has no post title, but is required to link to the single-page post view.

	add_filter('the_title', 'writingboard_title');
	function writingboard_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else { return $title; } 
    }

add_filter( 'wp_nav_menu_objects', 'writingboard_add_menu_parent_class' );
function writingboard_add_menu_parent_class( $writingboarditems ) {
	
	$writingboardparents = array();
	foreach ( $writingboarditems as $writingboarditem ) {
		if ( $writingboarditem->menu_item_parent && $writingboarditem->menu_item_parent > 0 ) {
			$writingboardparents[] = $writingboarditem->menu_item_parent;
		}
	}
	
	foreach ( $writingboarditems as $writingboarditem ) {
		if ( in_array( $writingboarditem->ID, $writingboardparents ) ) {
			$writingboarditem->classes[] = 'menu-parent-item'; 
		}
	}
	
	return $writingboarditems;    
}

