<?php
/**
 * Figure/Ground functions and definitions.
 *
 * @package Figure/Ground
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 576; /* pixels */
}

if ( ! function_exists( 'figureground_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function figureground_setup() {

	/**
	 * Make theme available for translation via language packs.
	 */
	load_theme_textdomain( 'figureground' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'editor-style.css', 'genericons/genericons/genericons.css', figureground_fonts_url() ) );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 640, 320, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'figureground' ),
		'social'  => __( 'Social', 'figureground' ),
	) );

	/**
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'video', 'audio', 'quote', 'link' ) );

	/**
	 * Enable support for automatic feed links.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Set up custom headers.
	 *
	 * There is no image by default, and headers are fairly small in this theme.
	 */
	$defaults = array(
		'width'                  => 48,
		'height'                 => 48,
		'flex-height'            => false,
		'flex-width'             => true,
		'header-text'            => false,
		'uploads'                => true,
	);
	add_theme_support( 'custom-header', $defaults );

	/**
	 * Allow widgets to be previewed faster in the customizer with selective refresh.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Add theme support for starter content.
	 */
	add_theme_support( 'starter-content', array(
		// No widgets by default for simplicity.
		'posts' => array(
			'about',
			'contact',
		),

		'options' => array(
			'show_on_front' => 'posts',
		),

		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Menu', 'figureground' ),
				'items' => array(
					'link_home' => array( // The core `page_home` item is wrong. See https://core.trac.wordpress.org/ticket/39104.
						'title' => __( 'Home', 'figureground' ),
						'url' => get_home_url(),
					),
					'page_about',
					'page_contact',
				),
			),
			'social' => array(
				'name' => __( 'Social Links Menu', 'figureground' ),
				'items' => array(
					'link_facebook',
					'link_twitter',
					'link_youtube',
					'link_email',
				),
			),
		),
	) );
}
endif; // figureground_setup
add_action( 'after_setup_theme', 'figureground_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function figureground_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer', 'figureground' ),
		'id'            => 'main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'figureground_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function figureground_scripts() {
	wp_enqueue_style( 'figureground-style', get_stylesheet_uri() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons/genericons.css', '3.0.3' );
	wp_enqueue_style( 'figureground-fonts', figureground_fonts_url() );
	
	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'main' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	// Includes misc. theme scripts.
	wp_enqueue_script( 'figureground-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160717', true );

	// Load Figure/Ground animation.
	wp_enqueue_script( 'figureground', get_template_directory_uri() . '/js/figure-ground.js', array(), '20140622', false );

	// Load theme options to pass to the Figure/Ground script.
	$type = get_theme_mod( 'fg_type', 'orthogonal' );
	$maxh = get_theme_mod( 'fg_max_height', 256 );
	$maxw = get_theme_mod( 'fg_max_width', 256 );
	$maxr = $maxw * 2 / 3;
	$delay = get_theme_mod( 'fg_speed', 320 );
	$initial = get_theme_mod( 'fg_initial', 192 );
	$color = get_theme_mod( 'fg_color_dark', '#222' );

	// Pass data to JS.
	$settings = array(
		'type'    => $type,
		'maxw'    => $maxw,
		'maxh'    => $maxh,
		'maxr'    => $maxr,
		'delay'   => $delay,
		'initial' => $initial,
		'color'   => $color,
	);

	wp_localize_script( 'figureground', 'figureGroundSettings', $settings );

	// Misc. theme scripts.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'figureground-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20140623' );
	}
}
add_action( 'wp_enqueue_scripts', 'figureground_scripts' );

/**
 * Get the url of the webfonts required for the theme.
 *
 * @since Figure/Ground 1.0
 *
 * @return string Fonts url.
 */
function figureground_fonts_url() {
	$font_families = array();
	$font_families[] = 'Raleway:400,600';
	$font_families[] = 'Merriweather Sans:400,700,400italic';
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

	return $fonts_url;
}

/**
 * Adjust content_width value for post-formatted posts.
 *
 * @since Figure/Ground 1.0
 *
 * @return void
 */
function figureground_content_width() {
	global $content_width;

	if ( has_post_format() ) {
		$content_width = 448;
	}
}
add_action( 'template_redirect', 'figureground_content_width' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Register theme options via the Customizer.
 */
require get_template_directory() . '/inc/customizer.php';
