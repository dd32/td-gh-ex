<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php
			printf( _n( 'One thought on', '%1$s thoughts on', get_comments_number(), 'bassist' ), number_format_i18n( get_comments_number()) );
			printf( ' &ldquo;%1$s&rdquo;', get_the_title() );

		?>
	</h2>

	<?php 	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				bassist_comments_navigation();
			endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 34,
				'reply_text' => '<i class="fa fa-reply" aria-hidden="true"></i>' . __('Reply', 'bassist'),
			) );
		?>
	</ol><!-- .comment-list -->

	<?php 	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				bassist_comments_navigation();
			endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'bassist' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form( array( 'cancel_reply_link' => '<i class="fa fa-times" aria-hidden="true"></i><span class="screen-reader-text">'. __('Cancel Reply', 'bassist').'</span>')); ?>

</div><!-- #comments -->