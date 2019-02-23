<?php

if ( ! isset( $content_width ) )
	$content_width = 584;
add_action( 'after_setup_theme', 'northern_setup' );

function northern_setup() {
load_theme_textdomain( 'northern-web-coders', get_template_directory() . '/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'northern-web-coders' ),
));


add_editor_style();
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
add_theme_support( 'title-tag' );
add_theme_support( "custom-header" );
};

require( get_template_directory()  . '/inc/checkbox-menu.php');
require( get_template_directory()  . '/inc/theme_customize.php');


function northern_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'northern_custom_logo_setup' );


function northern_custom_header_setup() {

add_theme_support( 'custom-header', apply_filters( 'northern_custom_header_args', array(
    'width'              => 2000,
    'height'             => 1200,
    'flex-height'        => true,
    'wp-head-callback'   => 'northern_header_style',
    'default-text-color' => '#686868'
    ) ) );
}
add_action( 'after_setup_theme', 'northern_custom_header_setup' );

if ( ! function_exists( 'northern_header_style' ) ) :

function northern_header_style() {
$header_text_color = get_header_textcolor();

if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
	return;
}
?>
<style id="northern-custom-header-styles">
<?php
if ( 'blank' === $header_text_color ) :
?>
    .site-title,
    .site-description {
    	position: absolute;
    	clip: rect(1px, 1px, 1px, 1px);
}
<?php else : ?>
    header#header h1.site-title a,
    header#header em {
    	color: #<?php echo esc_attr( $header_text_color ); ?>;
}
<?php endif; ?>
</style>
<?php
}
endif;

function northern_widgets_init() {
    register_sidebar(array(
    'name'=> __( 'Sidebar Blog', 'northern-web-coders' ),
    'id' => 'sidebar-blog',
    'description' => 'Sidebar Blog',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name'=> __( 'Sidebar Page', 'northern-web-coders' ),
    'id' => 'sidebar-page',
    'description' => 'Sidebar Page',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name'=> __( 'Sidebar Woocommerce', 'northern-web-coders' ),
    'id' => 'sidebar-woocommerce',
    'description' => 'Sidebar Woocommerce',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'northern_widgets_init' );


function northern_pagenavi() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'type' =>'list',
    'show_all' => false,
    'mid_size' => 2,
);

if ( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty( $wp_query->query_vars['s'] ) )
    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
}


function northern_the_breadcrumb() {
    echo(_e("You are here:", 'northern-web-coders'));
    echo ' <a href="';
    echo home_url();
    echo '">';
    bloginfo('name');
    echo "</a> ";
    if (is_category() || is_single()) {
    echo "&raquo; ";
    the_category(', ');
    if (is_single()) {
    echo " &raquo; ";
    the_title();
}
} elseif (is_page()) {
    echo "&raquo; ";
    echo the_title();
}
};


function my_search_form( $form ) {
    $form = '<form method="get"  action="' . home_url( '/' ) . '" id="searchform">
    <label class="screen-reader-text" for="s">' . __( 'Search for:' , 'northern-web-coders') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' , 'northern-web-coders') .'" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );


function northern_theme_styles()
{
    wp_register_style( 'nav-style', get_template_directory_uri() . '/nav.css');
    wp_enqueue_style( 'nav-style' );
}
add_action('wp_print_styles', 'northern_theme_styles');


function northern_enqueue_scripts() {
    if (!is_admin()) {

    wp_register_script('html5-shim', get_template_directory_uri() . '/js/html5.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('html5-shim');
	}
}
add_action('init', 'northern_enqueue_scripts');


function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


// Mobile background image fix
function nwc_page_background_image() {
     if (wp_is_mobile()) {
          ?>
<style>
body.custom-background {
background-image: none;
}
#mobile-background {
background-image: url(<?php echo esc_url( get_background_image() ); ?>);
}
</style>

<?php 
     }
}
add_action('wp_head','nwc_page_background_image');

/**
* Add support for Gutenberg.
*
* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
*/
function northern_setup_theme_supported_features() {
		
// Theme supports wide images, galleries and videos.
add_theme_support( 'align-wide' );
add_theme_support( 'editor-styles' );		
add_editor_style( 'custom-editor-style.css' );
}

add_action( 'after_setup_theme', 'northern_setup_theme_supported_features' );

