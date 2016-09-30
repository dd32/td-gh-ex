<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package App_Landing_Page
 */

if ( ! function_exists( 'app_landing_page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function app_landing_page_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on App Landing Page, use a find and replace
	 * to change 'app-landing-page' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'app-landing-page', get_template_directory() . '/languages' );\

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'app-landing-page' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
        'status',
        'audio', 
        'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'app_landing_page_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Custom Image Size
	add_image_size( 'app-landing-page-banner', 1366, 750, true );
	add_image_size( 'app-landing-page-featured', 170, 170, true );
    add_image_size( 'app-landing-page-with-sidebar', 750, 340, true );
    add_image_size( 'app-landing-page-without-sidebar', 1140, 437, true );
    add_image_size( 'app-landing-page-features-image-small', 110, 110, true );
    add_image_size( 'app-landing-page-video-image', 795, 450 , true );
    add_image_size( 'app-landing-page-featured-post', 170, 170, true );
    add_image_size( 'app-landing-page-recent-post', 78, 58, true );


    /* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );

}
endif;
add_action( 'after_setup_theme', 'app_landing_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function app_landing_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'app_landing_page_content_width', 750 );
}
add_action( 'after_setup_theme', 'app_landing_page_content_width', 0 );


/**
* Adjust content_width value according to template.
*
* @return void
*/
function app_landing_page_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = app_landing_page_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}


/**
 * Enqueue scripts and styles.
 */
function app_landing_page_scripts() {

	$app_landing_page_query_args = array(
		'family' => 'Lato:400,400italic,700,900,300',
	);

    wp_enqueue_style( 'app-landing-page-google-fonts', add_query_arg( $app_landing_page_query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'jquery.sidr.light', get_template_directory_uri() . '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'app-landing-page-style', get_stylesheet_uri(), array(), APP_LANDING_PAGE_THEME_VERSION );
    
    wp_enqueue_script( 'jquery.sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'jquery.countdown', get_template_directory_uri() . '/js/jquery.countdown.js', array('jquery'), '2.1.0', true );
	wp_enqueue_script( 'equal-height', get_template_directory_uri() . '/js/equal-height.js', array('jquery'), '0.7.0', true );
	wp_enqueue_script( 'nice-scroll', get_template_directory_uri() . '/js/nice-scroll.js', array('jquery'), '3.6.6', true );
    wp_enqueue_script( 'wow-min', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.1.2', true );
    wp_register_script( 'app-landing-page-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), APP_LANDING_PAGE_THEME_VERSION, true );

    $app_landing_page_year = get_theme_mod( 'app_landing_page_date_year' );
    $app_landing_page_month = get_theme_mod( 'app_landing_page_date_month' );
    $app_landing_page_date_odd = get_theme_mod( 'app_landing_page_date_day_odd' );
    $app_landing_page_date_even = get_theme_mod( 'app_landing_page_date_day_even' );
    $app_landing_page_date_leap = get_theme_mod( 'app_landing_page_date_day_leap' );
    $app_landing_page_date_noleap = get_theme_mod( 'app_landing_page_date_day_noleap' );
    $app_landing_page_year_modified = $app_landing_page_year + date('Y') - 1 ;

    if( ( $app_landing_page_year && $app_landing_page_month) && ( $app_landing_page_date_odd || $app_landing_page_date_even || $app_landing_page_date_leap || $app_landing_page_date_noleap ) ) {

	if( ( true == $app_landing_page_date_even ) && ( ( ( ( $app_landing_page_month % 2 ) == 0 ) && ( $app_landing_page_month < 8 )  ) || ( ( ( $app_landing_page_month % 2 ) != 0 ) && ( $app_landing_page_month > 7 ) ) ) && ( $app_landing_page_month != 2 ) && ( true == $app_landing_page_year ) ){ $app_landing_page_date_modified = $app_landing_page_date_even; }
	elseif( ( true == $app_landing_page_date_leap ) && ( $app_landing_page_month == 2 ) && ( ( ( $app_landing_page_year - 1 ) % 4 ) == 0 ) ){ $app_landing_page_date_modified = $app_landing_page_date_leap; }
	elseif( ( true == $app_landing_page_date_noleap ) && ( $app_landing_page_month == 2 ) && ( ( ( $app_landing_page_year - 1 ) % 4 ) != 0 ) ){  $app_landing_page_date_modified = $app_landing_page_date_noleap; }
	else{ $app_landing_page_date_modified = $app_landing_page_date_odd; }

 	$app_landing_page_date =  $app_landing_page_year_modified .'/'. $app_landing_page_month .'/'. $app_landing_page_date_modified; 

    $app_landing_page_array = array(
        'date'      => esc_attr( $app_landing_page_date )
    );

    
    wp_localize_script( 'app-landing-page-custom', 'app_landing_page_data', $app_landing_page_array );
    }
    
    wp_enqueue_script( 'app-landing-page-custom' );
 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'app_landing_page_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function app_landing_page_body_classes( $classes ) {
  
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  // Adds a class of custom-background-image to sites with a custom background image.
  if ( get_background_image() ) {
    $classes[] = 'custom-background-image';
  }
    
  // Adds a class of custom-background-color to sites with a custom background color.
  if ( get_background_color() != 'ffffff' ) {
    $classes[] = 'custom-background-color';
  }

  if(is_page()){
    $app_landing_page_post_class = app_landing_page_sidebar_layout(); 
    if( $app_landing_page_post_class == 'no-sidebar' )
    $classes[] = 'full-width';
  }

  if( !( is_active_sidebar( 'right-sidebar' )) || is_page_template( 'template-home.php' ) || is_404() ) {
      $classes[] = 'full-width'; 
  }

	return $classes;
}
add_filter( 'body_class', 'app_landing_page_body_classes' );


/**
 * Flush out the transients used in app_landing_page_categorized_blog.
 */
function app_landing_page_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'app_landing_page_categories' );
}
add_action( 'edit_category', 'app_landing_page_category_transient_flusher' );
add_action( 'save_post',     'app_landing_page_category_transient_flusher' );

/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function app_landing_page_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

if ( ! function_exists( 'app_landing_page_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function app_landing_page_excerpt_more() {
	return ' &hellip; ';
}

endif;

if ( ! function_exists( 'app_landing_page_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function app_landing_page_excerpt_length( $length ) {
	return 40;
}
endif;

/**
 * Custom CSS
*/
function app_landing_page_custom_css(){
    $custom_css = get_theme_mod( 'app_landing_page_custom_css' );
    if( ! empty( $custom_css ) ){
		echo '<style type="text/css">';
		echo wp_strip_all_tags( $custom_css );
		echo '</style>';
	}
}
