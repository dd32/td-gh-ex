<?php get_header();?>

<div id="content" >

	<!-- Widgets: Before Content -->
	<?php if ( is_active_sidebar( 'widgets_before_content' ) )  : ?>
		<div id="widgets-wrap-before-content">
			<?php dynamic_sidebar( 'widgets_before_content' ); ?>
		</div>
	<?php endif ; ?>

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
			<?php if ( !is_singular() ) : ?>
					<?php get_template_part('loop'); ?>
			<?php else : ?>	
					<?php get_template_part('loop','single'); ?>
			<?php endif; ?>
			
	<?php endwhile; else: ?>
	
		<!-- Post Not Found --> 
		<div class="wrap-404-box">
			<h2><?php _e('Search Results: Nothing Found', 'asteroid'); ?></h2>
			<p><?php _e('Try a new keyword.', 'asteroid'); ?></p>
			<?php get_search_form(); ?>
		</div>

	<!-- End Loop -->
	<?php endif; ?>
	
	<!-- Bottom Post Navigation -->
	<?php if ( ( !is_singular() ) && ( (get_post_type() == 'post') || (get_post_type() == 'page') ) ) : ?>

		<div id="bottom-navi">
			<?php if ( function_exists('wp_pagenavi') ):?>
				<?php wp_pagenavi(); ?><!-- wp-pagenavi support -->
			<?php else : ?>
				<div class="left"><?php next_posts_link( __( '&laquo; Older posts', 'asteroid' ) ); ?></div>
				<div class="right"><?php previous_posts_link( __( 'Newer posts &raquo;', 'asteroid' ) ); ?></div>
			<?php endif; ?>
		</div>

	<?php endif; ?>

</div> <!-- #Content End -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>