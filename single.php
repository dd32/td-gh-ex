<?php get_header(); ?>

	<div class="center <?php mp_content_class(); ?>">
		
		<div id="content">
			
			
			<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();?> 
						
						<article id="single-page">
							
							
									
		
									<div id="title-container"> <h1><?php the_title() ?></h1> </div>
									 
									  
									  									
									  		 
									  		<?php the_content();
										  		
										  		
										  		
									  		?>								  
									  
						
									  		
									  	
						
						</article>
						
						<?php	do_action('mp_post_meta');
								wp_link_pages();?>	
							
						<?php	} // end while
						
							comments_template();							

						?>
						
							
				
		<?php	} // end if
			?>
						
		</div>
		
		
		<?php if(get_theme_mod('layout_posts') != 'c') {
					get_sidebar();
			  }   ?>
		
		
		
	</div>
	
	

<?php get_footer(); ?>