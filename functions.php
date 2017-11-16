<?php
/**
 * conica functions and definitions
 *
 * @package Conica
 */

define( 'CONICA_THEME_VERSION' , '1.3.07' );

// Get help / Premium Page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/conica-pro/class-customize.php' );

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
     * Set the content width based on the theme's design and stylesheet.
     */
    global $content_width;
    if ( ! isset( $content_width ) )
        $content_width = 870; /* pixels */

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
    
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'conica-main-menu' => __( 'Main Menu', 'conica' ),
		'conica-header-menu' => __( 'Top Bar Menu', 'conica' ),
		'conica-footer-menu' => __( 'Footer Menu', 'conica' )
	) );

	add_theme_support( 'post-thumbnails' );
	
	// The custom logo is used for the logo
	add_theme_support( 'custom-logo', array(
		'height'      => 105,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	
	add_editor_style();
	
    add_theme_support( 'custom-background', array( 'default-color' => '#FFFFFF', ) );
    
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // conica_setup_theme
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
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar(array(
		'name' => __( 'Conica Standard Footer', 'conica' ),
		'id' => 'conica-site-footer-standard',
	));
}
add_action( 'widgets_init', 'conica_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function conica_scripts() {
    wp_enqueue_style( 'conica-body-font-default', '//fonts.googleapis.com/css?family=Poppins:400,300,500,600,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), CONICA_THEME_VERSION );
    
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.6.3' );
	wp_enqueue_style( 'conica-style', get_stylesheet_uri(), array(), CONICA_THEME_VERSION );
	
	if ( conica_is_woocommerce_activated() ) {
		wp_enqueue_style( 'conica-woocommerce-style', get_template_directory_uri().'/templates/css/conica-woocommerce-style.css', array(), CONICA_THEME_VERSION );
	}
	
	if ( get_theme_mod( 'conica-set-site-skin' ) == 'conica-skin-dark' ) :
		wp_enqueue_style( 'conica-skin-dark', get_template_directory_uri().'/templates/css/skins/dark-skin.css', array(), CONICA_THEME_VERSION );
	else :
		wp_enqueue_style( 'conica-skin-light', get_template_directory_uri().'/templates/css/skins/light-skin.css', array(), CONICA_THEME_VERSION );
	endif;
	
	if ( get_theme_mod( 'conica-set-header-layout' ) == 'conica-header-layout-two' ) :
		wp_enqueue_style( 'conica-header-style-two', get_template_directory_uri().'/templates/css/header/header-two.css', array(), CONICA_THEME_VERSION );
	elseif ( get_theme_mod( 'conica-set-header-layout' ) == 'conica-header-layout-three' ) :
		wp_enqueue_style( 'conica-header-style-three', get_template_directory_uri().'/templates/css/header/header-three.css', array(), CONICA_THEME_VERSION );
	elseif ( get_theme_mod( 'conica-set-header-layout' ) == 'conica-header-layout-four' ) :
		wp_enqueue_style( 'conica-header-style-four', get_template_directory_uri().'/templates/css/header/header-four.css', array(), CONICA_THEME_VERSION );
	else :
		wp_enqueue_style( 'conica-header-style-one', get_template_directory_uri().'/templates/css/header/header-one.css', array(), CONICA_THEME_VERSION );
	endif;
	
	if ( get_theme_mod( 'conica-footer-layout' ) == 'conica-footer-layout-social' ) :
	    wp_enqueue_style( 'conica-footer-social-style', get_template_directory_uri().'/templates/css/footer/footer-social.css', array(), CONICA_THEME_VERSION );
	elseif ( get_theme_mod( 'conica-footer-layout' ) == 'conica-footer-layout-none' ) :
	    wp_enqueue_style( 'conica-no-footer-style', get_template_directory_uri().'/templates/css/footer/footer-none.css', array(), CONICA_THEME_VERSION );
	else :
		wp_enqueue_style( 'conica-footer-standard-style', get_template_directory_uri().'/templates/css/footer/footer-standard.css', array(), CONICA_THEME_VERSION );
	endif;
	
	wp_enqueue_script( 'conica-caroufredSel', get_template_directory_uri() . '/js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), CONICA_THEME_VERSION, true );
    wp_enqueue_script( 'conica-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), CONICA_THEME_VERSION, true );
    
    if ( get_theme_mod( 'conica-set-sticky-header' ) ) {
    	wp_enqueue_script( 'conica-waypoints', get_template_directory_uri() . '/js/waypoints/waypoints.min.js', array('jquery'), CONICA_THEME_VERSION, true );
    	wp_enqueue_script( 'conica-waypoints-sticky', get_template_directory_uri() . '/js/waypoints/waypoints-sticky.min.js', array('jquery'), CONICA_THEME_VERSION, true );
		wp_enqueue_script( 'conica-sticky-header', get_template_directory_uri() . '/js/waypoints/sticky-header.js', array('jquery'), CONICA_THEME_VERSION, true );
	}
    
    if ( get_theme_mod( 'conica-set-blog-layout' ) == 'blog-grid-layout' ) {
	    if ( is_home() || is_archive() || is_search() ) {
	        wp_enqueue_script( 'jquery-masonry' );
	        wp_enqueue_script( 'conica-masonry-custom', get_template_directory_uri() . '/js/blog-layout.js', array('jquery'), CONICA_THEME_VERSION, true );
	    }
	}
    
	wp_enqueue_script( 'conica-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), CONICA_THEME_VERSION, true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'kaira-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), CONICA_THEME_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'conica_scripts' );

/**
 * To maintain backwards compatibility with older versions of WordPress
 */
function conica_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Enqueue admin styling.
 */
function conica_load_admin_script() {
    wp_enqueue_style( 'conica-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'conica_load_admin_script' );

/**
 * Check if WooCommerce exists.
 */
if ( ! function_exists( 'conica_is_woocommerce_activated' ) ) :
    function conica_is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
endif; // conica_is_woocommerce_activated

// If WooCommerce exists include ajax cart
if ( conica_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-cart.php';
}

/**
 * Add classes to the blog list for styling.
 */
function conica_add_post_classes ( $classes ) {
	global $current_class;
	
	if ( is_home() || is_archive() || is_search() ) :
		$conica_blog_layout = 'blog-left-layout';
		if ( get_theme_mod( 'conica-set-blog-layout' ) ) {
		    $conica_blog_layout = sanitize_html_class( get_theme_mod( 'conica-set-blog-layout' ) );
		}
		$classes[] = $conica_blog_layout;

		$conica_blog_style = sanitize_html_class( 'blog-style-plain' );
		$classes[] = $conica_blog_style;
		
		$classes[] = $current_class;
		$current_class = ( $current_class == 'blog-alt-odd' ) ? sanitize_html_class( 'blog-alt-even' ) : sanitize_html_class( 'blog-alt-odd' );
	endif;
	
	return $classes;
}
global $current_class;
$current_class = sanitize_html_class( 'blog-alt-odd' );
add_filter ( 'post_class' , 'conica_add_post_classes' );

/**
 * Enqueue conica custom customizer styling.
 */
function conica_load_customizer_script() {
    wp_enqueue_script( 'conica-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), CONICA_THEME_VERSION, true );
    wp_enqueue_style( 'conica-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'conica_load_customizer_script' );

/**
 * Add classed to the body tag from settings
 */
function conica_add_body_class( $classes ) {
	$conica_skin = sanitize_html_class( 'conica-skin-light' );
	if ( get_theme_mod( 'conica-set-site-skin' ) ) {
		$conica_skin = sanitize_html_class( get_theme_mod( 'conica-set-site-skin' ) );
	}
	$classes[] = sanitize_html_class( $conica_skin );
    
    return $classes;
}
add_filter( 'body_class', 'conica_add_body_class' );

/**
 * Adjust is_home query if conica-set-blog-cats is set
 */
function conica_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'conica-set-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'conica-set-blog-cats' );
    }
    
    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', esc_attr( $blog_query_set ) );
            }
        }
    }
}
add_action( 'pre_get_posts', 'conica_set_blog_queries' );

/**
 * Display recommended plugins with the TGM class
 */
function conica_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
            'name'      => __( 'Elementor Page Builder', 'conica' ),
            'slug'      => 'elementor',
            'required'  => false,
        ),
		array(
			'name'      => __( 'WooCommerce', 'conica' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'conica' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => __( 'Meta Slider', 'conica' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'conica',
		'menu'         => 'tgmpa-install-plugins',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'conica_register_required_plugins' );

/**
 * Elementor Check
 */
if ( ! defined( 'ELEMENTOR_PARTNER_ID' ) ) {
    define( 'ELEMENTOR_PARTNER_ID', 2118 );
}

/**
 * Register a custom Post Categories ID column
 */
function conica_edit_cat_columns( $conica_cat_columns ) {
    $conica_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $conica_cat_columns = conica_cat_columns_array_push_after( $conica_cat_columns, $conica_cat_in, 0 );
    return $conica_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'conica_edit_cat_columns' );

/**
 * Print the ID column
 */
function conica_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'conica_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function conica_cat_columns_array_push_after( $src, $conica_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $conica_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $conica_cat_in );
        }
    }
    return $R;
}
