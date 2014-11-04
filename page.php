<?php get_header(); ?>

<?php if ( is_front_page() ) : ?>

		<?php tishonator_display_slider(); ?>
	
	<?php else : ?>
	
		<?php tishonator_show_page_header_section(); ?>
	
<?php endif; ?>

<div class="clear">
</div>

<div id="main-content-wrapper">
	<div id="main-content">
	<?php if ( have_posts() ) :
			
			while ( have_posts() ) :
			
				the_post();

				// includes the single page content templata here
				get_template_part( 'content', 'page' );

				// if comments are open or there's at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			
			endwhile;
			
			wp_link_pages( array(
							'link_before'      => '<li>',
							'link_after'       => '</li>',
						 ) );
				
		  else : 
		  
			// if no content is loaded, show the 'no found' template
			get_template_part( 'content', 'none' );
	 
		  endif; ?>
	</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>