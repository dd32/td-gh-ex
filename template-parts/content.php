<?php
/**
 * The default template for displaying content
 *
 * @package Keratin
 */
?>

<div class="post-wrapper-hentry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-content-wrapper post-content-wrapper-archive">

			<div class="entry-data-wrapper">
				<?php keratin_post_thumbnail(); ?>

				<div class="entry-header-wrapper">
					<?php if ( 'post' === get_post_type() ) : // For Posts ?>
					<div class="entry-meta entry-meta-header-before">
						<?php
						keratin_posted_by();
						keratin_posted_on();
						keratin_post_category();
						keratin_sticky_post();
						keratin_comment_count();
						?>
					</div><!-- .entry-meta -->
					<?php endif; ?>

					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->
				</div><!-- .entry-header-wrapper -->

				<?php if ( keratin_has_excerpt() ) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php endif; ?>

				<?php
				if ( keratin_has_read_more_label() ) {
					keratin_read_more_link();
				}
				?>
			</div><!-- .entry-data-wrapper -->

		</div><!-- .post-content-wrapper -->
	</article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
