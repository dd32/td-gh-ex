<?php 
//Retrieve Theme Options Data
global $options;
$options = get_option('aplau_theme_options');

//Add Theme Options File
require_once ('functions/theme-options.php');

//Redirect to Theme Options Page on Activation
if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" )
	wp_redirect( 'admin.php?page=theme-options.php' );
 ?>
<?php
if ( ! isset( $content_width ) )
	$content_width = 640;
/** Tell WordPress to run aplau_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'aplau_setup' );

if ( ! function_exists( 'aplau_setup' ) ):
function aplau_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	add_theme_support( 'custom-header');
	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'aplau' ),
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'secondary' => __( 'Secondary Navigation', 'aplau' ),
	) );
	
if (function_exists('get_custom_header')) {
	add_theme_support('custom-header', array (
	    // Header image default
	    'default-image'			=> get_template_directory_uri() . '/images/logo.png',
	    // Header text display default
	    'header-text'			=> false,
	    // Header image flex width
		'flex-width'             => true,
	    // Header image width (in pixels)
	    'width'				    => 156,
		// Header image flex height
		'flex-height'            => true,
	    // Header image height (in pixels)
	    'height'			        => 63));
		}
		
function get_display_name($user_id) {
    if (!$user = get_userdata($user_id))
        return false;
    return $user->data->display_name;
}
		
// custom admin login logo
function aplau_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
	</style>';
}
add_action('login_head', 'aplau_login_logo');

/** Custom Login Link **/
function aplau_login_logo_url() {
    return ('http://aplau.com');
}
add_filter( 'login_headerurl', 'aplau_login_logo_url' );

function aplau_login_logo_url_title() {
    return get_bloginfo('title');
}
add_filter( 'login_headertitle', 'aplau_login_logo_url_title' );
}
function aplau_login_stylesheet() { ?>
    <link rel="stylesheet" id="aplau_wp_admin_css"  href="<?php echo get_stylesheet_directory_uri() . '/style-login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'aplau_login_stylesheet' );
{
?>
<?php
}
endif;

function aplau_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'aplau_page_menu_args' );

function aplau_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'aplau_excerpt_length' );

// WP Title
 function aplau_filter_wp_title( $title ) {
	if ( is_feed() )
		return "$title";
    // Get the Site Name
    $site_name = bloginfo( 'name' );
	// Add the blog description for the home/front page
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &#187; $site_description";
	// Add a page number if necessary:
		global $page, $paged;
	if ( $paged >= 2 || $page >= 2 )
		echo ' &#187; ' . sprintf( __( 'Page %s', 'aplau' ), max( $paged, $page ) );
    // Prepend name
    $filtered_title = $title;
    // Return the modified title
    return $filtered_title;
}
add_filter( 'wp_title', 'aplau_filter_wp_title' );

/**
 * Where the post has no post title, but must still display a link to the single-page post view.
 */
add_filter('the_title', 'aplau_title');

function aplau_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}

/**
 * Returns a "Continue Reading" link for excerpts
 * @since aplau 1.0
 * @return string "Continue Reading" link
 */
function aplau_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'read more <span class="meta-nav">&#187;</span>', 'aplau' ) . '</a>';
}

function aplau_auto_excerpt_more( $more ) {
	return ' &hellip;' . aplau_continue_reading_link();
}
add_filter( 'excerpt_more', 'aplau_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function aplau_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= aplau_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'aplau_custom_excerpt_more' );

add_filter( 'use_default_gallery_style', '__return_false' );

function aplau_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.3.
if ( version_compare( $GLOBALS['wp_version'], '3.4', '<' ) )
	add_filter( 'gallery_style', 'aplau_remove_gallery_css' );

if ( ! function_exists( 'aplau_comment' ) ) :
function aplau_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'aplau' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'aplau' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'aplau' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'aplau' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'aplau' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'aplau' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

function aplau_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'aplau' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'aplau' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'aplau' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'aplau' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running aplau_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'aplau_widgets_init' );

function aplau_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'aplau_remove_recent_comments_style' );

if ( ! function_exists( 'aplau_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * @since aplau 1.0
 */
function aplau_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'aplau' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'aplau' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'aplau_posted_in' ) ) :
function aplau_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'Posted in %1$s and tagged %2$s.', 'aplau' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'Posted in %1$s.', 'aplau' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'aplau' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
