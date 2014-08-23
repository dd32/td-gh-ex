<?php 
/*
 * Set up the content width value based on the theme's design.
 */
 if ( ! function_exists( 'besty_setup' ) ) :
function besty_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 745;
	}
	/*
	 * Make besty theme available for translation.
	 */
	load_theme_textdomain( 'besty', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', besty_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// This theme uses wp_nav_menu() in two locations.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'besty-full-width', 1038, 576, true );
	add_image_size( 'besty-thumbnail', 374, 254, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'besty' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support( 'custom-background', apply_filters( 'besty_custom_background_args', array(
	'default-color' => 'fafafa',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'besty_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // besty_setup
add_action( 'after_setup_theme', 'besty_setup' );
/**
 * Register Lato Google font for besty.
 */
function besty_font_url() {
	$besty_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Istok Web: on or off', 'besty' ) ) {
		$besty_font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $besty_font_url;
}
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own besty_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
 if ( ! function_exists( 'besty_comment' ) ) :
function besty_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
			?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p>
				<?php _e( 'Pingback:', 'besty' ); ?>
				<?php comment_author_link(); ?>
				<?php edit_comment_link( __( '(Edit)', 'besty' ), '<span class="edit-link">', '</span>' ); ?>
				</p>
			</li>
			<?php
			break;
		default :
		// Proceed with normal comments.
		if($comment->comment_approved==1)
		{
			global $post;
		?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); 
			?>">
			<article id="comment-<?php comment_ID(); ?>">
			<figure class="comment-author"><?php echo get_avatar( get_the_author_meta('ID'), '41'); ?></figure>
			<div class="comment-content">
           <?php
		   		printf( '<div class="comment-metadata"><span>%1$s</span>',get_comment_author_link(),( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author ', 'besty' ) . '</span>' : '');
				
				echo '<span>'.get_comment_date('F j, Y').'<span>';
				
				echo comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'besty' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) )).'</div>';
				
				?>
                <div class="comment-content-main">
                <?php comment_text(); ?>
                </div>
		  <!-- .comment-content --> 
			</div>
			</article>
            </li>
	  <!-- #comment-## -->
	  <?php
			}
		break;
	endswitch; // end comment_type check
}
endif;  //besty_comment();
/**
 * Register our sidebars and widgetized areas.
 *
 */
function besty_widgets_init() {
	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'main_sidebar',
		'class' => 'nav-list',
		'before_widget' => '<aside class="besty-widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'besty_widgets_init' );
/*** Enqueue css and js files ***/
require_once('functions/enqueue-files.php');
/*** Theme Default Setup ***/
require_once('functions/theme-default-setup.php');
/*** Latest Posts Widgets ***/
require_once('functions/besty-latest-posts.php');
/*** Theme Option ***/
require_once('theme-option/fasterthemes.php');
/*** Custom Header ***/
require_once('functions/custom-header.php');