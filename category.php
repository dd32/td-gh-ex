<?php get_header(); ?>
<!-----Page Title----->  
 <div class="buy-it-area">
  <div class="page-title">
	<div class="container">
	  <div class="row">
		<div class="col-lg-5"><h6><a href="<?php echo esc_html(home_url());?>"><?php _e('Home','becorp');?></a><?php _e('/','becorp'); ?><span><?php the_title();?></span></h6></div>
		<div class="col-lg-6"><h2><?php  the_archive_title(); ?></h2></div>
	 </div>
	</div>
  </div>	
</div>	
 <!-----Blog Section------>
<section id="blog">
<div class="container">
	<div class="row">
		<div class="<?php if( is_active_sidebar('sidebar-data')) { echo "col-md-8"; }  else { echo "col-md-12"; } ?>">
				<?php 
					if(have_posts()) :
					while(have_posts()) :
							the_post();
							global $more;
							$more = 0;
							
					get_template_part('content','post');
					
					endwhile; endif; ?>
				<?php becorp_navigation(); ?>
		</div>
		<?php get_sidebar();?>	
	</div>
</div>
</section>
<?php get_footer(); ?>