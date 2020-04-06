<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit; ?><?php

// Ladies, Gentalmen, boys and girls let's start our engines
add_action( 'after_setup_theme' , 'semper_fi_lite_setup_theme' );

if ( !function_exists( 'semper_fi_lite_setup_theme' ) ):

function semper_fi_lite_setup_theme() {
			
// Add Callback for Custom TinyMCE editor stylesheets.
//add_editor_style( $stylesheet = 'style.css' );
    
// Content Width is such dated idea
if ( ! isset( $content_width ) ) $content_width = 1920;

// This feature enables post and comment RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// This feature enables custom-menus support for a theme
register_nav_menus( array(
    'touch_menu'    => __( 'Touch Menu' , 'semper-fi-lite' ),
    'content_menu'  => __( 'Menu Bar Below Title' , 'semper-fi-lite' ) ) );

/* 
*   This enables featured image on posts, pages, and customizer.
*   While I would like to name semper_fi_lite-300x300, without it I can't
*   select the correct image size and would be forced to use whatever
*   the user uploads, so if the image the user uploads is a 2mb 4k
*   photo that what everone sees, so in the interest of not killing
*   data this the solution I came up with. I would use starter content
*   but if the theme isn't a fresh install things tend to brake down.
*/
add_theme_support( 'post-thumbnails' );
add_image_size( '24x24' , 24 , 24 , true );
add_image_size( '600x60' , 600 , 60 , true );
add_image_size( '600x60' , 350 , 100 , true );
add_image_size( '100x100' , 100 , 100 , true );
add_image_size( '150x150' , 150 , 150 , true );
add_image_size( '300x300' , 300 , 300 , true );
add_image_size( '500x500' , 500 , 500 , true );
add_image_size( '576x324' , 570 , 324 , true );
add_image_size( '850x478' , 850 , 478 , true );
add_image_size( '1920x450' , 1920 , 450 , false );
add_image_size( '1920x1080' , 1920 , 1080 , false );

// Add Custom Sizes to options
add_filter( 'image_size_names_choose', 'semper_fi_lite_custom_image_sizes' );
function semper_fi_lite_custom_image_sizes( $sizes ) {
    
    return array_merge( $sizes, array(
        '300x300'   => __( 'Semper Fi 300 By 300', 'semper-fi-lite' ),
        '570x1080'  => __( 'Semper Fi 570 By 324', 'semper-fi-lite' ),
        '850x478'   => __( 'Semper Fi 850 By 478', 'semper-fi-lite' ),
        '1920x450'  => __( 'Semper Fi 1920 By 450', 'semper-fi-lite' ),
        '1920x1080' => __( 'Semper Fi 1920 By 1080', 'semper-fi-lite' ), ) );
    
}

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
                      'widgets', ) );


// Add in that jumping comment reply thingy
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );


// Set the length of the excerpt to 100
function semper_fi_lite_custom_excerpt_length( $length ) {
   return 100;
}
add_filter( 'excerpt_length', 'semper_fi_lite_custom_excerpt_length', 999 );


// add more link to excerpt
function semper_fi_lite_custom_excerpt_more($more) {
   return ' <a class="continue-reading" href="'. get_permalink( get_the_ID() ) . '">'. __( 'Continue Reading  &rarr;' , 'semper-fi-lite' ) . ' <span class="screen-reader-text">  ' . get_the_title() . '</span></a>';
}
add_filter('excerpt_more', 'semper_fi_lite_custom_excerpt_more');


// Doesn't look right to have the textbox on top
function semper_fi_lite_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields' , 'semper_fi_lite_move_comment_field_to_bottom' );


// Wrap Video in a DIV so that a videos width and height can be made reponsive using CSS
function semper_fi_lite_wrap_embed_with_div( $html , $url , $attr ) {
	
    // Don't see your video host in here? Just add it in, make sure you have the forward slash marks
    if ( preg_match("/youtu.be/", $html) ||
        preg_match("/youtube.com/", $html) ||
        preg_match("/vimeo/", $html) ||
        preg_match("/videopress.com/", $html) ||
        preg_match("/wordpress.tv/", $html) ||
        preg_match("/v.wordpress.com/", $html ) )
    
        { $html = '<div class="video-container">' . $html . "</div>"; }
    
        return $html;
    
}
add_filter( 'embed_oembed_html' , 'semper_fi_lite_wrap_embed_with_div' , 10 , 3 );


// WordPress Widgets start right here.
function semper_fi_lite_widgets_init() {

	register_sidebar( array(
		'name'            => __( 'Footer Widgets' , 'semper-fi-lite' ),
		'id'              => 'footer_widget',
		'description'     => __( 'Widgets in this area will be shown below the the content of every page.' , 'semper-fi-lite' ),
		'before_widget'   => '<aside class="footer_widget">',
		'after_widget'    => '</aside>',
		'before_title'    => '<h4>',
		'after_title'     => '</h4>', ));

    register_sidebar( array(
		'name'            => __( 'Menu Widgets' , 'semper-fi-lite' ),
		'id'              => 'menu_widgets',
		'before_widget'   => '<li>',
		'after_widget'    => '</li>',
		'before_title'    => '<h3>',
		'after_title'     => '</h3>', ) );
    
}
add_action('widgets_init', 'semper_fi_lite_widgets_init');

// Add quick filter because I don't need these wrapped having needless css or html5 elements
add_filter('next_post_link', 'semper_fi_lite_next_post_link_attributes');
function semper_fi_lite_next_post_link_attributes($output) {
    $code = 'class="next_post_link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);}

add_filter('previous_post_link', 'semper_fi_lite_post_link_attributes');
function semper_fi_lite_post_link_attributes($output) {
    $code = 'class="previous_post_link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);}

add_filter( 'next_posts_link_attributes' , 'semper_fi_lite_previous_posts_link_attributes' );
function semper_fi_lite_previous_posts_link_attributes() { return 'class="previous_post_link"'; }

add_filter( 'previous_posts_link_attributes' , 'semper_fi_lite_next_posts_link_attributes' );
function semper_fi_lite_next_posts_link_attributes() { return 'class="next_post_link"'; }

// Make images float properly
add_filter( 'the_content' , 'semper_fi_lite_filter_ptags_on_images' );
function semper_fi_lite_filter_ptags_on_images($content){
    return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU' , '\1\2\3' , $content );
}

// Checks if the Widgets are active
function semper_fi_lite_is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) {
		return true; }
		return false; }

// Load up the Localizer so that the theme can be translated
load_theme_textdomain( 'semper_fi_lite_localizer', get_template_directory() . '/language' );


// List of the sections to be loaded in
$semper_fi_lite_load_in_all_sections = array(
    
    'customizer',
    'theme-info',
    'google-fonts',
    'footer',
    'header',
    'skip-link',
    'navigation',
    'the-end',
    '404',
    'attachment',
    'blog',
    'categories-and-tags',
    'front-page',
    'page',
    'single',
    'above-the-fold',
    'comments',
    'content-data',
    'footer-widgets',
    'navigation-social-icons',
    'square-boxes',
    'store-front',
    'video-tab', );

// Loop through and load in all the different sections
foreach( $semper_fi_lite_load_in_all_sections as $semper_fi_lite_one_loaded_section ){
    
    // Load up '$semper_fi_lite_one_loaded_section' Functions page
    require get_parent_theme_file_path( '/inc/' . $semper_fi_lite_one_loaded_section . '/functions.php' );
                                       
}


// Only load if have WooCommerce Plugin Installed
if ( class_exists( 'WooCommerce' ) ) {
    
    // Remove simple shopping cart
    remove_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_store_front' );

    // Woo-Commerce, Customize
    require get_parent_theme_file_path( '/inc/woo-commerce/functions.php' );

    // Woo-Commerce, Customize
    //require get_parent_theme_file_path( '/inc/woo-commerce-content-microdata/functions.php' );

    // Woo-Commerce Add Display Products after cart
    require get_parent_theme_file_path( '/inc/woo-commerce-display-products/functions.php' );
    
}


// Generate the modular content
do_action( 'semper_fi_lite-functions-hook' );


// Let's not display needlessly big images
function semper_fi_lite_image( $semper_fi_lite_get_theme_mod_image , $semper_fi_lite_theme_mod_default , $semper_fi_lite_image_width , $semper_fi_lite_image_height ) {
    
    if ( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) != get_template_directory_uri() . $semper_fi_lite_theme_mod_default ) {
        
        echo esc_url( wp_get_attachment_image_src( attachment_url_to_postid( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) ) , $semper_fi_lite_image_width . 'x' . $semper_fi_lite_image_height )[0] );
        
    } else {
        
        echo esc_url( get_template_directory_uri() . $semper_fi_lite_theme_mod_default );
        
    }
    
}


// Get the image alt text if it has it and apply it
function semper_fi_lite_image_alt( $semper_fi_lite_get_theme_mod_image , $semper_fi_lite_backup_alt_text ) {
    
    // grab the alt if it has it
    $semper_fi_lite_get_theme_mod_image_modified = get_post_meta( attachment_url_to_postid( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) ) , '_wp_attachment_image_alt', true );
    
    if ( $semper_fi_lite_get_theme_mod_image_modified != '' ) {
        
        echo ' alt="' . esc_attr( $semper_fi_lite_get_theme_mod_image_modified ) . '"';
        
    } else {
        
        if ( attachment_url_to_postid( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) ) != 0 ) {
        
            // Grab the title of the image if the alt was blank
            $semper_fi_lite_get_theme_mod_image_modified = get_the_title( attachment_url_to_postid( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) ) );

            if ( $semper_fi_lite_get_theme_mod_image_modified != '' ) {

                echo ' alt="' . esc_attr(  $semper_fi_lite_get_theme_mod_image_modified ) . '"';

            } else {

                // Grab the back up text if the title was blank too
                $semper_fi_lite_backup_alt_text = get_theme_mod( $semper_fi_lite_backup_alt_text );

                if ( $semper_fi_lite_backup_alt_text != '' ) {

                    echo ' alt="' . esc_attr( $semper_fi_lite_backup_alt_text ) . '"';

                } else {

                    //quess we got nothing to work with, lets just return nothing
                    echo ' alt=""';

                }

            }
            
        } else {
            
            echo ' alt=""';
            
        }
    
    }
    
}
