<?php
/**
 * anIMass functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, anIMass_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'anIMass_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage anINmass
 * @since anIMass v7.0
 *   */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) ) 
    $content_width = 460; 

/** Tell WordPress to run anIMass_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'anIMass_setup' );

if ( ! function_exists( 'anIMass_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override anIMass_setup() in a child theme, add your own anIMass_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since anIMass 7.2
 */
function anIMass_setup() {

// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'anIMass', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'anIMass' ),
	) );
	
	
	
// This theme allows users to set a custom background
	add_custom_background();
  
  // Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '444444' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/header.jpg' );
  
  //The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to anIMass_header_image_width and anIMass_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'anIMass_header_image_width', 860 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'anIMass_header_image_height', 162 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 860 pixels wide by 162 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See anIMass_admin_header_style(), below.
	add_custom_image_header( '', 'anIMass_admin_header_style' );

	// ... and thus ends the changeable header business.
  
  
  // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.	
	register_default_headers( array(
		'mview' => array(
			'url' => '%s/images/headers/mview.jpg',
			'thumbnail_url' => '%s/images/headers/mview-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Mountain View', 'anIMass' )
		),
		'anewday' => array(
			'url' => '%s/images/headers/anewday.jpg',
			'thumbnail_url' => '%s/images/headers/anewday-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'A New Day', 'anIMass' )
		),
		'dream-on' => array(
			'url' => '%s/images/headers/dream-on.jpg',
			'thumbnail_url' => '%s/images/headers/dream-on-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Dream-On', 'anIMass' )
		),
			'pastValencia' => array(
			'url' => '%s/images/headers/pastValencia.jpg',
			'thumbnail_url' => '%s/images/headers/pastValencia-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Past Valencia', 'anIMass' )
		),
    	'header2' => array(
			'url' => '%s/images/headers/headernew.jpg',
			'thumbnail_url' => '%s/images/headers/headernew-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Headernew', 'anIMass' )
				)
		) );
}
endif;
if (function_exists('add_theme_support')) { 
   add_theme_support('nav-menus');}


if ( ! function_exists( 'anIMass_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in anIMass_setup().
 *
 * @since anIMass 1.0
 */
function anIMass_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;


/**
 * Register sidebar
 */

if ( function_exists('register_sidebar') )
    register_sidebar();    


set_post_thumbnail_size( 50, 50, true );
add_image_size( 'hp-post-thumbnail', 200, 200, true ); // Homepage thumbnail size
add_image_size( 'single-post-thumbnail', 300, 9999 ); // Permalink t





function my_own_gravatar( $avatar_defaults ) {
    $myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';
    $avatar_defaults[$myavatar] = 'RPD_GRAVATAR';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'my_own_gravatar' );

// smart jquery inclusion
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since anIMass 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). anIMass uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function anIMass_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;
		
	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'anIMass' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'anIMass' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'anIMass' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
	
	

	
}
add_filter( 'wp_title', 'anIMass_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since anIMass 1.0
 */
function anIMass_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'anIMass_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since anIMass 1.0
 * @return int
 */
function anIMass_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'anIMass_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since anIMass 1.0
 * @return string "Continue Reading" link
 */
function anIMass_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'anIMass' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and anIMass_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function anIMass_auto_excerpt_more( $more ) {
	return ' &hellip;' . anIMass_continue_reading_link();
}
add_filter( 'excerpt_more', 'anIMass_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since anIMass 7.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function anIMass_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= anIMass_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'anIMass_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in anIMass's style.css.
 *
 * @since anIMass 7.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function anIMass_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'anIMass_remove_gallery_css' );


if ( ! function_exists( 'anIMass_comment' ) ) :

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since anIMass 7.0
 */
function anIMass_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'anIMass' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'anIMass' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'anIMass' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'anIMass' ), ' ' );
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
		<p><?php _e( 'Pingback:', 'anIMass' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'anIMass'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since anIMass 1.0
 */
function anIMass_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'anIMass_remove_recent_comments_style' );

if ( ! function_exists( 'anIMass_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since anIMass 1.0
 */
function anIMass_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'anIMass' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'anIMass' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'anIMass_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since anIMass 7.0
 */
function anIMass_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'anIMass' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'anIMass' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'anIMass' );
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