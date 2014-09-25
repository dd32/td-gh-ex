<?php
/**
 * electa functions and definitions
 *
 * @package electa
 */

define( 'KAIRA_THEME_VERSION' , '1.0' );

// Adding the Redux Framework
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/framework/cx-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/cx-config.php' );
}

global $cx_framework_options;

// Include Electa Widgets
include get_template_directory() . '/includes/widgets.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'electa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function electa_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on electa, use a find and replace
	 * to change 'electa' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'electa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size('blog_standard_img', 580, 380, true );
    }
    
    // The custom header is used for the logo
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/images/electa_logo.png',
        'width'         => 300,
        'height'        => 110,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => false,
    ));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'electa' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'electa_custom_background_args', array(
		'default-color' => 'F6F6F6',
		'default-image' => '',
	) ) );
    
    add_theme_support( 'woocommerce' );
}
endif; // electa_setup
add_action( 'after_setup_theme', 'electa_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function electa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'electa' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_widget( 'electa_carousel' );
    register_widget( 'electa_icon' );
}
add_action( 'widgets_init', 'electa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function electa_scripts() {
    global $cx_framework_options;
    
    wp_enqueue_style( 'electa-fontawesome', get_template_directory_uri() . '/includes/font-awesome/css/font-awesome.css', array(), '4.0.3' );
	wp_enqueue_style( 'electa-style', get_stylesheet_uri(), array(), KAIRA_THEME_VERSION );

	wp_enqueue_script( 'electa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), KAIRA_THEME_VERSION, true );
    wp_enqueue_script( 'electa-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), KAIRA_THEME_VERSION, true );
    
    if ( ( ( is_front_page() ) && ( ( $cx_framework_options['cx-options-home-blocks'] == 1 ) ) ) || ( is_home() ) && ( $cx_framework_options['cx-options-blog-blocks'] == 1 ) ) {
        wp_enqueue_script( 'electa-isotope', get_template_directory_uri() . '/js/isotope.min.js', array(), KAIRA_THEME_VERSION, true );
        wp_enqueue_script( 'electa-layout-blocks-js', get_template_directory_uri() . '/js/layout-blocks.js', array('jquery'), KAIRA_THEME_VERSION, true );
    }
    
    wp_enqueue_script( 'electa-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), KAIRA_THEME_VERSION, true );

	wp_enqueue_script( 'electa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), KAIRA_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'electa_scripts' );

/**
 * Enqueue electa admin stylesheet.
 */
function load_electa_wp_admin_style() {
    wp_enqueue_style( 'electa-admin-css', get_template_directory_uri() . '/includes/admin/admin-style.css' );
}    
add_action( 'admin_enqueue_scripts', 'load_electa_wp_admin_style' );

/**
 * Print Electa styling settings.
 */
function electa_print_styles(){
    global $cx_framework_options;
    $custom_css = $cx_framework_options['cx-options-custom-css'];
    
    $header_color = $cx_framework_options['cx-options-header-bg-color'];
    
    $primary_color = $cx_framework_options['cx-options-primary-color'];
    $primary_color_hover = $cx_framework_options['cx-options-primary-hover-color']; ?>
    <style type="text/css" media="screen">
        a,
        .pc-text a,
        .entry-content a,
        .entry-footer a,
        .search-button .fa-search,
        .widget ul li a {
            color: <?php echo $primary_color; ?>;
        }
        .pc-bg,
        .electa-button,
        #comments .form-submit #submit,
        .main-navigation li.current-menu-item > a,
        .main-navigation li.current_page_item > a,
        .main-navigation li.current-menu-parent > a,
        .main-navigation li.current_page_parent > a,
        .main-navigation li.current-menu-ancestor > a,
        .main-navigation li.current_page_ancestor > a,
        .main-navigation button,
        .wpcf7-submit {
            background-color: <?php echo $primary_color; ?> !important;
        }
        a:hover,
        .pc-text a:hover,
        .entry-content a:hover,
        .entry-footer a:hover,
        .search-button .fa-search:hover,
        .widget ul li a:hover {
            color: <?php echo $primary_color_hover; ?>;
        }
        .pc-bg:hover,
        .electa-button:hover,
        .main-navigation button:hover,
        #comments .form-submit #submit:hover,
        .wpcf7-submit:hover {
            background-color: <?php echo $primary_color_hover; ?> !important;
        }
        .site-header,
        .site-header-inner,
        .main-navigation ul ul,
        .main-navigation ul ul li a {
            background-color: <?php echo $header_color; ?>;
        }
        <?php echo ($custom_css) ? $custom_css : ''; ?>
    </style>
    <?php
}
add_action('wp_head', 'electa_print_styles', 11);

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom function sets categories for Home blocks list page.
 *
 * @param $cats
 */
function electa_load_selected_categories($cats) {
    if($cats) {
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
    
        return 'cat=' . $cats_set . '';
    } else {
        return 'post_type=post';
    }
}
/**
 * Custom function excludes categories from Blog list page.
 *
 * @param $excl_cats
 */
function electa_exclude_selected_blog_categories() {
    global $cx_framework_options;
    
    $excl_cats = $cx_framework_options['cx-options-blog-excl-cats'];
    
    if ($excl_cats) {
        if ( is_home() ) {
            $the_excl_cats_count = count( $excl_cats );
            
            $excl_cats_set = '';
            $excl_cats_counter = 1;
            if( $excl_cats ) {
                foreach ( $excl_cats as $excl_cat ) {
                    $excl_cats_set .= '-' . $excl_cat . ',';
                    $excl_cats_counter++;
                }
            }
            $excl_cats_set = substr($excl_cats_set, 0, -1);
            
            query_posts( 'cat=' . $excl_cats_set . '' );
        }
    } else {
        return;
    }
}

// add category nicenames in body and post class
function electa_add_body_home_class( $home_add_class ) {
    global $cx_framework_options;
    
    if ( ( ( is_front_page() ) && ( $cx_framework_options['cx-options-home-blocks'] == 1 ) ) || ( ( is_home() ) && ( $cx_framework_options['cx-options-blog-blocks'] == 1 ) ) ) {
        $home_add_class[] = ' body-blocks-layout';
    }
    return $home_add_class;
}
add_filter( 'body_class', 'electa_add_body_home_class' );

/**
 * Add Conica WP Updates code.
 */
require get_template_directory() . '/wp-updates-theme.php';
new WPUpdatesThemeUpdater_981( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );