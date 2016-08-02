<?php
/**
* The template for displaying all pages.
*
* The template for displaying Search Results pages.
*
* @package beam
*/

get_header(); ?>

	<div id="content" class="site-content">
		<div class="site-content-inner">

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<header class="page-header">
						
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'beam' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						
					</header><!-- .page-header -->

					<?php 
					if ( have_posts() ) : 

						 /* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'content', 'search' );

						endwhile; 

					else : 

						get_template_part( 'no-results', 'search' ); 	

					endif; 	

					the_widget( 'WP_Widget_Recent_Posts' );

					the_widget( 'WP_Widget_Tag_Cloud' ); 
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer(); 