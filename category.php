<?php get_header(); ?>
<!-----Page Title----->  
 <div class="buy-it-area">
  <div class="page-title">
	<div class="container">
	  <div class="row">
		<div class="col-lg-5"><h6><a href="<?php echo esc_html(site_url());?>"><?php _e('Home','becorp');?></a><?php _e('/','becorp'); ?><span><?php the_title();?></span></h6></div>
		<div class="col-lg-6"><h2><?php  _e( "Category  Archives:", 'becorp' ); echo single_cat_title( '', false ); ?></h2></div>
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
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$category_id=get_query_var('cat');
				$args = array( 'post_type' => 'post','paged'=>$paged,'cat' => $category_id);
				$cat_data = new WP_Query( $args );
					if($cat_data->have_posts()) :
					while($cat_data->have_posts()) :
							$cat_data->the_post();
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