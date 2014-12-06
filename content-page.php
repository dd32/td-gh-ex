<?php
/**
 * The default template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php fkidd_the_content_single(); ?>
	</div>
	<div class="page-after-content">
		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

				<span class="comments-icon">
					<?php comments_popup_link(__( 'No Comments', 'fkidd' ), __( '1 Comment', 'fkidd' ), __( '% Comments', 'fkidd' ), '', __( 'Comments are closed.', 'fkidd' )); ?>
				</span>

		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'fkidd'), '<span class="edit-icon">', '</span>' ); ?>
	</div>
</article>
