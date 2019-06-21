<?php
/**
 * akhada-fitness-gym functions and definitions
 *
 * @package WordPress
 * @subpackage akhada-fitness-gym
 * @since 1.0
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function akhada_fitness_gym_setup() {

	load_theme_textdomain( 'akhada-fitness-gym', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	));

	add_image_size( 'akhada-fitness-gym-featured-image', 2000, 1200, true );

	add_image_size( 'akhada-fitness-gym-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'akhada-fitness-gym' ),
		'footer'	=> __('Footer Menu', 'akhada-fitness-gym'),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', akhada_fitness_gym_fonts_url() ) );

}
add_action( 'after_setup_theme', 'akhada_fitness_gym_setup' );

function akhada_fitness_gym_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'akhada-fitness-gym' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'akhada-fitness-gym' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'akhada-fitness-gym' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'akhada-fitness-gym' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'akhada-fitness-gym' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'akhada-fitness-gym' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'akhada-fitness-gym' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'akhada-fitness-gym' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'akhada_fitness_gym_widgets_init' );

function akhada_fitness_gym_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Poppins:200,200i,300,300i,400,400i,500,500i,700i,800i';
	$font_family[] = 'Lato';
	$font_family[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
	$font_family[] = 'Sacramento';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function akhada_fitness_gym_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'akhada-fitness-gym-fonts', akhada_fitness_gym_fonts_url(), array(), null );
		//Bootstarp 
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );	
	
	// Theme stylesheet.
	wp_enqueue_style( 'akhada-fitness-gym-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'akhada-fitness-gym-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'akhada-fitness-gym-style' ), '1.0' );
		wp_style_add_data( 'akhada-fitness-gym-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'akhada-fitness-gym-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'akhada-fitness-gym-style' ), '1.0' );
	wp_style_add_data( 'akhada-fitness-gym-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'akhada-fitness-gym-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$akhada_fitness_gym_l10n=array();
	
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'akhada-fitness-gym-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$akhada_fitness_gym_l10n['expand']         = __( 'Expand child menu', 'akhada-fitness-gym' );
		$akhada_fitness_gym_l10n['collapse']       = __( 'Collapse child menu', 'akhada-fitness-gym' );
		
	}

	wp_enqueue_script( 'akhada-fitness-gym-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'akhada-fitness-gym-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	wp_localize_script( 'akhada-fitness-gym-skip-link-focus-fix', 'akhada_fitness_gymScreenReaderText', $akhada_fitness_gym_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'akhada_fitness_gym_scripts' );

function akhada_fitness_gym_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'akhada_fitness_gym_front_page_template' );

function akhada_fitness_gym_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//footer Link
define('AKHADA_FITNESS_GYM_CREDIT','https://www.luzuk.com/themes/free-fitness-wordpress-theme/','akhada-fitness-gym');

if ( ! function_exists( 'akhada_fitness_gym_credit' ) ) {
	function akhada_fitness_gym_credit(){
		echo "<a href=".esc_url(AKHADA_FITNESS_GYM_CREDIT)." target='_blank'>".esc_html__('Akhada Fitness WordPress Theme','akhada-fitness-gym')."</a>";
	}
}

/* Excerpt Limit Begin */
function akhada_fitness_gym_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );