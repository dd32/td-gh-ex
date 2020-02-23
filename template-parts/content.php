<?php
/**
 * The default template for displaying content
 *
 * @package Aileron
 */
?>

<div class="post-wrapper-hentry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-content-wrapper post-content-wrapper-archive">

			<div class="entry-data-wrapper">
				<div class="entry-header-wrapper">
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( 'post' === get_post_type() ) : // For Posts ?>
					<div class="entry-meta entry-meta-header-after">
						<?php
						aileron_posted_by();
						aileron_posted_on();
						aileron_post_category();
						aileron_sticky_post();
						aileron_comment_count();
						?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</div><!-- .entry-header-wrapper -->

				<?php aileron_post_thumbnail(); ?>

				<?php if ( aileron_has_excerpt() ) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php endif; ?>

				<?php
				if ( aileron_has_read_more_label() ) {
					aileron_read_more_link();
				}
				?>
			</div><!-- .entry-data-wrapper -->

		</div><!-- .post-content-wrapper -->
	</article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
