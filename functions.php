<?php
/**
 * Academic Hub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Academic_Hub
 */

if ( ! function_exists( 'academic_hub_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function academic_hub_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Academic Hub, use a find and replace
		 * to change 'academic-hub' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'academic-hub', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'academic-hub' ),
		) );


		/**
         * Limite the excerpt
         * 
         * @since 1.0.4
         */
        function academic_hub_excerpt_length( $length ) {

            if(is_admin()){
                return $length;
            }

            return 20;
        }
		add_filter( 'excerpt_length','academic_hub_excerpt_length', 999 );
            

		/**
		 * Registers an editor stylesheet for the theme.
		 */
		function academic_hub_add_editor_styles() {
			add_editor_style( 'academic-hub-style' );
		}
		add_action( 'admin_init', 'academic_hub_add_editor_styles' );

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
		add_theme_support( 'custom-background', apply_filters( 'academic_hub_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'academic_hub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function academic_hub_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'academic_hub_content_width', 640 );
}
add_action( 'after_setup_theme', 'academic_hub_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function academic_hub_widgets_init() {

	/**
	 * Academic Hub Sidebar Widget
	 * @since 1.0.0
 	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'academic-hub' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'academic-hub' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Academic Hub Footer First Widget
	 * @since 1.0.0
 	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'academic-hub' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'academic-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	/**
	 * Academic Hub Footer Second Widget
	 * @since 1.0.0
 	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'academic-hub' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'academic-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	/**
	 * Academic Hub Footer Third Widget
	 * @since 1.0.0
 	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'academic-hub' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'academic-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'academic_hub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function academic_hub_scripts() {

	//Theme Version Check
	$academic_hub = wp_get_theme();
	$theme_version = $academic_hub->get( 'Version' );

	/**
	 * Add Google Fonts Enqueue file
	 */
	$academic_hub_google_fonts_list = array('Roboto:300italic,400italic,700italic,400,700,300','Poppins:300italic,400italic,700italic,400,700,300');
	foreach(  $academic_hub_google_fonts_list as $google_font ){
		wp_enqueue_style( 'academic-hub-google-fonts-'.$google_font, '//fonts.googleapis.com/css?family='.$google_font, false ); 
	}

	/**
	 * Add Enqueue Style File
	 * @since 1.0.0
	 */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/css/bootstrap.min.css', array(), $theme_version );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.css', array(), $theme_version );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/library/slick/slick-theme.css', array(), $theme_version );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.css', array(), $theme_version );
	wp_enqueue_style( 'academic-hub-style', get_stylesheet_uri() );
	wp_enqueue_style( 'academic-hub-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), $theme_version );
	
	
	/**
	 * Add Enqueue Script File
	 * @since 1.0.0
	 */
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/js/bootstrap.min.js', array('jquery'), $theme_version , true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.js', array('jquery'), $theme_version , true );
	wp_enqueue_script( 'academic-hub-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), $theme_version , true );
	wp_enqueue_script( 'academic-hub-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $theme_version , true );
	wp_enqueue_script( 'academic-hub-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), $theme_version , true );

	/**
	 * Add Enqueue Comment Scripts File
	 * @since 1.0.0
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
}
add_action( 'wp_enqueue_scripts', 'academic_hub_scripts' );

/**
 * Academic Hub Init File
 * @since 1.0.0
 */
require trailingslashit( get_template_directory() ) . 'academic-hub/init.php';

/**
 * Add Require Academic Customizer Conrol
 * @since 1.0.0
 */
require trailingslashit( get_template_directory() ) . 'academic-hub/customizer/custom-controls/custom-control.php';
require trailingslashit( get_template_directory() ) . 'academic-hub/customizer/customizer.php';