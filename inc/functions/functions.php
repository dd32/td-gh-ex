<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit; ?><?php

// Ladies, Gentalmen, boys and girls let's start our engines
add_action( 'after_setup_theme' , 'semper_fi_lite_setup_theme' );
function semper_fi_lite_setup_theme() {

    // Content Width is such dated idea
    if ( ! isset( $content_width ) ) $content_width = 1920;


    // This feature enables custom-menus support for a theme
    register_nav_menus( array(
        'touch_menu'    => __( 'Touch Menu' , 'semper-fi-lite' ),
        'content_menu'  => __( 'Menu Bar Below Title' , 'semper-fi-lite' ) ) );


    // The Theme Supports Stuff
    add_theme_support( 'automatic-feed-links' );


    // This feature enables Custom_Backgrounds support for a theme.
    add_theme_support( 'custom-background', array(
        'default-attachment'    => 'fixed',     // choices - scroll, fixed     
        'default-color'         => '#333333',
        'default-image'         => get_template_directory_uri() . '/images/semper-fi-lite-top-of-world-H3-hummer-1920x1080.jpg',
        'default-position-x'    => 'center',    // choices - left, center, right
        'default-position-y'    => 'center',    // choices - top, center, bottom
        'default-repeat'        => 'no-repeat', // choices - repeat-x, repeat-y, repeat, no-repeat
        'default-size'          => 'cover',) ); // choices - auto, contain, cover


    // This feature enables Selective Refresh for Widgets being managed within the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );


    // Themes can disable the ability to set custom font sizes with the following code
    add_theme_support('disable-custom-font-sizes');


    // This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
    add_theme_support( 'html5', array(
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'script',
        'search-form',
        'style',
        'widgets', ) );


    // This feature enables Post Thumbnails support for a theme.
    add_theme_support( 'post-thumbnails' );


    // This feature enables plugins and themes to manage the document title tag. This should be used in place of wp_title() function.
    add_theme_support( 'title-tag' );


    // All the image sizes need for the theme
    add_image_size( 'semper_fi_lite_24x24' , 24 , 24 , true );
    add_image_size( 'semper_fi_lite_600x60' , 600 , 60 , true );
    add_image_size( 'semper_fi_lite_350x100' , 350 , 100 , true );
    add_image_size( 'semper_fi_lite_100x100' , 100 , 100 , true );
    add_image_size( 'semper_fi_lite_150x150' , 150 , 150 , true );
    add_image_size( 'semper_fi_lite_300x300' , 300 , 300 , true );
    add_image_size( 'semper_fi_lite_500x500' , 500 , 500 , true );
    add_image_size( 'semper_fi_lite_576x324' , 570 , 324 , true );
    add_image_size( 'semper_fi_lite_850x478' , 850 , 478 , true );
    add_image_size( 'semper_fi_lite_1920x450' , 1920 , 450 , false );
    add_image_size( 'semper_fi_lite_1920x1080' , 1920 , 1080 , false );

}


// Add Custom Sizes to options
add_filter( 'image_size_names_choose', 'semper_fi_lite_custom_image_sizes' );
function semper_fi_lite_custom_image_sizes( $size_names ) {

    $new_sizes = array(
        'semper_fi_lite_300x300'   => __( 'Semper Fi 300 By 300', 'semper-fi-lite' ),
        'semper_fi_lite_570x1080'  => __( 'Semper Fi 570 By 324', 'semper-fi-lite' ),
        'semper_fi_lite_850x478'   => __( 'Semper Fi 850 By 478', 'semper-fi-lite' ),
        'semper_fi_lite_1920x450'  => __( 'Semper Fi 1920 By 450', 'semper-fi-lite' ),
        'semper_fi_lite_1920x1080' => __( 'Semper Fi 1920 By 1080', 'semper-fi-lite' ), );

    return array_merge( $size_names, $new_sizes );
  
}


// Add in that jumping comment reply thingy
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );


// For Blank Titles
add_filter( 'the_title', 'semper_fi_lite_custom_post_title' );
function semper_fi_lite_custom_post_title( $title ) {
    if ( $title == '' ) {
        return esc_html__( '(No Title)', 'semper-fi-lite' );
    } else {
        return $title;
    }
}


// Set the length of the excerpt to 100
add_filter( 'excerpt_length', 'semper_fi_lite_custom_excerpt_length', 999 );
function semper_fi_lite_custom_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 100;
}


// add more link to excerpt
add_filter('excerpt_more', 'semper_fi_lite_custom_excerpt_more');
function semper_fi_lite_custom_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
    return ' <a class="continue-reading" href="'. get_permalink( get_the_ID() ) . '">'. esc_html__( 'Continue Reading  &rarr;' , 'semper-fi-lite' ) . ' <span class="screen-reader-text">  ' . get_the_title() . '</span></a>';
}


// Doesn't look right to have the textbox on top
add_filter( 'comment_form_fields' , 'semper_fi_lite_move_comment_field_to_bottom' );
function semper_fi_lite_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}


// Wrap Video in a DIV so that a videos width and height can be made reponsive using CSS
add_filter( 'embed_oembed_html' , 'semper_fi_lite_wrap_embed_with_div' , 10 , 3 );
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


// WordPress Widgets start right here.
add_action('widgets_init', 'semper_fi_lite_widgets_init');
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


// Let's not display needlessly big images
function semper_fi_lite_image( $semper_fi_lite_get_theme_mod_image , $semper_fi_lite_theme_mod_default , $semper_fi_lite_image_width , $semper_fi_lite_image_height ) {
    
    if ( ( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) != get_template_directory_uri() . $semper_fi_lite_theme_mod_default ) && ( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) != '' ) ) {
        
        echo esc_url( wp_get_attachment_image_src( attachment_url_to_postid( get_theme_mod( $semper_fi_lite_get_theme_mod_image ) ) , 'semper_fi_lite_' . $semper_fi_lite_image_width . 'x' . $semper_fi_lite_image_height )[0] );
        
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

                    // quess we got nothing to work with, lets just return nothing
                    echo ' alt=""';

                }

            }
            
        } else {
            
            echo ' alt=""';
            
        }
    
    }
    
}