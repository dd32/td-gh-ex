<?php
/**
 * The front-page template file.
 *
 * @package star
 */

get_header();
if ( star_has_featured_posts( 1 ) ) {
	echo '<section class="featured-wrap">';

	if ( get_theme_mod( 'star_featured_headline' ) ) {
	?>
		<h2 class="featured-headline"><?php echo esc_html( get_theme_mod( 'star_featured_headline', __( 'Featured', 'star' ) ) ); ?></h2>

	<?php
	} else {
	?>
		<h2 class="featured-headline"><?php esc_html_e( 'Featured', 'star' );?></h2>
	<?php
	}

	$featured_posts = star_get_featured_posts();
	foreach ( (array) $featured_posts as $order => $post ) :
		setup_postdata( $post );
		echo '<div class="featured-post star-border">';

		if ( has_post_thumbnail() ) {
			echo  '<a href="' . esc_url( get_permalink() ) . '" >' . get_the_post_thumbnail( $post->ID, 'star-featured-posts-thumb' ) . '</a>';
		}

		the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
		echo '</div>';
	endforeach;

	wp_reset_postdata();
	echo '</section>';
}
?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
