<?php
/*
 * Define some constants. These are ment to be changed by the theme author, it is NOT sure your theme
 * supports any changes to these constants. Try at your own risk. =)
 */
//header
define('WEBFISH_CUSTOM_HEADER',false);
define('WEBFISH_CUSTOM_HEADER_DEFAULT',"none");
define("WEBFISH_COSTOM_HEADER_ID","header");

//general
define("WEBFISH_HEADER_INSIDE_WRAPPER",true);
define("WEBFISH_COLUMNS_INDEX",2);
define("WEBFISH_COLUMNS_SINGLE",2);
define("WEBFISH_COLUMNS_PAGE",2);
define("WEBFISH_COLUMNS_FRONT_PAGE",2);//only if frontpage is a static page
define("WEBFISH_FOOTER_INSIDE_WRAPPER",true);

//sidebar
define("WEBFISH_SIDEBARS_IN_FOOTER",0);

//thumbnails
define("WEBFISH_USE_THUMBNAILS",false);
set_post_thumbnail_size( 150, 150, false ); 

//include importent stuff
include_once "base-functions.php";


/*
 * Register sidebars
 * If the sidebar should be beside the content, use this naming pattern
 * sidebar[1-9](-(index|frontpage|page|single))?
 * If you use more than one sidebar you must have a number 1-9
 * If you want a different sidebar on, say single, you have to specify that with a tailoring -single
 * See prioritation in sidebar.php
 * 
 * name=>description
 */
base_register_sidebars(array(
"sidebar1-index"=>__("Just a simple sidebar","webfish"),
"sidebar"=>__("Why not put some widgets in the footer","webfish")
));


//register menus
register_nav_menus( array(
	'primary' => __('Main menu',"webfish"),
) );

/*
 * Add some built in functionallity
 */

// This theme allows users to set a custom background
add_custom_background();

//Wordpress wants to know the width of the page.
if ( ! isset( $content_width ) ) $content_width = 900;





/*
 * Add the appearance for a comment
 */
if ( ! function_exists( 'webfish_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own webfish_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function webfish_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'webfish' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'webfish' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'webfish' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'webfish' ), ' ' );
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
		<p><?php _e( 'Pingback:', 'webfish' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'webfish'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;







/*
 * Load the settings once. 
 * 
 * Do not change bellow this line
 */
$webfish_settings=get_option(WEBFISH_THEME_NAME.'_theme_settings');
