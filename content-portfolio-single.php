<?php
/**
 * Template for showing single portfolio items.
 *
 * @link Learn more: https://jetpack.com/support/custom-content-types/
 *
 * @package Star
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'star-border' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}
	the_content();

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'star' ),
			'after'  => '</div>',
		)
	);
	?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php
star_portfolio_footer();
