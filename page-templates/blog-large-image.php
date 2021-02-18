<?php
/**
 * Template Name: Blog Large Image
 *
 * Displays the Blog with a large featured image.
 *
 * @package ThemeGrill
 * @subpackage Accelerate
 * @since Accelerate 1.0
 */
?>

<?php get_header(); ?>

	<?php do_action( 'accelerate_before_body_content' ); ?>

	<div id="primary">
		<div id="content" class="clearfix">
			<?php
			global $post;

		   global $wp_query, $paged;
			if( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			}
			elseif( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			}
			else {
				$paged = 1;
			}
			$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
			$temp_query = $wp_query;
			$wp_query = null;
			$wp_query = $blog_query;
			?>

			<?php if( $blog_query->have_posts() ) : ?>
				
				<?php while( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

					<?php get_template_part( 'content', 'blog-large-image' ); ?>

				<?php endwhile; ?>

				<?php get_template_part( 'navigation', 'blog-large-image' ); ?>

				<?php else : ?>

				<?php get_template_part( 'no-results', 'blog-large-image' ); ?>
				
			<?php endif; ?>

			<?php
			$wp_query = $temp_query;
			wp_reset_postdata();
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

	<?php accelerate_sidebar_select(); ?>
	
	<?php do_action( 'accelerate_after_body_content' ); ?>

<?php get_footer(); ?>