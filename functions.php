<?php
/**
 * Themes functions and definitions
 *
 * @package Adagio Lite
 */
function adagio_setup() {
	global $content_width;
		if ( ! isset( $content_width ) ){
      		$content_width = 1500;
		}
	load_theme_textdomain( 'adagio', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'adagio-lite' ),
			'secondary-menu' => esc_html__( 'Secondary Menu', 'adagio-lite' ),
			'social' 	=> esc_html__( 'Social', 'adagio-lite' )
		) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size('adagio-homeimg', 2000, 700, true);
	add_image_size('adagio-blogthumb', 1200, 9999);
}
add_action( 'after_setup_theme', 'adagio_setup' );

/**
 * Register widget areas.
 *
 */
function adagio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adagio-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Top Widget', 'adagio-lite' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'adagio-lite' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adagio_widgets_init' );

/**
 * Register Open Sans Google fonts for Adagio Lite.
 *
 * @return string
 */
function adagio_open_sans_font_url() {
	$open_sans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'adagio-lite' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'adagio-lite' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Open Sans:300,300i,400,400i,600,600i' ),
			'subset' => urlencode( $subsets ),
		);

		$open_sans_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $open_sans_font_url;
}

/**
 * Register Playfair Display Google fonts for Adagio Lite.
 *
 * @return string
 */
function adagio_playfair_font_url() {
	$playfair_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Playfair Display, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'adagio-lite' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Playfair Display character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Playfair Display font: add new subset (greek, cyrillic, vietnamese)', 'adagio-lite' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Playfair Display:400,400i,700,700i' ),
			'subset' => urlencode( $subsets ),
		);

		$playfair_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $playfair_font_url;
}


/**
 * Including theme scrips and styles.
 */
function adagio_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if (!is_admin()) {
		wp_enqueue_script( 'adagio-mobile-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'adagio-responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'adagio-on-screen', get_template_directory_uri() . '/js/on-screen.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'adagio-open-sans', adagio_open_sans_font_url(), array(), null );
		wp_enqueue_style( 'adagio-playfair-display', adagio_playfair_font_url(), array(), null );
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
		wp_enqueue_style('adagio-animate-style', get_template_directory_uri().'/animate.css', array(), '1', 'screen'); 
		wp_enqueue_style( 'adagio-style', get_stylesheet_uri());
	}
}
add_action( 'wp_enqueue_scripts', 'adagio_scripts_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';