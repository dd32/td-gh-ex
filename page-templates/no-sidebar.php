<?php
/**
 * Template Name: No Sidebar
 *
 * Description: A page template without sidebar. It has full width if there is not a sidebar, but only a third of the width if there are sidebars.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

get_header(); ?>

	<div class="inner">
		<div id="main-content">

			<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-page-image">
					<?php the_post_thumbnail(); ?>
				</div><!-- .entry-page-image -->
			<?php endif; ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<div class="clearfix"></div>
		</div><!--/main-content-->
	        
	</div><!--/inner-->

<div class="clearfix"></div>
<?php //get_sidebar( 'front' ); ?>
<?php get_footer(); ?>