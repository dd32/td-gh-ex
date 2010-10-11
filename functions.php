<?php

/* Set the content width based on the theme's design and stylesheet. 
 * 
 * Used to set the width of images and content. Should be equal to the width the theme 
 * is designed for, generally via the style.css stylesheet. 
 */ 
if ( ! isset( $content_width ) ) 
    $content_width = 500; 

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
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'anIMass_header_image_width', 860 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'anIMass_header_image_height', 162 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyten_admin_header_style(), below.
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
		)
		) );



}
endif;
if ( ! function_exists( 'anIMass_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in anIMass_setup().
 *
 * @since anIMass 7.0
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


?>
<?php
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


if ( ! function_exists( 'anIMass_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
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
?>