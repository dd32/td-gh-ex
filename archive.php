<?php get_header(); ?>
<!-----Page Title----->  
 <div class="buy-it-area">
  <div class="page-title">
	<div class="container">
	  <div class="row">
		<div class="col-lg-5"><h6><a href="<?php echo esc_html(site_url());?>"><?php _e('Home','becorp');?></a><?php _e('/','becorp'); ?><span><?php the_title();?></span></h6></div>
		 <div class="col-lg-6">
		 <h2>
			<?php if ( is_day() ) : ?>
				<?php  _e( "Daily Archives: ", 'becorp' ); echo (get_the_date()); ?>
			<?php elseif ( is_month() ) : ?>
				<?php  _e( "Monthly Archives: ", 'becorp' ); echo (get_the_date( 'F Y' )); ?>
			<?php elseif ( is_year() ) : ?>
				<?php  _e( "Yearly Archives: ", 'becorp' );  echo (get_the_date( 'Y' )); ?>
			<?php else : ?>
				<?php _e( "Blog Archives: ", 'becorp' ); ?>
			<?php endif; ?></h2></div>
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
					get_template_part('content','post');
				 endwhile; endif;
				 asiathemes_navigation(); ?>
		</div>
		<?php get_sidebar();?>	
	</div>
</div>
</section>
<?php get_footer(); ?>