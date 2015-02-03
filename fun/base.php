<?php
function fmi_theme_comment($comment,$args,$depth){
	$GLOBALS['comment'] = $comment;
	$args['avatar_size'] = 40;
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ){
?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php echo __( 'Pingback:', 'fmi' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'fmi' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

<?php
	}else{
?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-author"><?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
        
			<div class="comment-meta">
            	<span class="fn"><?php echo get_comment_author_link();?></span>
				<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'fmi' ), get_comment_date(), get_comment_time() ); ?></time>
				</a></span>
                <?php edit_comment_link( __( 'Edit', 'fmi' ), '<span><i class="fa fa-edit"></i> ', '</span>' ); ?>

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php echo __( 'Your comment is awaiting moderation.', 'fmi' ); ?></p>
				<?php endif; ?>
			</div>

			<div class="mscont comment-content"><?php comment_text();?></div>

			<div class="reply"><?php comment_reply_link( array_merge( $args, array('reply_text' => '<i class="fa fa-retweet"></i>', 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
            
            <div class="clear"></div>
		</div>
<?php
	}
}

function fmi_post_nav() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) return;

	echo '<div role="navigation" id="nav-below" class="navigation-post">';
	previous_post_link( '<div class="nav-previous">%link</div>', '<h3>'.__('Previous Post','fmi').'</h3>%title');
	next_post_link( '<div class="nav-next">%link</div>', '<h3>'.__('Next Post','fmi').'</h3>%title'); 
	echo '<div class="clear"></div>';
	echo '</div>';
}
?>