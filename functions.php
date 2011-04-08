<?php
if ( !isset( $content_width ) ) $content_width = 760;
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'menu', 'Menu' );
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
function new_excerpt_more($more) { return '....'; }
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_length($length) {
	return 250;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_custom_background();
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_image_size( 'page-thumbnail', 740, 9999, true );

function print_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
    	<li>
        <div id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
        	<div class="avatar">
				<?php echo get_avatar( $comment, 100 ); ?>
            </div>
                <div class="commentinfo"><?php comment_author_link() ?> commented</div>
                
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
                    <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    
					<div class="right"><?php comment_date() ?> at <?php comment_time() ?> <?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
		</div>

<?php } ?>