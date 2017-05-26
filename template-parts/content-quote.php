<?php
/**
 * The Template for displaying all posts with format image.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >



<?php 	if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<?php 	if ( is_sticky() && is_home() && ! is_paged() ) :
							echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span>' . __( 'Featured', 'aguafuerte' ) . '</span>';
						endif;
				?>			
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		    		<?php the_post_thumbnail(); ?>
				</a>
			</div><!-- post-thumbnail -->
<?php 	endif;

		if ( is_sticky() && is_home() && ! is_paged() ):
			echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span>' . __( 'Featured', 'aguafuerte' ) . '</span>';
		endif;
?>

	<div class="post-format-inner">

	<?php aguafuerte_entry_header(); ?>

		<div class="entry-content">
		<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php aguafuerte_entry_footer(); ?>
	
	</div><!-- post-format-inner -->

</article><!-- #post-## -->