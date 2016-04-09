<?php
get_header();
 /*-----Page Title-----*/   
get_template_part('title','strip'); 
?>  
 <!-----Blog Section------>
<section id="blog">
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php
				if ( have_posts()): 
				while ( have_posts() ): the_post();
				
				get_template_part('content','post');
				endwhile; endif;
				becorp_navigation(); ?> 	
		</div>
<?php get_sidebar(); ?>		
	</div>
</div>
</section>
<?php get_footer(); ?>
</div> 