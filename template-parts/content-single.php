 <?php 
 /*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Best Learner
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-meta">
		<?php best_learner_posted_on();
		best_learner_entry_meta(); ?>
	</div><!-- .entry-meta -->	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'best-learner' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php best_learner_posts_tags(); ?>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'best-learner' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>	
</article><!-- #post-## -->