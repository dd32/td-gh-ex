<?php
/**
 * alba functions and definitions
 *
 * @package Albar
 */

define( 'KAIRA_THEME_VERSION' , '1.2' );

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

if ( ! function_exists( 'kaira_setup_theme' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function alba_setup_theme() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Alba, use a find and replace
	 * to change 'albar' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'albar', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'albar' ),
        'header-bar-menu' => __( 'Header Bar Menu (Header Layout Two)', 'albar' )
	) );

	add_theme_support('post-thumbnails');
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size('blog_standard_img', 580, 380, true );
    }
	
	// The custom header is used for the logo
	add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/images/albar_logo.png',
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
    add_theme_support( 'custom-background', array( 'default-color' => '#ffffff', ) );
    
    add_theme_support( 'woocommerce' );
}
endif; // kaira_setup
add_action( 'after_setup_theme', 'alba_setup_theme' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function alba_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'albar' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar(array(
		'name' => __('Alba Footer', 'albar'),
		'id' => 'site-footer',
	));
	
    register_widget( 'alba_banner' );
    register_widget( 'alba_carousel' );
    register_widget( 'alba_heading' );
    register_widget( 'alba_icon' );
}
add_action( 'widgets_init', 'alba_widgets_init' );

if(!function_exists('alba_footer_widget_params')):
/**
 * Set the widths of the footer widgets
 *
 * @param $params
 * @return mixed
 * 
 * @filter dynamic_sidebar_params
 */
function alba_footer_widget_params($params){
	// Check that this is the footer
	if($params[0]['id'] != 'site-footer') return $params;

	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']);

	return $params;
}
endif;
add_filter('dynamic_sidebar_params', 'alba_footer_widget_params');

function alba_print_styles(){
    global $cx_framework_options;
    $custom_css = $cx_framework_options['cx-options-custom-css'];
    
    $primary_color = $cx_framework_options['cx-options-primary-color'];
    $primary_color_hover = $cx_framework_options['cx-options-primary-hover-color']; ?>
    <style type="text/css" media="screen">
        .alba-button,
        .post .alba-blog-permalink-btn,
        .search article.page .alba-blog-permalink-btn,
        .wpcf7-submit,
        
        #alba-home-slider-prev,
        #alba-home-slider-next,
        .alba-carousel-arrow-prev,
        .alba-carousel-arrow-next {
            background-color: <?php echo $primary_color; ?>;
        }
        .site-header-one .site-title a,
        .site-header-two .site-title a,
        
        .site-header-one .site-top-bar i,
        .site-header-two .site-social i,
        
        .navigation-main li:hover > a,
        li.current_page_item > a,
        li.current_page_ancestor > a,
        
        .page-header .cx-breadcrumbs a,
        
        .sidebar-navigation-left .current_page_item,
        .sidebar-navigation-right .current_page_item,
        
        .entry-content a,
        .alba-blog-standard-block a,
        .widget ul li a,
        #comments .logged-in-as a,
        .alba-heading i,
        .alba-heading b,
        .alba-banner-heading h3 b {
            color: <?php echo $primary_color; ?>;
        }
        .navigation-main li.current_page_item,
        .navigation-main li.current_page_ancestor {
            border-bottom: 2px solid <?php echo $primary_color; ?>;
        }
        .navigation-main ul ul {
            border-top: 2px solid <?php echo $primary_color; ?>;
        }
        .alba-button:hover,
        .wpcf7-submit:hover,
        .post .alba-blog-permalink-btn:hover,
        .search article.page .alba-blog-permalink-btn:hover,
        
        #alba-home-slider-prev:hover,
        #alba-home-slider-next:hover,
        .alba-carousel-arrow-prev:hover,
        .alba-carousel-arrow-next:hover {
            background-color: <?php echo $primary_color_hover; ?>;
        }
        .entry-content a:hover,
        h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
        .alba-blog-standard-block a:hover,
        #comments .logged-in-as a:hover,
        .widget .tagcloud a:hover,
        .sidebar-navigation ul li a:hover,
        .cx-breadcrumbs a:hover,
        .widget ul li a:hover {
            color: <?php echo $primary_color_hover; ?>;
        }
        .sidebar-navigation-left .current_page_item {
            box-shadow: 3px 0 0 <?php echo $primary_color; ?> inset;
        }
        .sidebar-navigation-right .current_page_item {
            box-shadow: -3px 0 0 <?php echo $primary_color; ?> inset;
        }
        <?php echo ($custom_css) ? $custom_css : ''; ?>
    </style>
    <?php
}
add_action('wp_head', 'alba_print_styles', 11);

/**
 * Enqueue scripts and styles
 */
function alba_scripts() {
    wp_enqueue_style( 'alba-google-font-default', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300|Roboto:400,300,300italic,400italic,500,500italic,700,700italic');
    wp_enqueue_style( 'alba-fontawesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.0.3' );
	wp_enqueue_style( 'alba-style', get_stylesheet_uri(), array(), KAIRA_THEME_VERSION );

	wp_enqueue_script( 'alba-navigation', get_template_directory_uri() . '/js/navigation.js', array(), KAIRA_THEME_VERSION, true );
	wp_enqueue_script( 'alba-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), KAIRA_THEME_VERSION, true );
    wp_enqueue_script( 'alba-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), KAIRA_THEME_VERSION, true );
    
	wp_enqueue_script( 'alba-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), KAIRA_THEME_VERSION, true );
    
	wp_enqueue_script( 'alba-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), KAIRA_THEME_VERSION, true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'kaira-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), KAIRA_THEME_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'alba_scripts' );

function load_alba_wp_admin_style() {
    wp_enqueue_style( 'alba-admin-css', get_template_directory_uri() . '/includes/admin/admin-style.css' );
}    
add_action( 'admin_enqueue_scripts', 'load_alba_wp_admin_style' );

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
function alba_load_selected_categories($cats) {
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
 * Add Alba wrappers around WooCommerce pages content.
 */
add_action('woocommerce_before_main_content', 'alba_wrap_woocommerce_start', 10);
add_action('woocommerce_after_main_content', 'alba_wrap_woocommerce_end', 10);
function alba_wrap_woocommerce_start() {
    echo '<div id="primary" class="content-area content-area-full">';
}
function alba_wrap_woocommerce_end() {
    echo '</div>';
}

/**
 * Add Alba WP Updates code.
 */
require get_template_directory() . '/wp-updates-theme.php';
new WPUpdatesThemeUpdater_960( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );