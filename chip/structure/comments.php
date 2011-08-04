<?php
/** Chip Lige Get Comments Template */
function chip_life_comments_template_single_init() {

	$chip_life_options = get_chip_life_options();	
	
	/** Logic Manipulation */
	if ( is_single() && ( $chip_life_options['chip_life_trackbacks_posts'] == 1 || $chip_life_options['chip_life_comments_posts'] == 1 ) ) {
		comments_template( '', true );
	}
	
	else if ( is_page() && ( $chip_life_options['chip_life_trackbacks_pages'] == 1 || $chip_life_options['chip_life_comments_pages'] == 1 ) ) {
		comments_template( '', true );
	}
	
	return;

}

/** Chip Life Comments */
add_action( 'chip_life_comments', 'chip_life_comments_init' );
function chip_life_comments_init() {
	global $post, $wp_query;

	$chip_life_options = get_chip_life_options();
	
	/** Check Permissions */
	if ( ( is_page() && $chip_life_options['chip_life_comments_pages'] != 1 ) || ( is_single() && $chip_life_options['chip_life_comments_posts'] != 1 ) ) {
		return;
	}

	if ( have_comments() && ! empty( $wp_query->comments_by_type['comment'] ) ) : ?>

	<div id="comments" class="comment-content">
		<?php echo apply_filters( 'chip_life_title_comments_text', '<h2 id="comments-title">Comments</h2>' ); ?>
		<ol class="commentlist">
			<?php do_action( 'chip_life_list_comments' ); ?>
		</ol>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		<div class="clear"></div>
        </div>
	</div><!--end #comments-->

	<?php else: ?>

	<div id="comments">
		<?php if ( 'open' == $post->comment_status ) : ?>
		<!-- If comments are open, but there are no comments. -->
		<?php echo apply_filters( 'chip_life_no_comments_text', '' ); ?>

		<?php else: ?>
		<!-- If comments are closed. -->
		<?php echo apply_filters( 'chip_life_comments_closed_text', '' ); ?>

		<?php endif; ?>
	</div><!--end #comments-->

	<?php endif; ?>

<?php
}

/** Chip Life Comments List */
add_action( 'chip_life_list_comments', 'chip_life_list_comments_init' );
function chip_life_list_comments_init() {
	
	$args = array( 'type' => 'comment', 'avatar_size' => 48, 'callback' => 'chip_life_comment_callback' );
	$args = apply_filters( 'chip_life_comment_list_args', $args );
	wp_list_comments( $args );

}

/** Chip Life Pings */
add_action( 'chip_life_pings', 'chip_life_pings_init' );
function chip_life_pings_init() {
	global $post, $wp_query;

	$chip_life_options = get_chip_life_options();
	
	/** Check Permissions */
	if ( ( is_page() && $chip_life_options['chip_life_trackbacks_pages'] != 1 ) || ( is_single() && $chip_life_options['chip_life_trackbacks_posts'] != 1 ) ) {
		return;
	}

	if ( have_comments() && !empty( $wp_query->comments_by_type['pings'] ) ) : ?>

	<div id="pings" class="ping-content">
		<?php echo apply_filters( 'chip_life_title_pings_text', '<h2 id="pings-title">Trackbacks</h2>' ); ?>

		<ol class="commentlist">
			<?php do_action( 'chip_life_list_pings' ); ?>
		</ol>
	</div><!-- end #pings -->

	<?php else : // this is displayed if there are no pings ?>

		<?php echo apply_filters( 'chip_life_no_pings_text', '' ); ?>

	<?php endif; // endif have pings ?>

<?php
}

/** Chip Life Pings List */
add_action( 'chip_life_list_pings', 'chip_life_list_pings_init' );
function chip_life_list_pings_init() {
	
	$args = array( 'type' => 'pingback', 'avatar_size' => 48, 'callback' => 'chip_life_comment_callback' );
	$args = apply_filters( 'chip_life_pings_list_args', $args );
	wp_list_comments( $args );
	
}

/** Chip Life Comment Form */
add_action( 'chip_life_comment_form', 'chip_life_comment_form_init' );
function chip_life_comment_form_init() {
	global $user_identity, $id;

	$chip_life_options = get_chip_life_options();
	
	/** Check Permissions */
	if ( ( is_page() && $chip_life_options['chip_life_comments_pages'] != 1 ) || ( is_single() && $chip_life_options['chip_life_comments_posts'] != 1 ) ) {
		return;
	}

	$args = array();
	comment_form( apply_filters( 'chip_life_comment_form_args', $args ) );
}

/** Chip Life Comment Callback */
function chip_life_comment_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $args['type'] ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						//echo get_avatar( $comment, $avatar_size );
						echo get_avatar( $comment, $size = $args['avatar_size'] );

						/* translators: 1: comment author, 2: date and time */
						printf( '%1$s on %2$s <span class="says">said:</span>',
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><span class="time pubdate datetime">%3$s</span></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( '%1$s at %2$s', get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
					<br />
				<?php endif; ?>

			</div>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
?>