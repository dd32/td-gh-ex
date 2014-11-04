<?php
/**
 * The default template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php tishonator_the_content_single(); ?>
	</div>
	<div class="page-after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
		<?php if ('open' == $post->comment_status) : ?>
			<span class="comments-icon">
				<?php comments_popup_link(__( 'No Comments', 'tishonator' ), __( '1 Comment', 'tishonator' ), __( '% Comments', 'tishonator' ), '', __( 'Comments are closed.', 'tishonator' )); ?>
			</span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'tishonator' ), '<span class="edit-icon">', '</span>' ); ?>
	</div>
</article>
