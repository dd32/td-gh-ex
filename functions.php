<?php
if ( !isset( $content_width ) ) $content_width = 730;
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'menu', 'Menu' );
if ( function_exists('register_sidebar') ) register_sidebar( array(
    'name' => __( 'Widgets', 'simplest' ),
    'id' => 'widgets',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div><!-- widget -->',
    'before_title' => '<h4>',
    'after_title' => '</h4>') );
   
function print_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
    	
        <div id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
		<div id="commentbody">
        	<div id="avatar">
				<?php echo get_avatar( $comment, 100 ); ?>
            </div>
            <div id="commentz">
                <div id="commentlabel"><?php comment_author_link() ?> commented</div>
                
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
                    <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
					<?php comment_date() ?> at <?php comment_time() ?>
                    
                    <div class="alignleft"><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
                    
            </div>
            
			<div class="cl">&nbsp;</div>
		</div></div>
	<?php
}
   
?>