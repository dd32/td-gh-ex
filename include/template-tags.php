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
add_theme_support('content-width', 770);
// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header-menu' => __('Primary Menu', 'abaya'),
		'nav-menu' => __('Navigation Menu', 'abaya'),
		'footer-menu' => __('Footer Menu', 'abaya')
) );

add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
      
}
endif; // abaya_setup
add_action('after_setup_theme', 'abaya_setup');

if ( ! isset( $content_width ) ) {
	$content_width = 770;
}

function wc_custom_shop_archive_title() {
    if (is_product_tag()) {
		echo _e('Shop','abaya');
		
    }else 
	{
		the_title();
	}
}
add_filter( 'woocommerce_breadcrumb_defaults', 'ridolfi_woocommerce_breadcrumbs' );
function ridolfi_woocommerce_breadcrumbs() {
  return array(
    'delimiter'   => '/',
    'wrap_before' => '<div class="breadcrumbs"><ul class="crumbs">',
    'wrap_after'  => '</ul></div>',
    'before'      => '<li>',
    'after'       => '</li>',
    'home'        => _x( 'Home', 'breadcrumb', 'abaya'),
  );
}

add_filter('comments_open', 'abaya_comments_open', 10, 2 );
function abaya_comments_open( $open, $post_id ) {
	$post = get_post( $post_id );
    if (get_post_meta($post->ID, 'Allow Comments', true)) {$open = true;}
	return $open;

}

if(!function_exists('abaya_comment_nav')) :
function abaya_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
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
define('ABAYA_POST_CONTENT_LENGTH', 40);
function abaya_excerpt_length($length) {

  return ABAYA_POST_CONTENT_LENGTH;

}

function abaya_remove_more_link_scroll( $link ) {

  $link = preg_replace( '|#more-[0-9]+|', '', $link );

  return $link;

}

add_filter( 'the_content_more_link', 'abaya_remove_more_link_scroll' );
function abaya_excerpt_more($more) {

  return ' [&hellip;]';

}
add_filter('excerpt_length', 'abaya_excerpt_length',999);
add_filter('excerpt_more', 'abaya_excerpt_more');
?>