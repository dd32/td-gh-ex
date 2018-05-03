<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Simple
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
		<!-- Enclosure 1 if_condition -->
		<div class="entry-wrapper has-thumb">
			<figure class="post-thumbnail featured">
				<a href=" <?php echo esc_url( get_permalink( $post->ID ) ); ?> ">
				<?php

					$best_simple_get_layout = get_theme_mod( 'best_simple_homepage_layout_settings', 'grid' );

				if ( 'grid' === $best_simple_get_layout ) {
					$best_simple_size = 'best-simple-grid-thumbnail';
				} elseif ( 'left-sidebar' === $best_simple_get_layout ) {
					$best_simple_size = 'best-simple-left-right-thumbnail';
				} elseif ( 'right-sidebar' === $best_simple_get_layout ) {
					$best_simple_size = 'best-simple-left-right-thumbnail';
				}

				?>
					<?php the_post_thumbnail( $best_simple_size ); ?>
				</a>
			</figure>
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php best_simple_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header>
		</div>

	<?php else : ?>

			<header class="nothumb entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php best_simple_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header>

	<?php endif; ?>

	<div class="excerpt">
		<?php the_excerpt(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

