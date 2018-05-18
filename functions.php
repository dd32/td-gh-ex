<?php
/**
 * Ecommerce Store functions and definitions
 *
 * @package Ecommerce Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'bb_ecommerce_store_setup' ) ) :

function bb_ecommerce_store_setup() {

	$GLOBALS['content_width'] = apply_filters( 'bb_ecommerce_store_content_width', 640 );

	load_theme_textdomain( 'bb-ecommerce-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('bb-ecommerce-store-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bb-ecommerce-store' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

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
	add_editor_style( array( 'css/editor-style.css', bb_ecommerce_store_font_url() ) );

}
endif; // bb_ecommerce_store_setup
add_action( 'after_setup_theme', 'bb_ecommerce_store_setup' );

/* Theme Widgets Setup */
function bb_ecommerce_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on posts and pages', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on posts and pages', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on footer', 'bb-ecommerce-store' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on footer', 'bb-ecommerce-store' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on footer', 'bb-ecommerce-store' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on footer', 'bb-ecommerce-store' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Static page Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on posts and pages', 'bb-ecommerce-store' ),
		'id'            => 'static-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bb_ecommerce_store_widgets_init' );

/* Theme Font URL */
function bb_ecommerce_store_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function bb_ecommerce_store_scripts() {
	wp_enqueue_style( 'bb-ecommerce-store-font', bb_ecommerce_store_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bb-ecommerce-store-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'bb-ecommerce-store-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bb-ecommerce-store-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'bb-ecommerce-store-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bb-ecommerce-store-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bb_ecommerce_store_scripts' );

function bb_ecommerce_store_ie_stylesheet(){
	wp_enqueue_style('bb-ecommerce-store-ie', get_template_directory_uri().'/css/ie.css', array('bb-ecommerce-store-basic-style'));
	wp_style_add_data( 'bb-ecommerce-store-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','bb_ecommerce_store_ie_stylesheet');


define('BB_ECOMMERCE_STORE_BUY_NOW','https://www.themeshopy.com/premium/ecommerce-store-wordpress-theme/','bb-ecommerce-store');
define('BB_ECOMMERCE_STORE_LIVE_DEMO','https://www.themeshopy.com/ecommerce-store-wordpress-theme/','bb-ecommerce-store');
define('BB_ECOMMERCE_STORE_PRO_DOC','https://themeshopy.com/docs/bb-ecommerce-store/','bb-ecommerce-store');
define('BB_ECOMMERCE_STORE_FREE_DOC','https://themeshopy.com/docs/free-bb-ecommerce/','bb-ecommerce-store');
define('BB_ECOMMERCE_STORE_CONTACT','https://wordpress.org/support/theme/bb-ecommerce-store/','bb-ecommerce-store');
define('bb_ecommerce_store_CREDIT','https://www.themeshopy.com/','bb-ecommerce-store');

if ( ! function_exists( 'bb_ecommerce_store_credit' ) ) {
	function bb_ecommerce_store_credit(){
		echo "<a href=".esc_url(bb_ecommerce_store_CREDIT)." target='_blank'>".esc_html__('ThemeShopy','bb-ecommerce-store')."</a>";
	}
}

/*radio button sanitization*/

 function bb_ecommerce_store_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'bb-ecommerce-store' ); ?>"><?php echo esc_html(WC() )->cart->get_cart_total(); ?></a> 
    <?php
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/*compatibility file. */
require get_template_directory() . '/inc/customizer.php';

/* compatibility file. */
require get_template_directory() . '/inc/custom-header.php';

/* admin file. */
require get_template_directory() . '/inc/admin/admin.php';