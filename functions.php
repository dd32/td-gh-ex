<?php
if ( ! isset( $content_width ) ) $content_width = 900;
function bartleby_theme_option_page() {
require_once ( get_stylesheet_directory() . '/theme-options.php' );
}
add_action( 'admin_init', 'bartleby_theme_option_page' );
function bartleby_theme_setup() {
register_nav_menu( 'main-menu', __( 'Main Menu', 'bartleby' ) );
register_nav_menu( 'bottom-menu', __( 'Footer Menu', 'bartleby' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 280, 210, true);
add_theme_support( 'custom-background', array(
// Background color default
'default-color' => 'fff'
) );
function add_nofollow_cat( $text ) {
$text = str_replace('rel="category"', '', $text); 
$text = str_replace('rel="category tag"', 'rel="tag"', $text); 
return $text;
}
add_filter( 'the_category', 'add_nofollow_cat' );
add_editor_style('/inc/custom-editor-style.css');
// Puts link in excerpts more tag
function new_excerpt_more($more) {
global $post;
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/* Thanks to bavotasan */
function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}
add_filter('the_title', 'blank_slate_title');
function blank_slate_title($title) {
if ($title == '') {
return 'Untitled Post';
} else {
return $title;
}
}
add_filter('short_title', 'home_short_title');
function home_short_title($title) {
if ($title == '') {
return 'Untitled Post';
} else {
return $title;
}
}
/* Thanks to One Trick Pony, StackExchange */
add_filter('post_class', 'my_post_class');
function my_post_class($classes){
  global $wp_query;
  if(($wp_query->current_post+1) == $wp_query->post_count) $classes[] = 'last';
  return $classes;
}
/* Secondary Excerpt by c.bavota - thanks! */
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}	
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
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
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content); 
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
}
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
$title = "$title $sep " . sprintf( __( 'Page %s', 'bartleby' ), max( $paged, $page ) );
return $title;
}
add_filter( 'wp_title', 'bartleby_wp_title', 10, 2 );
add_action( 'after_setup_theme', 'bartleby_theme_setup' );
/* Scripts, Fonts & Styles */
/**
 * Enqueue Google Fonts
 */
function bartleby_ucfont() {
		wp_register_style( 'ubuntu-bartleby', "//fonts.googleapis.com/css?family=Ubuntu+Condensed" );
}
add_action( 'init', 'bartleby_ucfont' );
function bartleby_jsfont() {
		wp_register_style( 'josefin-bartleby', "//fonts.googleapis.com/css?family=Josefin+Slab" );
}
add_action( 'init', 'bartleby_jsfont' );
function bartleby_scripts_styles() {
	global $wp_styles;
	wp_register_style( 'bartleby-foundation-style', get_template_directory_uri() . '/stylesheets/foundation.min.css', 
	array(), 
	'2132013', 
	'all' );
		// enqueing:
	wp_enqueue_style( 'bartleby-foundation-style' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'ubuntu-bartleby' );
	wp_enqueue_style( 'josefin-bartleby' );
	wp_enqueue_script( 'bartleby-navigation', get_template_directory_uri() . '/javascripts/navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'foundation-modernizr', get_template_directory_uri() . '/javascripts/modernizr.foundation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'bartleby_scripts_styles' );
function bartleby_sidebars() {
register_sidebar(array(
'name' => __( 'Right Sidebar', 'bartleby' ),
'id' => 'sidebar',
'description' => __( 'Widgets in this area will be shown on the right-hand side.', 'bartleby' ),
'before_widget' => '<div>',
'after_widget' => '</div>',
'before_title' => '<div class="sidebar-title-block"><h4 class="sidebar">',
'after_title' => '</h4></div>',
));
register_sidebar(array(
'name' => __( 'Below Posts' , 'bartleby' ),
'id' => 'belowposts-sidebar',
'description' => __( 'Widgets in this area will be shown beneath the blog post type. Use this for sharing, related articles and more.' , 'bartleby' ),
'before_title' => '<h1>',
'after_title' => '</h1>',
'before_widget' => '<div class="bottom-widget">',
'after_widget' => '</div>',
));
}
add_action ( 'bartleby_sidebars', 'widgets_init' );
/* Twenty Twelve Comments */
function bartleby_comment( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
switch ( $comment->comment_type ) :
case 'pingback' :
case 'trackback' :
// Display trackbacks differently than normal comments.
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<p><?php _e( 'Pingback:', 'bartleby' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'bartleby' ), '<span class="edit-link">', '</span>' ); ?></p>
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
( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'bartleby' ) . '</span>' : ''
);
printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
esc_url( get_comment_link( $comment->comment_ID ) ),
get_comment_time( 'c' ),
/* translators: 1: date, 2: time */
sprintf( __( '%1$s at %2$s', 'bartleby' ), get_comment_date(), get_comment_time() )
);
?>
</header><!-- .comment-meta -->
<?php if ( '0' == $comment->comment_approved ) : ?>
<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bartleby' ); ?></p>
<?php endif; ?>
<section class="comment-content comment">
<?php comment_text(); ?>
<?php edit_comment_link( __( 'Edit', 'bartleby' ), '<p class="edit-link">', '</p>' ); ?>
</section><!-- .comment-content -->
<div class="reply">
<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'bartleby' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div><!-- .reply -->
</article><!-- #comment-## -->
<?php
break;
endswitch; // end comment_type check
}