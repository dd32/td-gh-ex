<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Aileron
 */
?>

<div class="post-wrapper-hentry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-content-wrapper post-content-wrapper-single post-content-wrapper-single-page">

			<?php aileron_post_thumbnail_single(); ?>

			<div class="entry-data-wrapper">
				<div class="entry-header-wrapper">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( aileron_has_post_edit_link() ) : ?>
					<div class="entry-meta entry-meta-header-after">
						<?php aileron_post_edit_link(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</div><!-- .entry-header-wrapper -->

				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aileron' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .entry-content -->

				<?php if ( aileron_has_post_edit_link() ) : ?>
				<footer class="entry-meta entry-meta-footer">
					<?php aileron_entry_footer(); ?>
				</footer><!-- .entry-meta -->
				<?php endif; ?>
			</div><!-- .entry-data-wrapper -->

		</div><!-- .post-content-wrapper -->
	</article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
