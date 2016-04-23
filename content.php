<article id="post-<?php the_ID(); ?>" <?php post_class('media'); ?>> 

	<?php spasalon_post_thumbnail(); ?>
	
	<div class="media-body"> 
	
		<div class="entry-header">
			<?php 	
			if ( is_single() ) :
			
			the_title('<h3 class="entry-title">', '</h3>' );
			
			else:
			
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			endif; 
			?>
		</div>
		
		<div class="entry-content">
			<?php the_content( __('Read More','sis_spa') );
				  wp_link_pages( );
			?>
		</div>
		
	</div> 
</article>