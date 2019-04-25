<?php
/**
 * Advance Business functions and definitions
 *
 * @package advance-business
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if (!function_exists('advance_business_setup')):

function advance_business_setup() {

	$GLOBALS['content_width'] = apply_filters('advance_business_content_width', 640);

	load_theme_textdomain( 'advance-business', get_template_directory() . '/languages' );
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	));
	add_image_size('advance-business-homepage-thumb', 250, 145, true);
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'advance-business'),
	));

	add_theme_support('custom-background', array(
		'default-color' => 'f1f1f1',
	));

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('css/editor-style.css', advance_business_font_url()));
// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'advance_business_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'advance_business_setup' );

// Notice after Theme Activation
function advance_business_activation_notice() {
	echo '<div class="notice notice-success is-dismissible get-started">';
		echo '<p>'. esc_html__( 'Thank you for choosing ThemeShopy. We are sincerely obliged to offer our best services to you. Please proceed towards welcome page and give us the privilege to serve you.', 'advance-business' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=advance_business_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click here...', 'advance-business' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function advance_business_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'advance-business'),
		'description'   => __('Appears on blog page sidebar', 'advance-business'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'advance-business'),
		'description'   => __('Appears on page sidebar', 'advance-business'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Third Column Sidebar', 'advance-business'),
		'description'   => __('Appears on page sidebar', 'advance-business'),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 1', 'advance-business'),
		'description'   => __('Appears on footer', 'advance-business'),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 2', 'advance-business'),
		'description'   => __('Appears on footer', 'advance-business'),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 3', 'advance-business'),
		'description'   => __('Appears on footer', 'advance-business'),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 4', 'advance-business'),
		'description'   => __('Appears on footer', 'advance-business'),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}

add_action('widgets_init', 'advance_business_widgets_init');

/* Theme Font URL */
function advance_business_font_url() {
	$font_url      = '';
	$font_family   = array();
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';

	$query_args = array(
		'family' => rawurlencode(implode('|', $font_family)),
	);
	$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */

function advance_business_scripts() {
	wp_enqueue_style('advance-business-font', advance_business_font_url(), array());
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('advance-business-basic-style', get_stylesheet_uri());
	wp_enqueue_style('advance-business-customcss', get_template_directory_uri().'/css/custom.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/fontawesome-all.css');
	wp_enqueue_script('SmoothScroll', get_template_directory_uri().'/js/SmoothScroll.js', array('jquery'));
	wp_enqueue_script('advance-business-customscripts-jquery', get_template_directory_uri().'/js/custom.js', array('jquery'));
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array('jquery'));
	wp_enqueue_style('advance-business-ie', get_template_directory_uri().'/css/ie.css', array('advance-business-basic-style'));
	wp_style_add_data('advance-business-ie', 'conditional', 'IE');
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'advance_business_scripts');

function advance_business_sanitize_dropdown_pages($page_id, $setting) {
	// Ensure $input is an absolute integer.
	$page_id = absint($page_id);
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ('publish' == get_post_status($page_id)?$page_id:$setting->default);
}

/*radio button sanitization*/
function advance_business_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

/* Excerpt Limit Begin */
function advance_business_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

define('ADVANCE_BUSINESS_BUY_NOW','https://www.themeshopy.com/themes/wordpress-theme-for-business/','advance-business');
define('ADVANCE_BUSINESS_LIVE_DEMO','https://themeshopy.com/advance-business-pro/','advance-business');
define('ADVANCE_BUSINESS_PRO_DOC','https://themeshopy.com/demo/docs/advance-business-pro/','advance-business');
define('ADVANCE_BUSINESS_FREE_DOC','https://themeshopy.com/demo/docs/free-advance-business/','advance-business');
define('ADVANCE_BUSINESS_CONTACT','https://wordpress.org/support/theme/advance-business/','advance-business');

define('ADVANCE_BUSINESS_CREDIT', 'https://www.themeshopy.com/themes/free-wordpress-theme-for-business/', 'advance-business');

if (!function_exists('advance_business_credit')) {
	function advance_business_credit() {
		echo "<a href=".esc_url(ADVANCE_BUSINESS_CREDIT)." target='_blank'>".esc_html__('Business WordPress Theme', 'advance-business')."</a>";
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'advance_business_loop_columns');
	if (!function_exists('advance_business_loop_columns')) {
		function advance_business_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Custom header additions. */
require get_template_directory().'/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory().'/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory().'/inc/customizer.php';

/* Get Started. */
require get_template_directory().'/inc/admin/admin.php';