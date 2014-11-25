<?php
/**
 * The default template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php fmuzz_the_content_single(); ?>
	</div>
	<div class="page-after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<?php if ('open' == $post->comment_status) : ?>
			<span class="comments-icon">
				<?php comments_popup_link(__( 'No Comments', 'fmuzz' ), __( '1 Comment', 'fmuzz' ), __( '% Comments', 'fmuzz' ), '', __( 'Comments are closed.', 'fmuzz' )); ?>
			</span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'fmuzz' ), '<span class="edit-icon">', '</span>' ); ?>
	</div>
</article>
