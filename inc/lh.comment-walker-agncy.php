<?php
/**
 * Comment API: Walker_Comment_Agncy class
 *
 * @package agncy
 */

/**
 * Core walker class used to create an HTML list of comments.
 *
 * @see Walker
 */
class Walker_Comment_Agncy extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( ( $this->has_children ? 'parent' : '' ) . ' has-primary-background-color', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta has-primary-background-color">
					<div class="highlight-bar has-secondary-background-color"></div>
					<div class="comment-avatar">
						<?php
						if ( 0 != $args['avatar_size'] ) {
							echo get_avatar( $comment, $args['avatar_size'] );
						}
						?>
					</div>

					<div class="comment-metadata">
						<div class="comment-author vcard">
							<?php
								echo wp_kses_post(
									sprintf(
										/* translators: %s: comment author link */
										__( '%s <span class="says">says:</span>', 'agncy' ),
										sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
									)
								);
							?>
						</div><!-- .comment-author -->
						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									echo esc_attr( sprintf( __( '%1$s at %2$s', 'agncy' ), get_comment_date( '', $comment ), get_comment_time() ) );
								?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'agncy' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->
					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below'  => 'div-comment',
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
								'before'     => '<div class="reply">',
								'after'      => '</div>',
								'reply_text' => '<i class="fa fa-comment"></i><span class="text">' . __( 'Reply', 'agncy' ) . '</span>',
							)
						)
					);
					?>
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'agncy' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

			</article><!-- .comment-body -->
		<?php
	}
}
