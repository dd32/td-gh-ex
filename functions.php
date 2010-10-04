<?php


// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation'),
                'secondary' => __( 'Secondary Navigation'),
                'tertiary' => __( 'Tertiary Navigation'),
	) );


if ( function_exists('register_sidebar') )
    register_sidebar();    

define('HEADER_IMAGE', '%s/images/headers/header.jpg');
define('HEADER_IMAGE_WIDTH', 860);
define('HEADER_IMAGE_HEIGHT', 162);
define('HEADER_TEXTCOLOR', '444444');

function header_style() {
?>
<style type="text/css">
header{
background: url(<?php header_image(); ?>)  no-repeat;
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
header h1 a{color:#<?php header_textcolor();?>;}
</style>
<?php
}
function admin_header_style() {
?>
<style type="text/css">
#headimg{
background:#ffffff url(<?php header_image() ?>) bottom center no-repeat;
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
text-align:center;
text-transform:uppercase;
}
#headimg h1{font-size:2.5em; padding:25px 0 0 0; margin:0 0 15px 0;}
#headimg h1 a{border-bottom:1px solid #dddddd; color:#444444; text-decoration:none;}
#headimg p{color:#777777; font-size:1.2em;}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
add_custom_image_header('header_style', 'admin_header_style');
add_custom_background();

} 
 
if(function_exists('add_theme_support')) {  
add_theme_support('automatic-feed-links');  
add_editor_style();
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'hp-post-thumbnail', 200, 200, true ); // Homepage thumbnail size
add_image_size( 'single-post-thumbnail', 300, 9999 ); // Permalink t

add_theme_support('menus');
} 
/* Set the content width based on the theme's design and stylesheet. 
 * 
 * Used to set the width of images and content. Should be equal to the width the theme 
 * is designed for, generally via the style.css stylesheet. 
 */ 
if ( ! isset( $content_width ) ) 
    $content_width = 500; 


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


if ( ! function_exists( 'twentyten_comment' ) ) :
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
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
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
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
?>