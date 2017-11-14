<?php
	/**
	* The template for displaying all pages
	*
	* @package anorya
	*/

	get_header();

	// load collapsable sidebar
	anorya_display_hidden_sidebar();	
?>

	<div class="container main-content-container">
		<?php if(get_theme_mod( 'anorya_single_page_sidebar_setting', 'hidden' ) == 'left'){ 
					get_sidebar(); 
				} ?>
		<div class="row">
			<div class="<?php echo esc_attr(anorya_main_content_class('PAGE')); ?>">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</div>
			
			<?php if(get_theme_mod( 'anorya_single_page_sidebar_setting', 'hidden' ) == 'right'){ 
					get_sidebar(); 
				} ?>
		</div>
	</div>	
	
	<?php get_footer(); ?>