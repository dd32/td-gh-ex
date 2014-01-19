<?php
define('BS_THEME_NAME', 'Blue Sky');
define('BS_THEME_SLUG', 'blue-sky');
define('BS_SHORT_NAME', 'bsk');
?>
<?php
/**
 * Blue Sky functions and definitions
 *
 * @package Blue Sky
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'blue_sky_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blue_sky_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blue Sky, use a find and replace
	 * to change 'blue-sky' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'blue-sky', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Add support for custom backgrounds
	// WordPress 3.4+
	if ( function_exists( 'get_custom_header') ) {
		add_theme_support( 'custom-background' );
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 */
	add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'homepage-thumb', 285, 215, true ); //(cropped)
    }

	// This theme uses wp_nav_menu()
	register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'blue-sky' ),
        'footer'  => __( 'Footer Menu', 'blue-sky' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blue_sky_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Load up theme options defaults
	require( get_template_directory() . '/inc/bluesky-themeoptions-defaults.php' );

    //Redirect to Theme Options Page on Activation
	global $pagenow;

        if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" ) {
            wp_redirect( 'themes.php?page=theme_options' );
	}

        if ( is_admin() && $pagenow =="themes.php" && 'theme_options' == $_REQUEST['page'] ) {
            wp_enqueue_style('jquery');
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style('thickbox');

            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');

            wp_enqueue_style('blue-sky-admin-styles-common',get_stylesheet_directory_uri(). '/css/admin.css' );

            wp_enqueue_script('blue-sky-cookies-script', get_stylesheet_directory_uri().'/js/jquery.cookie.js',
                    array('jquery', 'jquery-ui-tabs','media-upload','thickbox'));
            wp_enqueue_script('blue-sky-admin-script', get_stylesheet_directory_uri().'/js/admin.js',
                    array('jquery', 'jquery-ui-tabs','media-upload','thickbox','blue-sky-cookies-script','wp-color-picker'));
	}

}
endif; // blue_sky_setup
add_action( 'after_setup_theme', 'blue_sky_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function blue_sky_widgets_init() {
	register_sidebar( array(
        'name'          => __( 'Sidebar', 'blue-sky' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Default Sidebar', 'blue-sky' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
	) );
    register_sidebar( array(
        'name'          => __( 'Menu Widget Area', 'blue-sky' ),
        'id'            => 'sidebar-top-menu',
        'description'   => __( 'Widget area in the header. Specially for menu widget', 'blue-sky' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    //
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;
    if( 1 == $bs_options['flg_enable_footer_widgets']){
        $num_footer = $bs_options['number_of_footer_widgets'];

        for($i = 1; $i <= $num_footer ;$i++){
            register_sidebar(array(
                'name'          => __('Footer Column','blue-sky') .'-'.$i,
                'id'            => 'footer-area-'.$i,
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h1 class="footer-sidebar-title">',
                'after_title'   => '</h1>',
            ));

        }
    }

}
add_action( 'widgets_init', 'blue_sky_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blue_sky_scripts() {
    global $bluesky_options_settings;
    $bs_options = $bluesky_options_settings;

    wp_enqueue_style( 'blue-sky-style', get_stylesheet_uri() );
    wp_enqueue_style( 'blue-sky-style-bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', false ,'3.0.0' );
    wp_enqueue_style( 'blue-sky-style-responsive', get_stylesheet_directory_uri().'/css/responsive.css', false ,'' );

        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-script',get_stylesheet_directory_uri().'/js/bootstrap.min.js', array('jquery'),'3.0.0', TRUE);


	wp_enqueue_script( 'blue-sky-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'blue-sky-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    if( 'none' != $bs_options['slider_status'] || 'none' != $bs_options['slider_status_2']){
        //nivo
        wp_enqueue_style( 'nivo-slider-style', get_stylesheet_directory_uri().'/thirdparty/nivoslider/nivo-slider.css', false ,'3.2' );
        wp_enqueue_style( 'nivo-slider-style-theme', get_stylesheet_directory_uri().'/thirdparty/nivoslider/themes/default/default.css', false ,'3.2' );
        wp_enqueue_script('nivo-slider-script',get_stylesheet_directory_uri().'/thirdparty/nivoslider/jquery.nivo.slider.pack.js', array('jquery'),'3.2', TRUE);



    }

    //meanmenu
    wp_enqueue_style( 'meanmenu-style', get_stylesheet_directory_uri().'/thirdparty/meanmenu/meanmenu.min.css', false ,'2.0.6' );
    wp_enqueue_script('meanmenu-script',get_stylesheet_directory_uri().'/thirdparty/meanmenu/jquery.meanmenu.min.js', array('jquery'),'2.0.6', TRUE);



    //theme custom
    wp_enqueue_script('blue-sky-theme-script-custom',get_stylesheet_directory_uri().'/js/custom.js', array('jquery'),'1.0', TRUE);
}
add_action( 'wp_enqueue_scripts', 'blue_sky_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


require get_template_directory() . '/inc/theme-custom.php';


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

require get_template_directory() . '/admin/setup.php';

require get_template_directory() . '/inc/widgets.php';
