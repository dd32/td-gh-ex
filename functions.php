<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit; ?><?php

// Global Content Width, Kind of a Joke with this theme, lol
if (!isset($content_width)) $content_width = 1350;

// Ladies, Gentalmen, boys and girls let's start our engines
add_action('after_setup_theme', 'semperfi_setup');

if (!function_exists('semperfi_setup')):

function semperfi_setup() {

global $content_width; 
			
// Add Callback for Custom TinyMCE editor stylesheets.
add_editor_style( $stylesheet = 'style.css' );

// This feature enables post and comment RSS feed links to head
add_theme_support('automatic-feed-links');

// This feature enables custom-menus support for a theme
register_nav_menus(array(
    'touch_menu' => __('Touch Menu', 'semper-fi-lite'),
    'content_menu' => __('Menu Bar Below Title', 'semper-fi-lite')));

// This enables featured image on posts and pages
add_theme_support( 'post-thumbnails' );
add_image_size( '24x24' , 24 , 24 , true );
add_image_size( '600x60' , 600 , 60 , true );
add_image_size( '100x100' , 100 , 100 , true );
add_image_size( '150x150' , 150 , 150 , true );
add_image_size( '300x300' , 300 , 300 , true );
add_image_size( '500x500' , 500 , 500 , true );
add_image_size( '576x324' , 570 , 324 , true );
add_image_size( '850x478' , 850 , 478 , true );
add_image_size( '1920x450' , 1920 , 450 , false );
add_image_size( '1920x1080' , 1920 , 1080 , false );

// Add Custom Sizes to options
add_filter( 'image_size_names_choose', 'semperfi_custom_sizes' );
function semperfi_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        '300x300' => __( 'Semper Fi Lite 300 By 300', 'semper-fi-lite' ),
        '570x1080' => __( 'Semper Fi Lite 570 By 324', 'semper-fi-lite' ),
        '850x478' => __( 'Semper Fi Lite 850 By 478', 'semper-fi-lite' ),
        '1920x450' => __( 'Semper Fi Lite 1920 By 450', 'semper-fi-lite' ),
        '1920x1080' => __( 'Semper Fi Lite 1920 By 1080', 'semper-fi-lite' ),
    ));
}

// Jetpack Open Graph protocol isn't really that good, I'm better.
//add_filter( 'jetpack_enable_open_graph', '__return_false' );

// Removing junk
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'wp_resource_hints', 2 );

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
    
} endif;


// Remove this code that adds margin-top in pixels to the HTML element, why do this...
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


// I don't need that emoji junk in my header
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Switch default core markup for search form, comment form, and comments to output valid HTML5.
add_theme_support( 'html5',
                  array(
                      'automatic-feed-links',
                      'caption',
                      'comment-form',
                      'comment-list',
                      'custom-background',
                      'gallery',
                      'search-form',
                      'widgets'));

// Set max comments depth
add_filter( 'thread_comments_depth_max', function( $max ){ return 3;} );

// Add in that jumping comment reply thingy
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );

function semperfi_custom_excerpt_length( $length ) {
   return 100;
}
add_filter( 'excerpt_length', 'semperfi_custom_excerpt_length', 999 );


// add more link to excerpt
function semperfi_custom_excerpt_more($more) {
   global $post;
   return ' <a class="continue-reading" href="'. get_permalink($post->ID) . '">'. __('Continue Reading', 'semper-fi-lite') .'</a>';
}
add_filter('excerpt_more', 'semperfi_custom_excerpt_more');


// Doesn't look right to have the textbox on top
function semperfi_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'semperfi_move_comment_field_to_bottom' );


// Wrap Video in a DIV so that videos width and height become reponsive using CSS
add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);
function wrap_embed_with_div($html, $url, $attr) {
	if (preg_match("/youtu.be/", $html) || preg_match("/youtube.com/", $html) || preg_match("/vimeo/", $html) || preg_match("/wordpress.tv/", $html) || preg_match("/v.wordpress.com/", $html)) { 
        // Don't see your video host in here? Just add it in, make sure you have the forward slash marks
        $html = '<div class="video-container">' . $html . "</div>"; }
        return $html;}

// WordPress Widgets start right here.
add_action('widgets_init', 'semperfi_widgets_init');
function semperfi_widgets_init() {

	register_sidebar( array(
		'name'            => 'Footer Widgets',
		'id'              => 'footer_widget',
		'description'     => 'Widgets in this area will be shown below the the content of every page.',
		'before_widget'   => '<aside class="footer_widget">',
		'after_widget'    => '</aside>',
		'before_title'    => '<h4>',
		'after_title'     => '</h4>', ));

    register_sidebar( array(
		'name'            => 'Menu Widgets',
		'id'              => 'menu_widgets',
		'before_widget'   => '<li>',
		'after_widget'    => '</li>',
		'before_title'    => '<h3>',
		'after_title'     => '</h3>', ) );
    
    }

// Add quick filter because I don't need these wrapped needless css or html5 elements
add_filter('next_post_link', 'next_post_link_attributes');
function next_post_link_attributes($output) {
    $code = 'class="next_post_link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);}

add_filter('previous_post_link', 'post_link_attributes');
function post_link_attributes($output) {
    $code = 'class="previous_post_link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);}

add_filter('next_posts_link_attributes', 'previous_posts_link_attributes');
function next_posts_link_attributes() {return 'class="next_post_link"';}

add_filter('previous_posts_link_attributes', 'next_posts_link_attributes');
function previous_posts_link_attributes() {return 'class="previous_post_link"';}

// Make images float properly
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Checks if the Widgets are active
function semperfi_is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) {
		return true; }
		return false; }
	
// Load up links in admin bar so theme is able to be edited
function semperfi_theme_options_add_page() {
    add_theme_page(__('Semper Fi Info', 'semper-fi-lite'), __('Semper Fi Info', 'semper-fi-lite'), 'edit_theme_options', 'theme_options', 'semperfi_theme_options_do_page');}

// Load up the Localizer so that the theme can be translated
load_theme_textdomain( 'semperfi_localizer', get_template_directory() . '/language' );


// Customizer additions
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );

// Customizer additions
require get_parent_theme_file_path( '/inc/customizer/customizer-save.php' );

// Footer
require get_parent_theme_file_path( '/inc/footer/functions.php' );

// Header
require get_parent_theme_file_path( '/inc/header/functions.php' );

// Navigation
require get_parent_theme_file_path( '/inc/navigation/functions.php' );

// The End
require get_parent_theme_file_path( '/inc/the-end/functions.php' );

// 404 Error
require get_parent_theme_file_path( '/inc/404/functions.php' );

// Attachment
require get_parent_theme_file_path( '/inc/attachment/functions.php' );

// Blog
require get_parent_theme_file_path( '/inc/blog/functions.php' );

// Categories and Tags
require get_parent_theme_file_path( '/inc/categories-and-tags/functions.php' );

// Page, Front
//require get_parent_theme_file_path( '/inc/front-page/functions.php' );

// Page
require get_parent_theme_file_path( '/inc/page/functions.php' );

// Theme Option Page
require get_parent_theme_file_path( '/inc/theme-option-page/html.php' );

// Single
require get_parent_theme_file_path( '/inc/single/functions.php' );

// Above the Fold
require get_parent_theme_file_path( '/inc/above-the-fold/functions.php' );

// Comments
require get_parent_theme_file_path( '/inc/comments/functions.php' );

// Content Data
require get_parent_theme_file_path( '/inc/content-data/functions.php' );

// Footer Widgets
require get_parent_theme_file_path( '/inc/footer-widgets/functions.php' );

// Navigation Social Icons
require get_parent_theme_file_path( '/inc/navigation-social-icons/functions.php' );

// Square Boxes
require get_parent_theme_file_path( '/inc/square-boxes/functions.php' );

// Store Front
require get_parent_theme_file_path( '/inc/store-front/functions.php' );

// Video Tab
require get_parent_theme_file_path( '/inc/video-tab/functions.php' );

// Open Graph Protocol Generation
require get_parent_theme_file_path( '/inc/open-graph-protocol/functions.php' );


// Only load if have WooCommerce
if ( class_exists( 'WooCommerce' ) ) {

    // Woo-Commerce, Customize
    require get_parent_theme_file_path( '/inc/woo-commerce/functions.php' );

    // Woo-Commerce, Customize
    //require get_parent_theme_file_path( '/inc/woo-commerce-content-microdata/functions.php' );

    // Woo-Commerce, Customize
    require get_parent_theme_file_path( '/inc/woo-commerce-after-shop-loop/functions.php' );

    // Woo-Commerce Add Display Products after cart
    require get_parent_theme_file_path( '/inc/woo-commerce-display-products/functions.php' );
    
}

// Generate the modular content
do_action( 'functions-hook' );
