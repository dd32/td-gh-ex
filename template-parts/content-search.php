<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ada_Pearl
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( !is_singular() ) {
			ada_pearl_post_thumbnail();
		}
	?>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				ada_pearl_posted_on();
				ada_pearl_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_single() ) {
			ada_pearl_post_thumbnail();

			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ada-pearl' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ada-pearl' ),
					'after'  => '</div>',
				)
			);
		} else {
			the_excerpt();

			?>

				<div class="wp-block-buttons">
					<div class="wp-block-button is-style-outline"><a href="<?php echo esc_url( get_permalink() ); ?>" class="wp-block-button__link has-black-color has-text-color no-border-radius">Read Article</a></div>
				</div>

			<?php
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ada_pearl_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
