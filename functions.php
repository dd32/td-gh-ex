<?php

/**
 * bestblog functions and definitions
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 */

/*
 * Set up the content width value based on the theme's design.
 *
 */


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bestblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bestblog_content_width', 1000 );
}
add_action( 'after_setup_theme', 'bestblog_content_width', 0 );



if ( ! function_exists( 'bestblog_setup' ) ) :
//**************bestblog SETUP******************//
function bestblog_setup() {


/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
add_theme_support( 'title-tag' );


// Add default posts and comments RSS feed links to head.
add_theme_support('automatic-feed-links');


// Declare WooCommerce support
add_theme_support( 'woocommerce' );

//Custom Background
add_theme_support( 'custom-background', array(
	'default-color' => 'FFF',

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
		 * Enable support for custom Header image.
		 *
		 *  @since advance
		 */
	$args = array(
			'flex-width'    => true,
			'flex-height'   => true,
			'default-image' => get_template_directory_uri() . '/images/header.jpg',
			'header-text'            => false,
	);
	add_theme_support( 'custom-header', $args );

//Post Thumbnail
add_theme_support( 'post-thumbnails' );

// Enables post and comment RSS feed links to head
add_theme_support('automatic-feed-links');

// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
/*

/*
	 * Enable support for custom logo.
	 *
	 *  @since bestblog
	 */


    $defaults = array(
        'height'      => 80,
        'width'      => 180,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add featured image sizes
    //
    // Sizes are optimized and cropped for landscape aspect ratio
    // and optimized for HiDPI displays on 'small' and 'medium' screen sizes.
    add_image_size( 'bestblog-small', 735, 400, true ); // name, width, height, crop
    add_image_size( 'bestblog-medium', 428, 400, true );
    add_image_size( 'bestblog-large', 735, 400, true );
    add_image_size( 'bestblog-xlarge', 1920, 400, true );
		add_image_size( 'bestblogtop-medium', 540, 400, true );
		add_image_size( 'bestblog-listpost-small', 110, 85, true );
		add_image_size( 'bestblog-xxlarge', 1920, 600, true );


/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If bestblog're building a theme based on bestblog, use a find and replace
		 * to change 'best-blog' to the name of bestblogr theme in all the template files
		 */

load_theme_textdomain('best-blog', get_template_directory() . '/languages');

add_theme_support( 'starter-content', array(

	'posts' => array(
		'home',
		'blog' ,
	),

		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),


		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Navigation(Header)', 'best-blog' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	) );
}
endif; // bestblog_setup
add_action( 'after_setup_theme', 'bestblog_setup' );


 /**
 * The CORE functions for bestblog
 *
 * Stores all the core functions of the template.
 *
 * @package bestblog
 *
 * @since bestblog 1.0
 */


 if (! function_exists('bestblog_the_custom_logo')) :
 /**
	* Displays the optional custom logo.
	*
	* Does nothing if the custom logo is not available.
	*
	* @since bestblog
	*/
 function bestblog_the_custom_logo()
 {
		 if (function_exists('the_custom_logo')) {
				 the_custom_logo();
		 }
 }
 endif;

 /**
	* Filter the except length to 20 characters.
	*
	* @param int $length Excerpt length.
	* @return int (Maybe) modified excerpt length.
	*/
 function bestblog_custom_excerpt_length($length)
 {
		 return 20;
 }
 add_filter('excerpt_length', 'bestblog_custom_excerpt_length', 999);


 /**
	* Filter the excerpt "read more" string.
	*
	* @param string $more "Read more" excerpt string.
	* @return string (Maybe) modified "read more" excerpt string.
	*/
 function bestblog_excerpt_more($more)
 {
		 return '';
 }
 add_filter('excerpt_more', 'bestblog_excerpt_more');


 /**
	* comments meta
	*/
if (! function_exists('bestblog_meta_comment')) :
function bestblog_meta_comment()
{
		if (! post_password_required() && (comments_open() || get_comments_number())) {
				echo '<span class="comments-link">';
				/* translators: %s: post title */
				comments_popup_link(sprintf(wp_kses(__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'best-blog'), array( 'span' => array( 'class' => array() ) )), get_the_title()));
				echo '</span>';
		}
}
endif;




//Load CSS files

function bestblog_scripts() {
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css','font_awesome', true );
wp_enqueue_style( 'bestblog_core', get_template_directory_uri() . '/css/bestblog.min.css' ,'bestblogcore_css', true);
wp_enqueue_style( 'bestblog-fonts', bestblog_fonts_url(), array(), null );
wp_enqueue_style( 'bestblog-style', get_stylesheet_uri() );

 }

 add_action( 'wp_enqueue_scripts', 'bestblog_scripts' );


/**
 * Google Fonts
 */

function bestblog_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in bestblogr language that are not
	* supported by Lato, translate this to 'off'. Do not translate
	* into bestblogr own language.
	*/
	$lato = _x( 'on', 'Lato font: on or off', 'best-blog' );

	/* Translators: If there are characters in your language that are not
	* supported by Ubuntu, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$ubuntu = _x( 'on', 'Ubuntu font: on or off', 'best-blog' );



	    /* Translators: If there are characters in your language that are not
	    * supported by Lora, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $open_sans = _x( 'on', 'Open Sans font: on or off', 'best-blog' );

	    if ( 'off' !== $lato || 'off' !== $ubuntu || 'off' !== bestblog ) {
	        $font_families = array();

	        if ( 'off' !== $ubuntu ) {
	            $font_families[] = 'Ubuntu:400,500,700';
	        }

	        if ( 'off' !== $lato ) {
	            $font_families[] = 'Lato:400,700,400italic,700italic';
	        }

	        if ( 'off' !== $open_sans ) {
	            $font_families[] = 'Open Sans:400,400italic,700';
	        }

	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }

	    return $fonts_url;
	}

//Load Java Scripts
function bestblog_head_js() {
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('bestblog_js',get_template_directory_uri().'/js/bestblog.min.js' ,array('jquery'), true);
wp_enqueue_script('bestblog_other',get_template_directory_uri().'/js/bestblog_other.min.js',array('jquery'), true);

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}
}
add_action('wp_enqueue_scripts', 'bestblog_head_js');



/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bestblog_widgets_init(){
	register_sidebar(array(
	'name'          => __('Right Sidebar', 'best-blog'),
	'id'            => 'right-sidebar',
	'description'   => __('Right Sidebar', 'best-blog'),
	'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-12 medium-6 large-12"><div class="widget_wrap ">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<div class="widget-title "> <h3>',
	'after_title'   => '</h3></div>'
	));

	register_sidebar(array(
	'name'          => __('Footer Widgets', 'best-blog'),
	'id'            => 'foot_sidebar',
	'description'   => __('Widget Area for the Footer', 'best-blog'),
	'before_widget' => '<div id="%1$s" class="widget %2$s widget_wrap footer_widgets_warp cell small-12 medium-6 large-4 align-self-top " ><aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside></div>',
	'before_title'  => '<div class="widget-title "> <h3>',
	'after_title'   => '</h3></div>'
	));

}

add_action( 'widgets_init', 'bestblog_widgets_init' );





/** call widgets */
require_once(get_template_directory() . '/inc/widgets/latest-posts-single.php');

/** Register all navigation menus */
require_once(get_template_directory() . '/functions/menu.php');

/** Image function */
require_once(get_template_directory() . '/functions/function-hooks.php');


//load widgets ,kirki ,customizer,functions
require_once(get_template_directory() . '/inc/kirki/kirki.php');
require_once(get_template_directory() . '/inc/customizer.php');
