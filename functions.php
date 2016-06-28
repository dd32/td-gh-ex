<?php	

/**
 * advance functions and definitions
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
function advance_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'advance_content_width', 1000 );
}
add_action( 'after_setup_theme', 'advance_content_width', 0 );



if ( ! function_exists( 'advance_setup' ) ) :
//**************advance SETUP******************//
function advance_setup() {


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



//Post Thumbnail	
add_theme_support( 'post-thumbnails' );

//Register Menus
register_nav_menus( array(
		'primary' => __( 'Primary Navigation(Header)', 'advance' ),
		
	) );

// Enables post and comment RSS feed links to head
add_theme_support('automatic-feed-links');

/*
	 * Enable support for custom logo.
	 *
	 *  @since advance
	 */
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width' => true,
		
	) );
	add_theme_support( 'custom-logo', array(
   'header-text' => array( 'site-title', 'site-description' ),
) );
	

/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on advance, use a find and replace
		 * to change 'advance' to the name of your theme in all the template files
		 */
		 
load_theme_textdomain('advance', get_template_directory() . '/languages');  
 
 
}
endif; // advance_setup
add_action( 'after_setup_theme', 'advance_setup' );



if ( ! function_exists( 'advance_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since advance
 */
function advance_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/* advance first image */

function advance_catch_that_image() {
global $post, $posts;
$advancefirst_img = esc_url('');
ob_start();
ob_end_clean();
if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){
$advancefirst_img = $matches [1] [0];
return $advancefirst_img;
}
else {
$advancefirst_img = esc_url(get_template_directory_uri()."/images/blank1.jpg");
return $advancefirst_img;
}
}



/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function advance_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'advance_custom_excerpt_length', 999 ); 

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function advance_excerpt_more( $more ) {
    return '.....';
}
add_filter( 'excerpt_more', 'advance_excerpt_more' );

 

//Load CSS files

function advance_scripts() {
wp_enqueue_style( 'advance-style', get_stylesheet_uri() );	
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css','font_awesome', true );
wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css','foundation_css', true );
wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css','animate_css', true );
wp_enqueue_style( 'advance_mobile', get_template_directory_uri() . '/css/safree-mobile.css' ,'advancemobile_css', true);
wp_enqueue_style( 'sidrcss', get_template_directory_uri() . '/css/jquery.sidr.dark.css' ,'mobilemenu', true);
wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' ,'normalize_css', true);
wp_enqueue_style( 'advance-fonts', advance_fonts_url(), array(), null );

$advance_header_checkbox = get_theme_mod('advance_header_checkbox',1);
if( isset($advance_header_checkbox) && $advance_header_checkbox == 0 ){
wp_enqueue_style( 'advance_header_check', get_template_directory_uri() . '/css/customcss/header_checkbox.css' ,'header_check', true);

}
$advance_body_layout = get_theme_mod('advance_body_layout',0);
if( isset($advance_body_layout) && $advance_body_layout == 1 ){
wp_enqueue_style( 'advance_body_check', get_template_directory_uri() . '/css/customcss/body_layout.css' ,'body_layout', true);

}
$advance_sticky_menu = get_theme_mod('advance_sticky_menu',1);
if( isset($advance_sticky_menu) && $advance_sticky_menu == 0 ){
wp_enqueue_style( 'advance_sticky_check', get_template_directory_uri() . '/css/customcss/sticky_menu.css' ,'sticky_menu', true);

}
$advance_mobile_slider = get_theme_mod('advance_mobile_slider',1);
if( isset($advance_mobile_slider) && $advance_mobile_slider == 0 ){
wp_enqueue_style( 'advance_mobileslider_check', get_template_directory_uri() . '/css/customcss/mobile_slider.css' ,'mobile_slider', true);

}
$advance_mobile_sidebar = get_theme_mod('advance_mobile_sidebar',1);
if( isset($advance_mobile_sidebar) && $advance_mobile_sidebar == 0 ){
wp_enqueue_style( 'advance_mobilesidebar_check', get_template_directory_uri() . '/css/customcss/mobile_sidebar.css' ,'mobile_sidebar', true);

} 
 }
 
 add_action( 'wp_enqueue_scripts', 'advance_scripts' );


/**
 * Google Fonts
 */

function advance_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Lato, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$Roboto = _x( 'on', 'Roboto font: on or off', 'advance' );

	/* Translators: If there are characters in your language that are not
	* supported by Noto Serif, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$Roboto_serif = _x( 'on', 'Roboto Sans Serif font: on or off', 'advance' );

	if ( 'off' !== $Roboto || 'off' !== $Roboto_serif ) {
		$font_families = array();

		if ( 'off' !== $Roboto ) {
			$font_families[] = 'Roboto:400,400italic,700,700italic';
		}

		if ( 'off' !== $Roboto_serif ) {
			$font_families[] = 'Roboto :400,400italic,700,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Add Google Fonts, editor styles to WYSIWYG editor
 */
function advance_editor_styles() {
	add_editor_style( array( 'editor-style.css', advance_fonts_url() ) );
}
add_action( 'after_setup_theme', 'advance_editor_styles' );



//Load Java Scripts 
function advance_head_js() { 
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('advance_js',get_template_directory_uri().'/js/advance.js' ,array('jquery'), true);
wp_enqueue_script('advance_other',get_template_directory_uri().'/js/advance_other.js',array('jquery'), true);
 
        # Let's make sure we don't load our pre-loader script in the customizer
        global $wp_customize;

	    # Preloader Enabled ?
        $advance_body_preloder = get_theme_mod('advance_body_preloder', '1');

        if ( !isset( $wp_customize ) && $advance_body_preloder == '1' ) {
            wp_enqueue_script('advance_preloder',get_template_directory_uri().'/js/advance-preloder.js',array('jquery'), true);
        } else {
          wp_enqueue_style( 'advance_preloder', get_template_directory_uri() . '/css/preloder.css' ,'advance_preloder', true); 
        }
wp_enqueue_script('wow',get_template_directory_uri().'/js/wow.js',array('jquery'), true);
wp_enqueue_script('sidr',get_template_directory_uri().'/js/jquery.sidr.min.js',array('jquery'), true);
wp_enqueue_script('matchHeight',get_template_directory_uri().'/js/jquery.matchHeight.js',array('jquery'), true);

$advance_Static_Sliderpara = get_theme_mod('advance_Static_Sliderpara',1);
if( isset($advance_Static_Sliderpara) && $advance_Static_Sliderpara == 1 ):
wp_enqueue_script('advance_StaticSliderh',get_template_directory_uri().'/js/halfparallax.js',array('jquery'), true);
endif;
if( isset($advance_Static_Sliderpara) && $advance_Static_Sliderpara == 0 ):
wp_enqueue_script('advance_StaticSlider',get_template_directory_uri().'/js/headerParallax.js',array('jquery'), true);
endif;
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}
}
add_action('wp_enqueue_scripts', 'advance_head_js');


/**
 * Load css for widgets
 */

function advance_admin_style() {
  wp_enqueue_style('advance_widgets_custom_css', get_template_directory_uri() . '/css/advance_widgets_custom_css.css');
	wp_enqueue_style( 'advance_fontawesome_custom_css', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css' );
	
	}
add_action('admin_enqueue_scripts', 'advance_admin_style');


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function advance_widgets_init(){
	register_sidebar(array(
	'name'          => __('Right Sidebar', 'advance'),
	'id'            => 'sidebar',
	'description'   => __('Right Sidebar', 'advance'),
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_wrap">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Footer Widgets', 'advance'),
	'id'            => 'foot_sidebar',
	'description'   => __('Widget Area for the Footer', 'advance'),
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="medium-3 columns">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Frontpage widget area ', 'advance'),
	'id'            => 'sidebar_frontpage',
	'description'   => __('With advance Free you can only add 3 widgets to this Area. Upgrade to PRO to add unlimited Widgets.', 'advance'),
	'before_widget' => '',
	'after_widget'  => '',
		));
		
		

	
}

add_action( 'widgets_init', 'advance_widgets_init' );

		
 


//load widgets ,kirki ,customizer
require_once(get_template_directory() . '/inc/kirki/kirki.php');
require_once(get_template_directory() . '/inc/customizer.php');
require_once(get_template_directory() . '/inc/widgets.php');
require(get_template_directory() . '/inc/upsell.php');
require_once(get_template_directory() . '/inc/extra.php');
require_once(get_template_directory() . '/inc/about-theme.php');
require_once(get_template_directory() . '/inc/widgets/advance_serviceblock.php');
if ( is_admin() ) {
require_once(get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php');
}
