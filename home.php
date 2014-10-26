<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = rubine_theme_options();
?>

	<div id="wrap" class="container clearfix">
	
		<?php // Display Featured Posts on homepage
		if ( is_front_page() && rubine_has_featured_content() ) :
			
			// Include the featured content template.
			get_template_part( 'featured-content' );
			
		endif;
		?>
		
		<section id="content" class="primary" role="main">
		 
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content' );
		
			endwhile;
			
		rubine_display_pagination();

		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	