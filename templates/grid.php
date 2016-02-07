<?php
/**
 * Template Name: Grid
 * 
 * Description: A Page Template that displays your posts in a grid with a similar design to the featured posts.
 * @package aaron
 */
 
 
get_header(); 	
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="featured-wrap">
			<div class="grid-sizer"></div>
			<?php
			$args = array('post_type' => 'post',  'post_status' => 'publish');

		    query_posts($args);
			while ( have_posts() ) : the_post(); 
					echo '<div class="grid-item featured-post aaron-border">';
					if ( has_post_thumbnail())	{
						the_post_thumbnail( 'aaron-featured-posts-thumb' ); 
					}
					the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
					echo '</div>';
			 endwhile; // end of the loop.
			 wp_reset_query();
			?>
 		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>