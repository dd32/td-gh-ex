<?php
/**
 * The homepage template file.
 *
 * @package Arunachala
 */

get_header(); ?>
	
	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
		
			<?php
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$sticky = get_option( 'sticky_posts' );
				$cat = get_theme_mod( 'category_dropdown_setting');
				$args = array(
					'ignore_sticky_posts' => 1,
					'post__not_in' => $sticky,
					'category__in' => $cat,
					'paged' => $paged
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
				
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content' );
				?>

			<?php endwhile; ?>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>