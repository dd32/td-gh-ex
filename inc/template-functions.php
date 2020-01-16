<?php 
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'baw_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function baw_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'baw', get_template_directory() . '/languages' );

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
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * WooCommerce Support
		 */		
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		/*
		 * Gutenberg Support
		 */			
		add_theme_support( 'align-wide' );
		add_theme_support( 'disable-custom-font-sizes');
		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'wp-block-styles' );		
		add_theme_support( 'responsive-embeds' );
		// This theme uses wp_nav_menu() in one location.
		add_theme_support( 'nav-menus' );
		register_nav_menus( array('mobile-menu' => __( 'Mobile Menu', 'baw' )) );
		register_nav_menu('primary', esc_html__( 'Primary', 'baw' ) );
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'baw_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 140,
			'flex-width'  => true,
			'flex-height' => false,
		) );
	}
endif;
add_action( 'after_setup_theme', 'baw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function baw_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'baw_content_width', 640 );
}
add_action( 'after_setup_theme', 'baw_content_width', 0 );

/**
 * Register widget area.
 */
function baw_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'baw' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'baw' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page', 'baw' ),
		'id'            => 'home-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'baw' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'baw' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'baw' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'baw' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'baw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function baw_scripts() {
	wp_enqueue_style( 'black-and-white-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'photo-font', '//fonts.googleapis.com/css?family=Roboto+Slab:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );
	wp_enqueue_style( 'black-and-white-woo-css', get_template_directory_uri() . '/inc/woocommerce/woo-css.css');
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0'  );	
	wp_enqueue_script( 'jquery');	
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-tabs' );

	wp_enqueue_script( 'black-and-white-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'black-and-white-search-button', get_template_directory_uri() . '/js/search-button.js', array(), '', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '', true );
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array(), '', true );

	wp_enqueue_script( 'black-and-white-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'baw_scripts' );

/**
 * Admin scripts and styles.
 */
function baw_admin_scripts() {
	wp_enqueue_style( 'black-and-white-admin-css', get_template_directory_uri() . '/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'baw_admin_scripts' );

/**
 * Includes
 */
require get_template_directory() . '/framework/kirki/kirki.php';
require get_template_directory() . '/framework/letters/anime.php';
require get_template_directory() . '/framework/mobile-menu/mobile-menu.php';
require get_template_directory() . '/inc/content-width.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/before-header.php';
require get_template_directory() . '/inc/header-top.php';
require get_template_directory() . '/inc/woocommerce/cart.php';
require get_template_directory() . '/inc/woocommerce/woo-functions.php';
require get_template_directory() . '/inc/back-to-top.php';
require get_template_directory() . '/inc/read-more.php';
require get_template_directory() . '/inc/social.php';
require get_template_directory() . '/inc/footer-options.php';
require get_template_directory() . '/css/menu-animation/animation-speed.php';
require get_template_directory() . '/css/animation-speed.php';
require get_template_directory() . '/js/viewportchecker.php';
require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/pro/pro.php';
//require get_template_directory() . '/inc/recommends/recommends.php';
require get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/plugins/tgm-plugin-activation.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Adds custom classes to the array of body classes.
 */

function baw_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'baw_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function baw_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'baw_pingback_header' );


/**
 * Add Thumbnails in Pages 
 */
add_filter('manage_pages_columns', 'baw_pages_columns', 5);
add_action('manage_pages_custom_column', 'customize_pages_custom_columns', 5, 2);

function baw_pages_columns($defaults){
	$defaults['custom_pages_columns'] = __('Featured Image', 'baw');
	return $defaults;
}

function customize_pages_custom_columns($column_name, $id){
		if($column_name === 'custom_pages_columns'){
		echo the_post_thumbnail( 'featured-thumbnail' );
	}
}
	
/**
 * Add Thumbnails in Posts
 */
add_filter('manage_posts_columns', 'baw_posts_columns', 5);
add_action('manage_posts_custom_column', 'customize_posts_custom_columns', 5, 2);

function baw_posts_columns($defaults){
	$defaults['custom_post_thumbs'] = __('Featured Image', 'baw');
	return $defaults;
}

function customize_posts_custom_columns($column_name, $id){
		if($column_name === 'custom_post_thumbs'){
		echo the_post_thumbnail( 'featured-thumbnail' );
	}
}

/**
Sidebar Options
 */
function baw_sidebar_width () { 
	if((get_theme_mod('sidebar_width') && (get_theme_mod('sidebar_position') != 'no')) && is_active_sidebar('sidebar-1')) {
		
		$baw_content_width = 100;
		$baw_sidebar_width = get_theme_mod('sidebar_width');
		$baw_sidebar_sum = $baw_content_width - $baw_sidebar_width;

		?>
		<style>
			#content #secondary {width: <?php echo get_theme_mod('sidebar_width'); ?>% !important;}
			#content #primary {width: <?php echo $baw_sidebar_sum; ?>% !important;}
		</style>
		
	<?php }

}
add_action('wp_head','baw_sidebar_width');

/**
 * Sidebar Position
 */
 
function baw_sidebar_position() {
	if ((get_theme_mod( 'sidebar_position') =='left' && is_active_sidebar('sidebar-1'))) { 
		wp_enqueue_style( 'black-and-white-sidebar', get_template_directory_uri() . '/layouts/left-sidebar.css');
	}

	if ((get_theme_mod( 'sidebar_position') =='right' && is_active_sidebar('sidebar-1'))) { 
		wp_enqueue_style( 'black-and-white-sidebar', get_template_directory_uri() . '/layouts/right-sidebar.css');
	}

}
add_action( 'wp_enqueue_scripts', 'baw_sidebar_position' );




/**
 * Header Image - Zoom Animation Speed
 */
function baw_heade_image_zoom_speed () { ?>
	-webkit-animation: header-image 
	<?php 
	if (get_theme_mod('header_zoom_speed')) { 
		echo get_theme_mod('header_zoom_speed'); 
	} else 
		echo "20";
	?>s ease-out both; 
	animation: header-image
	<?php
	if (get_theme_mod('header_zoom_speed')) {
		echo get_theme_mod('header_zoom_speed'); 
	} else
		echo "20";
	?>s ease-out 0s 1 normal both running;
<?php	
}

/**
 * Favicon
 */
function baw_shortcut_icon () { ?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php site_icon_url(); ?>" />
	<?php
}
add_action('wp_head','baw_shortcut_icon', 1);