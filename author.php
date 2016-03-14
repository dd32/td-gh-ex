<?php get_header(); ?>
<!-----Page Title----->  
 <div class="buy-it-area">
  <div class="page-title">
	<div class="container">
	  <div class="row">
		<div class="col-lg-5"><h6><a href="<?php echo esc_html(site_url());?>"><?php _e('Home','becorp');?></a><?php _e('/','becorp'); ?><span><?php the_title();?></span></h6></div>
		<div class="col-lg-6"><h2><?php  _e( "Author  Archives :", 'becorp' ); echo get_the_author(); ?></h2></div>
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
				$author_id=get_query_var('author');
				$args = array( 'post_type' => 'post','paged'=>$paged,'author' => $author_id);	
				$author_data = new WP_Query( $args );
					if($author_data->have_posts()) :
					while($author_data->have_posts()) :
							$author_data->the_post();
					get_template_part('content','post');
				?>
				<?php endwhile; endif; ?>
				<?php becorp_navigation(); ?>
		</div>
		<?php get_sidebar();?>	
	</div>
</div>
</section>
<?php get_footer(); ?>