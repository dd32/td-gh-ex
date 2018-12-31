<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package altitude-lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php altitude_lite_post_thumbnail(); ?>
	<header class="entry-header">
	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
			<div class="entry-meta">
				<?php
				altitude_lite_posted_by();
				altitude_lite_posted_on();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
	</header><!-- .entry-header -->
	<hr>

	<div class="entry-content">
	<?php
	if ( is_home() || is_archive() || is_search() ) {
		the_excerpt();
	} else {
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'altitude-lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
	}

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'altitude-lite' ),
			'after'  => '</div>',
		)
	);
	?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
