<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Simple
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_single() && has_post_thumbnail( $post->ID ) ) : ?>
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


	<?php elseif ( ! is_single() && ! has_post_thumbnail( $post->ID ) ) : ?>

			<header class="nothumb entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php best_simple_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header>

	<?php else : ?>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php best_simple_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header>

	<?php endif; ?>
	<!-- Enclosure 1 ends here -->

	<div class="entry-content">
		<?php
		if ( is_single() ) :
			the_content();
		else :
			echo '<div class="excerpt">';
				the_excerpt();
			echo '</div>';

		endif;
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'best-simple' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->
	<?php if ( is_single() ) : ?>
		<footer class="entry-footer">
			<?php best_simple_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article>
