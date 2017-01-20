<?php
if ( ! function_exists('abaya_setup')):
function abaya_setup() {
load_theme_textdomain('abaya', get_template_directory() . '/languages');
// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );
/* Load scripts. */
add_theme_support( 
'abaya-scripts', 
array('comment-reply' ) 
);
add_theme_support('woocommerce');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('abaya-page-image', 570, 358, true);
add_image_size('abaya-post-thumbnail', 855, 428, true);
// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
'header-top-menu'=>__('Header Top Menu', 'abaya'),
'nav-menu'=>__('Primary Menu', 'abaya'),
'footer-menu'=>__('Footer Menu', 'abaya')
) );
add_theme_support('html5', array(
'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );
add_editor_style( array('editor-style.css', abaya_google_web_fonts_url()));
$args = array(
'default-color' => '',
'default-image' => '',
);
add_theme_support( 'custom-background', $args);
$args = array(
'default-text-color' => '5b5b5b',
'default-image' => '',
'height' => 250,
'width' => 1060,
'max-width' => 2000,
'flex-height' => true,
'flex-width' => true,
'random-default' => false,
'wp-head-callback' => 'abaya_header_style',
);
add_theme_support('custom-header', $args );
add_theme_support('custom-logo', array(
'height' => 100,
'width' => 300,
'flex-width' => true,
'flex-height' => true,
));
}
endif; // abaya_setup
add_action('after_setup_theme', 'abaya_setup');
if(!function_exists('abaya_comment_nav')) :
function abaya_comment_nav() {
// Are there comments to navigate through?
if ( get_comment_pages_count() > 1 && get_option('page_comments')):
?>
<nav class="navigation comment-navigation" role="navigation">
<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'abaya'); ?></h2>
<div class="nav-links">
<?php
if ( $prev_link = get_previous_comments_link(__('Older Comments', 'abaya'))):
printf( '<div class="nav-previous">%s</div>', $prev_link );
endif;
if ( $next_link = get_next_comments_link(__('Newer Comments', 'abaya'))) :
printf('<div class="nav-next">%s</div>', $next_link);
endif;
?>
</div><!-- .nav-links -->
</nav><!-- .comment-navigation -->
<?php
endif;
}
endif;
function abaya_remove_more_link_scroll( $link ) {
$link = preg_replace( '|#more-[0-9]+|', '', $link );
return $link;
}
add_filter( 'the_content_more_link', 'abaya_remove_more_link_scroll' );
function abaya_excerpt_more($more) {
return ' [&hellip;]';
}
add_filter('excerpt_more', 'abaya_excerpt_more');
/**
* Sets the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*
* @since Abaya 1.8
*/
function abaya_content_width() {
$GLOBALS['content_width'] = apply_filters( 'abaya_content_width', 1170);
}
add_action('after_setup_theme', 'abaya_content_width', 0 );
function abaya_header_style() {
$text_color = get_header_textcolor();
?>
<style type="text/css">
<?php if (!display_header_text() ) : ?>
#logo .brand-title{color:#fff;}
<?php else : ?>
#logo .brand-title{color:#<?php echo esc_html($text_color); ?>;}
<?php endif; ?>
</style>
<?php } ?>
