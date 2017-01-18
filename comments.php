<?php
/**
* The template for displaying comments
*
* The area of the page that contains both current comments
* and the comment form.
*
* @package WordPress
* @subpackage abaya
* @since abaya 1.0
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if (post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="comment-reply-title">
			 <?php comment_form_title(__('Page with Comments', 'abaya'), __('COMMENTS to %s', 'abaya')); ?>
		</h3>
		<?php abaya_comment_nav(); ?>
		<ol class="commentlist">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->
		<?php abaya_comment_nav(); ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')):
	?>
		<p class="no-comments"><?php _e('Comments are closed.', 'abaya'); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div><!-- .comments-area -->