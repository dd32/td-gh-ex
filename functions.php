<?php
/**
 * conica functions and definitions
 *
 * @package Conica
 */

define( 'KAIRA_THEME_VERSION' , '1.1' );

// Adding the Redux Framework
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/framework/cx-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/cx-config.php' );
}

global $cx_framework_options;

// Theme Widgets
include get_template_directory() . '/includes/widgets.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'conica_setup_theme' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function conica_setup_theme() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Conica, use a find and replace
	 * to change 'conica' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'conica', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'conica' ),
        'header-bar-menu' => __( 'Header Bar Menu (Header Layout Two)', 'conica' )
	) );

	add_theme_support('post-thumbnails');
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size('blog_standard_img', 580, 380, true );
    }
	
	// The custom header is used for the logo
	add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/images/conica_logo.png',
		'width'         => 300,
		'height'        => 110,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => false,
	));
	
	add_editor_style();

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
    add_theme_support( 'custom-background', array( 'default-color' => '#F5F5F5', ) );
    
    add_theme_support( 'woocommerce' );
}
endif; // kaira_setup
add_action( 'after_setup_theme', 'conica_setup_theme' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function conica_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'conica' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar(array(
		'name' => __('conica Footer', 'conica'),
		'id' => 'site-footer',
	));
	
    register_widget( 'conica_banner' );
    register_widget( 'conica_carousel' );
    register_widget( 'conica_heading' );
    register_widget( 'conica_icon' );
}
add_action( 'widgets_init', 'conica_widgets_init' );

if(!function_exists('conica_footer_widget_params')):
/**
 * Set the widths of the footer widgets
 *
 * @param $params
 * @return mixed
 * 
 * @filter dynamic_sidebar_params
 */
function conica_footer_widget_params($params){
	// Check that this is the footer
	if($params[0]['id'] != 'site-footer') return $params;

	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']);

	return $params;
}
endif;
add_filter('dynamic_sidebar_params', 'conica_footer_widget_params');

function conica_print_styles(){
    global $cx_framework_options;
    $custom_css = $cx_framework_options['cx-options-custom-css'];
    
    $primary_color = $cx_framework_options['cx-options-primary-color'];
    $primary_color_hover = $cx_framework_options['cx-options-primary-hover-color']; ?>
    <style type="text/css" media="screen">
        .conica-button,
        .post .conica-blog-permalink-btn,
        .search article.page .conica-blog-permalink-btn,
        .wpcf7-submit,
        
        .navigation-main li:hover > a span,
        li.current_page_item > a span,
        li.current_page_ancestor > a span,
        
        #conica-home-slider-prev,
        #conica-home-slider-next,
        #conica-home-slider-pager a.selected span,
        .conica-carousel-arrow-prev,
        .conica-carousel-arrow-next {
            background-color: <?php echo $primary_color; ?>;
        }
        .search-block .search-submit {
            background-color: <?php echo $primary_color; ?>;
        }
        .site-title a,
        .menu-toggle,
        .entry-content a,
        .conica-blog-standard-block a,
        .widget ul li a,
        #comments .logged-in-as a,
        .conica-heading i,
        .conica-heading b,
        .conica-banner-heading h3 b,
        .conica-banner-heading h5 b {
            color: <?php echo $primary_color; ?>;
        }
        .conica-button:hover,
        .wpcf7-submit:hover,
        .post .conica-blog-permalink-btn:hover,
        .search article.page .conica-blog-permalink-btn:hover,
        #conica-home-slider-prev:hover,
        #conica-home-slider-next:hover,
        .conica-carousel-arrow-prev:hover,
        .conica-carousel-arrow-next:hover {
            background-color: <?php echo $primary_color_hover; ?>;
        }
        .entry-content a:hover,
        h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
        .conica-blog-standard-block a:hover,
        #comments .logged-in-as a:hover,
        .widget .tagcloud a:hover,
        .widget ul li a:hover {
            color: <?php echo $primary_color_hover; ?>;
        }
        <?php echo ($custom_css) ? $custom_css : ''; ?>
    </style>
    <?php
}
add_action('wp_head', 'conica_print_styles', 11);

/**
 * Enqueue scripts and styles
 */
function conica_scripts() {
    wp_enqueue_style( 'conica-google-font-default', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic');
    wp_enqueue_style( 'conica-fontawesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.0.3' );
	wp_enqueue_style( 'conica-style', get_stylesheet_uri(), array(), KAIRA_THEME_VERSION );

	wp_enqueue_script( 'conica-navigation', get_template_directory_uri() . '/js/navigation.js', array(), KAIRA_THEME_VERSION, true );
	wp_enqueue_script( 'conica-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), KAIRA_THEME_VERSION, true );
    
	wp_enqueue_script( 'conica-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), KAIRA_THEME_VERSION, true );
    
	wp_enqueue_script( 'conica-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), KAIRA_THEME_VERSION, true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'kaira-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), KAIRA_THEME_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'conica_scripts' );

function load_conica_wp_admin_style() {
    wp_enqueue_style( 'conica-admin-css', get_template_directory_uri() . '/includes/admin/admin-style.css' );
}    
add_action( 'admin_enqueue_scripts', 'load_conica_wp_admin_style' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/inc/customizer.php';

/**
 * Custom function sets categories for blog list & homepage slider.
 *
 * @param $cats
 */
function conica_load_selected_categories($cats) {
    $the_cats_count = count( $cats );
    
    $cats_set = '';
    $cats_counter = 1;
    if( $cats ) {
        foreach ( $cats as $cat ) {
            $cats_set .= $cat . ',';
            $cats_counter++;
        }
    }
    $cats_set = substr($cats_set, 0, -1);
    return $cats_set;
}

/**
 * Add Conica wrappers around WooCommerce pages content.
 */
add_action('woocommerce_before_main_content', 'conica_wrap_woocommerce_start', 10);
add_action('woocommerce_after_main_content', 'conica_wrap_woocommerce_end', 10);
function conica_wrap_woocommerce_start() {
    echo '<div id="primary" class="content-area content-area-full">';
}
function conica_wrap_woocommerce_end() {
    echo '</div>';
}

/**
 * Add Conica WP Updates code.
 */
require get_template_directory() . '/wp-updates-theme.php';
new WPUpdatesThemeUpdater_966( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );