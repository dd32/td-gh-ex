<?php
/**
 * The default template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php fgymm_the_content_single(); ?>
	</div>
	<div class="page-after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<?php if ('open' == $post->comment_status) : ?>
			<span class="comments-icon">
				<?php comments_popup_link(__( 'No Comments', 'fgymm' ), __( '1 Comment', 'fgymm' ), __( '% Comments', 'fgymm' ), '', __( 'Comments are closed.', 'fgymm' )); ?>
			</span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'fgymm' ), '<span class="edit-icon">', '</span>' ); ?>
	</div>
</article>
