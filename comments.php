<?php 
/**
 * The comments template file.
 *
 * @package aesblo
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title text-divider">
			<span class="fa fa-comments fa-lg"></span>
			<?php 
				printf( '%1$s %2$d',
					__( 'Comments', 'aesblo' ),
					get_comments_number()
				);
			?>
		</h3>
		
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->
		
		<?php aesblo_comments_paging(); ?>
	<?php endif; ?>
	
	<?php
		// Leave a note if comments are closed
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'aesblo' ); ?></p>
	<?php endif; ?>	
	
	<?php 
		comment_form( array(
			'title_reply'					=> '<span class="fa fa-pencil fa-lg"></span>' . __( 'Leave a Reply', 'aesblo' )
		) ); 
	?>
</div>