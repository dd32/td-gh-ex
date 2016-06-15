<?php get_header();
asiathemes_breadcrumbs(); ?>
<!-----Page Title----->  
<!-----Blog Section------>
<section id="blog">
<div class="container">
	<div class="row">
		<div class="col-md-8">
				<?php 
					if(have_posts()) :
					while(have_posts()) :
							the_post(); 
				get_template_part('content','post');
				 endwhile; endif; ?>
			<!---Blog pagination-->
				<div class="row">
					<div class="col-md-12">	
						<div class="blog-pagination wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
						  <?php echo paginate_links( array( 
							'show_all' => true,
							'prev_text' => '<<', 
							'next_text' => '>>',
							)); ?>
						</div>
					</div>
				</div>
			
		</div><!--/.col-sm-8-->
	
	<!--------Sidebar-------------->
		<?php get_sidebar();?>   
  <!-------/Sidebar--------------->		
	</div>
</div>
</section>   
    
<!-------------Footer------------>
<?php get_footer(); ?>
<!--/copyright-->