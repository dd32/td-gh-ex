<?php
/**
 * electa functions and definitions
 *
 * @package electa
 */

define( 'KAIRA_THEME_VERSION' , '1.1.2' );

if ( file_exists( get_stylesheet_directory() . '/settings/class.kaira-theme-settings.php' ) ) {
    require_once( get_stylesheet_directory() . '/settings/class.kaira-theme-settings.php' );
}

// Include Electa Widgets
include get_template_directory() . '/includes/widgets.php';

if ( ! function_exists( 'kaira_setup_theme' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kaira_setup_theme() {
    
    /**
     * Set the content width based on the theme's design and stylesheet.
     */
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 900; /* pixels */
    }

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
        'default-image' => '',
        'width'         => 250,
        'height'        => 180,
        'flex-width' => false,
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
    
    add_editor_style();
    
    add_theme_support( 'woocommerce' );
}
endif; // kaira_setup_theme
add_action( 'after_setup_theme', 'kaira_setup_theme' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kaira_widgets_init() {
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
add_action( 'widgets_init', 'kaira_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kaira_scripts() {
    if( kaira_theme_option( 'kra-body-google-font' ) ) {
        wp_enqueue_style( 'electa-google-font-body', kaira_theme_option( 'kra-body-google-font-url' ), array(), KAIRA_THEME_VERSION );
    } else {
        wp_enqueue_style( 'electa-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), KAIRA_THEME_VERSION );
    }
    if( kaira_theme_option( 'kra-heading-google-font-url' ) ) {
        wp_enqueue_style( 'electa-google-font-heading', kaira_theme_option( 'kra-heading-google-font-url' ), array(), KAIRA_THEME_VERSION );
    } else {
        wp_enqueue_style( 'electa-google-heading-font-default', '//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic', array(), KAIRA_THEME_VERSION );
    }
    
    wp_enqueue_style( 'electa-fontawesome', get_template_directory_uri() . '/includes/font-awesome/css/font-awesome.css', array(), '4.0.3' );
	wp_enqueue_style( 'electa-style', get_stylesheet_uri(), array(), KAIRA_THEME_VERSION );

	wp_enqueue_script( 'electa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), KAIRA_THEME_VERSION, true );
    wp_enqueue_script( 'electa-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), KAIRA_THEME_VERSION, true );
    
    if ( ( ( is_front_page() ) && ( ( kaira_theme_option( 'kra-home-blocks-enable' ) == 1 ) ) ) || ( is_home() ) && ( kaira_theme_option( 'kra-blog-blocks-enable' ) == 1 ) ) {
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script( 'electa-masonry-custom', get_template_directory_uri() . '/js/layout-blocks.js', array('jquery'), KAIRA_THEME_VERSION, true );
    }
    
    wp_enqueue_script( 'electa-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), KAIRA_THEME_VERSION, true );

	wp_enqueue_script( 'electa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), KAIRA_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaira_scripts' );

/**
 * Print Electa styling settings.
 */
function kaira_print_styles(){
    $custom_css = '';
    if ( kaira_theme_option( 'kra-custom-css' ) ) {
        $custom_css = kaira_theme_option( 'kra-custom-css' );
    }
    
    $header_color = kaira_theme_option( 'kra-header-bg-color' );
    
    $body_font = kaira_theme_option( 'kra-body-google-font-name' );
    $body_font_color = kaira_theme_option( 'kra-body-google-font-color' );
    $h_font = kaira_theme_option( 'kra-heading-google-font-name' );
    $h_font_color = kaira_theme_option( 'kra-heading-google-font-color' );
    
    $primary_color = kaira_theme_option( 'kra-primary-color' );
    $primary_color_hover = kaira_theme_option( 'kra-primary-color-hover' ); ?>
    <style type="text/css" media="screen">
        body,
        .page-header h1,
        .alba-banner-heading h5,
        .alba-carousel-block,
        .alba-heading-text {
            color: <?php echo $body_font_color; ?>;
            <?php echo ( $body_font ) ? $body_font : 'font-family: \'Open Sans\', sans-serif;'; ?>
        }
        h1, h2, h3, h4, h5, h6,
        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
            color: <?php echo $h_font_color; ?>;
            <?php echo ( $h_font ) ? $h_font : 'font-family: \'Roboto\', sans-serif;'; ?>
        }
        
        a,
        .pc-text a,
        .site-branding a,
        .entry-content a,
        .entry-footer a,
        .search-btn,
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
        .search-btn:hover,
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
        <?php echo htmlspecialchars_decode( $custom_css ); ?>
    </style>
    <?php
}
add_action('wp_head', 'kaira_print_styles', 11);

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

// add category nicenames in body and post class
function kaira_add_body_home_class( $home_add_class ) {
    if ( ( ( is_front_page() ) && ( kaira_theme_option( 'kra-home-blocks-enable' ) == 1 ) ) || ( ( is_home() ) && ( kaira_theme_option( 'kra-blog-blocks-enable' ) == 1 ) ) ) {
        $home_add_class[] = ' body-blocks-layout';
    }
    return $home_add_class;
}
add_filter( 'body_class', 'kaira_add_body_home_class' );