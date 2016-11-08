<?php
/**
 *    The template for dispalying the index page.
 *
 * @package    WordPress
 * @subpackage asterion
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<?php get_header(); ?>
	<div class="container">

		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
			<div class="col-md-8">
		<?php } else { ?>
			<div class="col-md-12">
		<?php } ?>

			<div id="primary" class="content-area">
				
				<main id="main" class="site-main" itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
					<?php
						if ( have_posts() ):
							while ( have_posts() ): 
								the_post();
								get_template_part( 'template-parts/content', get_post_format() );
							endwhile;
							wp_reset_query();
						else:
							get_template_part( 'template-parts/content', 'none' );
						endif;
				
						the_posts_pagination( array(
							'type'          => 'list',
							'prev_text'		=> esc_html__( 'Previous page', 'asterion' ),
							'next_text'		=> esc_html__( 'Next page', 'asterion' )
						) );
					?>
				</main>
			</div>

		</div>
		<?php 
			if ( is_active_sidebar( 'blog-sidebar' ) ) {
				get_sidebar( 'blog-sidebar' );
			} 
		?>
	</div>
<?php get_footer(); ?>