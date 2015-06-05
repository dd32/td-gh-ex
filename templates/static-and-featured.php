<?php
/**
 * Template Name: Static and Featured
 * 
 * Description: A Page Template that displays your static frontpage and featured content.
 * @package aaron
 */
 
 
get_header(); 
	if ( aaron_has_featured_posts( 1 ) ) {
 
		echo '<section class="featured-wrap">';
		
		if( get_theme_mod( 'aaron_featured_headline') <>"" ) {
		?>
			<h2 class="featured-headline"><?php echo esc_html( get_theme_mod( 'aaron_featured_headline', __( 'Featured', 'aaron' ) ) ); ?></h2>
 
		<?php
		}else{
		?>
			<h2 class="featured-headline"><?php _e( 'Featured', 'aaron' );?></h2>
		<?php
		}
			$featured_posts = aaron_get_featured_posts();
			foreach ( (array) $featured_posts as $order => $post ) :
				setup_postdata( $post );
				echo '<div class="featured-post aaron-border">';
				if ( has_post_thumbnail())	{
						the_post_thumbnail( 'aaron-featured-posts-thumb' ); 
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
 
			<?php while ( have_posts() ) : the_post(); ?>
 
				<?php get_template_part( 'content', 'page' ); ?>
 
				<?php
					// If comments are open , load up the comment template
					if ( comments_open()) :
						comments_template();
					endif;
				?>
 
			<?php endwhile; // end of the loop. ?>
 
		</main><!-- #main -->
	</div><!-- #primary -->
 
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>