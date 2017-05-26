<?php
/**
 * The Template for displaying all posts with format image.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
<?php
		if ( is_sticky() && is_home() && ! is_paged() ):
			echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span>' . __( 'Featured', 'aguafuerte' ) . '</span>';
		endif; ?>

	<?php aguafuerte_entry_header(); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	<?php aguafuerte_entry_footer(); ?>
</article><!-- #post-## -->