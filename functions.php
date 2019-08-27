<?php
/**
 * appdetail functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package appdetail
 */
if ( ! function_exists( 'appdetail_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function appdetail_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on appdetail, use a find and replace
	 * to change 'appdetail' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'appdetail' );

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

	add_image_size( 'appdetail-promo-post', 360, 261, array( 'top', 'bottom' ) ); //300 pixels wide (and unlimited height)

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'appdetail' ),
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
	 *
	 * See: https://codex.wordpress.org/Post_Formats
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
		'chat',
	) );

	$defaults = array(
		'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
		'width'                  => 1920,
		'height'                 => 600,
		'uploads'                => true,
		'wp-head-callback'       => 'appdetail_header_style',
	);
	add_theme_support( 'custom-header', $defaults );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'appdetail_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'appdetail_setup' );
/*
	 * Custom Logo implemeted from WordPress Core
	 */

	add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
            'flex-width' => true
        ) );
/**
	 * Styles the header text color displayed on the page header title
	 */
	function appdetail_header_style()
	{
		//Check if user has defined any header image.
		if ( get_header_image() ) :
		?>
			<style type="text/css">				
				.inner-banner-area{
					background-image:url('<?php header_image(); ?>');
				}				
			</style>
		<?php
		endif;
	}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function appdetail_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'appdetail_content_width', 640 );
}
add_action( 'after_setup_theme', 'appdetail_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function appdetail_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'appdetail' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'appdetail' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s co-blog-sidebar clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'appdetail' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here', 'appdetail' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'appdetail' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here', 'appdetail' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'appdetail' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here', 'appdetail' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'appdetail' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here', 'appdetail' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'appdetail_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function appdetail_scripts() {
	/*google font  */
	global $appdetail_theme_options;
	
	$font_family_url = esc_url($appdetail_theme_options['appdetail-font-family-url']);
	if(!empty($font_family_url)):
	wp_enqueue_style( 'appdetail-googleapis', $font_family_url, array(), null, false, 'all' );
    endif;

   wp_enqueue_style('appdetail-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700|Open+Sans:400,600,700');

	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.css', array(), '3.2.0' );

	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.css');

	/*owl.carousel.css*/
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css');
	/*owl.theme.default*/
	wp_enqueue_style( 'owl.theme.default', get_template_directory_uri() . '/assets/css/owl.theme.default.css');
	/*slicknav*/
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css');
	/*lity css*/
	wp_enqueue_style( 'lity', get_template_directory_uri() . '/assets/css/lity.css');
	/*swiper*/
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.css');

    wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/assets/css/animate.css');
  
	/*Style CSS*/
	wp_enqueue_style( 'appdetail-style', get_stylesheet_uri() );
	/*Style CSS*/
	wp_enqueue_style( 'appdetail-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	/*Style CSS*/
	wp_enqueue_style( 'appdetail-multi', get_template_directory_uri() . '/assets/css/multi.css');

	
    /*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.js', array('jquery'), '3.2.0' );
    /*lity JS*/
    wp_enqueue_script( 'lity', get_template_directory_uri() . '/assets/framework/lity.js');
    /*Swiper JS*/
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/framework/swiper.js');
	/*Owl Carousel JS*/
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/framework/owl.carousel.js');
    /*jquery.slicknav JS*/
    wp_enqueue_script( 'jquery-slicknav', get_template_directory_uri() . '/assets/framework/jquery.slicknav.js');
	/*main JS*/
	wp_enqueue_script( 'appdetail-main', get_template_directory_uri() . '/assets/framework/main.js' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'appdetail_scripts' );


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
 * Load theme-function  file.
 */
require get_template_directory() . '/inc/theme-function.php';

/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/header.php';

/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/footer.php';