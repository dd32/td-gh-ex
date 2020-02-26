<?php
/**
 * The default template for displaying content
 *
 * @package Chip Life
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content-wrapper">

		<?php chip_life_post_thumbnail(); ?>

		<div class="entry-data-wrapper">
			<div class="entry-header-wrapper entry-header-wrapper-archive">
				<header class="entry-header">
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
				</header><!-- .entry-header -->

				<?php if ( 'post' == get_post_type() ) : // For Posts ?>
				<div class="entry-meta entry-meta-header-after">
					<ul>
						<li><?php chip_life_posted_on(); ?></li>
						<li><?php chip_life_post_first_category(); ?></li>
						<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<li>
							<span class="post-label post-label-featured">
								<span class="screen-reader-text"><?php esc_html_e( 'Featured', 'chip-life' ); ?></span>
							</span>
						</li>
						<?php endif; ?>
					</ul>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</div><!-- .entry-header-wrapper -->

			<?php if ( chip_life_has_excerpt() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php endif; ?>

			<div class="more-link-wrapper">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php esc_html_e( 'Continue Reading', 'chip-life' ); ?></a>
			</div><!-- .more-link-wrapper -->
		</div><!-- .entry-data-wrapper -->

	</div><!-- .post-content-wrapper -->
</article><!-- #post-## -->
