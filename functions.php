<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'avocation_setup' ) ) :
function avocation_setup() {
	
	// This theme uses wp_nav_menu() in one locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'avocation' ),	
	) );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;
			/*
		 * Make avocation theme available for translation.
		 */

	load_theme_textdomain( 'avocation', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style(array('css/editor-style.css', avocation_font_url()));
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');
	add_theme_support( 'title-tag' );
	add_theme_support('post-thumbnails');

	set_post_thumbnail_size( 640, 428, true );
	add_image_size( 'avocation-latest-post', 748, 500, true );
	add_image_size( 'avocation-latest-post-homepage', 640, 428, true );	
	add_image_size( 'avocation-latest-posts-widget', 50, 50, true );
	/*        
	* Switch default core markup for search form, comment form, and comments        
	* to output valid HTML5.        
	*/
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list',
	));
	// Add support for featured content.
	add_theme_support('featured-content', array(
	   'featured_content_filter' => 'avocation_get_featured_posts',
	   'max_posts' => 6,
	));
	
	add_theme_support( 'custom-header', apply_filters( 'avocation_custom_header_args', array(
	'uploads'       => true,
	'flex-height'   => true,
	'default-text-color' => '#fff',
	'header-text' => true,
	'height' => '120',
	'width'  => '1260'
 	) ) );
	add_theme_support( 'custom-background', apply_filters( 'avocation_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// This theme uses its own gallery styles.       
	add_filter('use_default_gallery_style', '__return_false');
	
	  	
}

endif; // avocation_setup
add_action( 'after_setup_theme', 'avocation_setup' );

add_action('wp_head','avocation_purpose_bg_img_css');
function avocation_purpose_bg_img_css()
{
	$avocation_purpose_image=get_theme_mod('avocation_purpose_image');
	$avocation_header_bg_img=get_theme_mod('avocation-breadcrumbsbg-bg');
	$avocation_footer_bg_img=get_theme_mod('avocation-footerbg-bg');
	if (!empty($avocation_purpose_image)){
		$avocation_purpose_image = esc_url(get_theme_mod('avocation_purpose_image'));
		$avocation_purpose_output="<style> .business-wrap { background :url('".$avocation_purpose_image."');
		background-position: center;} </style>";
		echo $avocation_purpose_output;		
	}
	if (!empty($avocation_header_bg_img)){
		$avocation_header_bg_img = esc_url(get_theme_mod('avocation-breadcrumbsbg-bg'));
		$avocation_header_output="<style>  .breadcrumb-bg { background :url('".$avocation_header_bg_img."'); } </style>";
		echo $avocation_header_output;		
	}
	if (!empty($avocation_footer_bg_img)){
		$avocation_footer_bg_img = esc_url(get_theme_mod('avocation-footerbg-bg'));
		$avocation_footer_output="<style>  .footer-bg{ background :url('".$avocation_footer_bg_img."'); } </style>";
		echo $avocation_footer_output;	
	}
}



/***  excerpt Length ***/ 
function avocation_change_excerpt_more( $avocation_more ) {
    return '<div class="read-more"><a class="theme-btn" href="'. get_permalink() . '" >'.__('READ MORE','avocation').'</a></div>';
}
add_filter('excerpt_more', 'avocation_change_excerpt_more');
function avocation_excerpt_length( $avocation_length ) {
    return 30;
}
add_filter( 'excerpt_length', 'avocation_excerpt_length', 999 );

/* CUSTOM POST WIDGET FOR LATEST POST */
require get_template_directory() . '/functions/popularpost.php';

/* get in touch start */
require get_template_directory() . '/functions/getintouch.php';

/*** Enqueue css and js files ***/
require get_template_directory() . '/functions/enqueue-files.php';

/*** Theme Default Setup ***/
require get_template_directory() . '/functions/theme-default-setup.php';

/*** Breadcrumbs ***/
require get_template_directory() . '/functions/breadcrumbs.php';

/*** Custom Header ***/
require get_template_directory() . '/functions/custom-header.php';

/*** tgm-plugins ***/
require get_template_directory() . '/functions/tgm-plugins.php';

/*** Customizer ***/
require get_template_directory() . '/functions/theme-customizer.php';
