<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage atlas_concern
 * @since atlas_concern
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>

	<div class="entry-meta">
			<?php atlas_concern_posted_on(); ?>
		</div><!-- .entry-meta -->
               <?php the_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'atlas-concern' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'atlas-concern' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );


		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
		<?php
	
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'atlas-concern' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
