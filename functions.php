<?php
require_once ( get_stylesheet_directory() . '/theme-options.php' );
/* Registers Menus */
register_nav_menu( 'main-menu', __( 'Main Menu', '' ) );
register_nav_menu( 'bottom-menu', __( 'Footer Menu', '' ) );
/* WP Stuff */
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
if ( ! isset( $content_width ) ) $content_width = 900;
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 280, 210, true);
add_editor_style('/inc/custom-editor-style.css');
/* Scripts and Styles */
function bartleby_scripts_styles() {
	global $wp_styles;
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/javascripts/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'bartleby_scripts_styles' );
function foundation_style()  
{  wp_register_style( 'foundation-style', 
get_template_directory_uri() . '/stylesheets/foundation.min.css',
array(), 
'2132013', 
'all' );
// enqueing:
wp_enqueue_style( 'foundation-style' );
}add_action('wp_enqueue_scripts', 'foundation_style');

function bartleby_ubuntu_font() {
wp_register_style( 'ubuntu-font', 'http://fonts.googleapis.com/css?family=Ubuntu+Condensed', 
array(),
'2132013', 
'all' );
// enqueing:
wp_enqueue_style( 'ubuntu-font' );
}
add_action('wp_enqueue_scripts', 'bartleby_ubuntu_font');


function bartleby_slab_font() {
wp_register_style( 'slab-font', 'http://fonts.googleapis.com/css?family=Josefin+Slab', 
array(),
'2132013', 
'all' );
// enqueing:
wp_enqueue_style( 'slab-font' );
}
add_action('wp_enqueue_scripts', 'bartleby_slab_font');

function theme_style()  
{  wp_register_style( '-style', 
get_stylesheet_uri(),
array(), 
'2132013', 
'all' );
// enqueing:
wp_enqueue_style( '-style' );
}add_action('wp_enqueue_scripts', 'theme_style');
function custom_style()  
{  wp_register_style( 'custom-style', 
get_template_directory_uri() . '/custom.css', 
array(), 
'2132013',
'all' );
// enqueing:
wp_enqueue_style( 'custom-style' );
}add_action('wp_enqueue_scripts', 'custom_style');
function foundation_modernizr() {
wp_enqueue_script(
'foundation-modernizr',
get_template_directory_uri() . '/javascripts/modernizr.foundation.js'
);
}add_action('wp_enqueue_scripts', 'foundation_modernizr');
/* Sidebar Areas */
register_sidebar(array(
'name' => __( 'Right Sidebar', '' ),
'id' => 'sidebar',
'description' => __( 'Widgets in this area will be shown on the right-hand side.', '' ),
'before_widget' => '<div>',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title-block"><h4 class="sidebar">',
'after_title' => '</h4></div>',
));
register_sidebar(array(
'name' => __( 'Below Posts' , '' ),
'id' => 'belowposts-sidebar',
'description' => __( 'Widgets in this area will be shown beneath the blog post type. Use this for sharing, related articles and more.' , '' ),
'before_title' => '<div class="sidebar-title-block"><h4 class="belowposts">',
'after_title' => '</h4></div>',
'before_widget' => '<div class="bottom-widget">',
'after_widget' => '</div><hr>',
));
/* Misc */
function customTitle($limit) {
	$title = get_the_title($post->ID);
	$title = substr($title, 45, $limit) . '...';
	echo $title;
}
function add_nofollow_cat( $text ) {
$text = str_replace('rel="category"', '', $text); 
$text = str_replace('rel="category tag"', 'rel="tag"', $text); 
return $text;
}
add_filter( 'the_category', 'add_nofollow_cat' );
function new_excerpt_more($more) {
global $post;
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('the_title', 'blank_slate_title');
function blank_slate_title($title) {
if ($title == '') {
return 'Untitled Post';
} else {
return $title;
}
}
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/* Four Column Custom Excerpt */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
/* Twenty Twelve Comments*/
if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
* Template for comments and pingbacks.
* To override this walker in a child theme without modifying the comments template
* simply create your own twentytwelve_comment(), and that function will be used instead.
* Used as a callback by wp_list_comments() for displaying the comments.
* @since Twenty Twelve 1.0
*/
function twentytwelve_comment( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
switch ( $comment->comment_type ) :
case 'pingback' :
case 'trackback' :
// Display trackbacks differently than normal comments.
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<p><?php esc_attr_e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
<?php
break;
default :
// Proceed with normal comments.
global $post;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
<article id="comment-<?php comment_ID(); ?>" class="comment">
<header class="comment-meta comment-author vcard">
<?php
echo get_avatar( $comment, 77 );
printf( '<cite class="fn">%1$s %2$s</cite>',
get_comment_author_link(),
// If current post author is also comment author, make it known visually.
( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
);
printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
esc_url( get_comment_link( $comment->comment_ID ) ),
get_comment_time( 'c' ),
/* translators: 1: date, 2: time */
sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
);
?>
</header><!-- .comment-meta -->
<?php if ( '0' == $comment->comment_approved ) : ?>
<p class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
<?php endif; ?>
<section class="comment-content comment">
<?php comment_text(); ?>
<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
</section><!-- .comment-content -->
<div class="reply">
<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div><!-- .reply -->
</article><!-- #comment-## -->
<?php
break;
endswitch; // end comment_type check
}endif;
/* Custom Title Tag */
function bartleby_wp_title( $title, $sep ) {
global $paged, $page;
if ( is_feed() )
return $title;
// Add the site name.
$title .= get_bloginfo( 'name' );
// Add the site description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
$title = "$title $sep $site_description";
// Add a page number if necessary.
if ( $paged >= 2 || $page >= 2 )
$title = "$title $sep " . sprintf( __( 'Page %s', '' ), max( $paged, $page ) );
return $title;
}
add_filter( 'wp_title', 'bartleby_wp_title', 10, 2 );