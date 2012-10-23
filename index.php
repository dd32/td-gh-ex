<?php get_header();?>

<div id="content" >

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		
			<?php if ( !is_singular() ) : ?>
					<?php get_template_part('loop'); ?>
			<?php else : ?>	
					<?php get_template_part('loop','single'); ?>
			<?php endif; ?>

		</div>
			
	<?php endwhile; else: ?>
	
		<!-- Post Not Found --> 
		<div class="not-found-wrap">
			<h2>Search Results: Nothing Found</h2>
			<p>Try a new keyword.</p>
			<?php get_search_form(); ?>
		</div>

	<!-- End Loop -->
	<?php endif; ?>
	
	<!-- Bottom Post Navigation -->
	<?php if (!( is_singular() || is_404() )) : ?>
		<div id="bottom-navi">
			<?php if ( function_exists('wp_pagenavi') ):?>
				<?php wp_pagenavi(); ?><!-- wp-pagenavi support -->
			<?php else : ?>
				<div class="left"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
				<div class="right"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div> <!-- #Content End -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>