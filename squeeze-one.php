<?php
/*
Template Name: Squeeze One
Description: If You are building one page landing/squeeze Page, use this template. Sidebars are not used in this template. Delete full-width-template classes below to have standard page width.
*/

get_header( 'squeeze' ); ?>

<div id="content" class="site-content full-width-template">
	<div class="site-content-inner">

		<div id="primary" class="content-area full-width-template">
				<main id="main" class="site-main">
				<?php 
				while ( have_posts() ) : the_post(); 
				get_template_part( 'content', 'page' );
				endwhile; // end of the loop. 
				?>
		
			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_footer( 'squeeze' ); ?>
