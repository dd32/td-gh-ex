<?php $current_options = get_option('appointment_options',theme_data_setup()); 
if($current_options['blog_section_enabled']=='on') {
?>
<div class="blog-section">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
			<?php if($current_options['blog_heading']) { ?>
				<div class="section-heading-title">
					<h1><?php echo $current_options['blog_heading']; ?></h1>
					<?php } 
					 if($current_options['blog_description']) { ?>
					<p><?php echo $current_options['blog_description']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<div class="row">
		<?php
		if($current_options['home_post_enabled']=='on')
			{	
		 $args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , $current_options['featured_slider_post'] , 'category__in' => $current_options['blog_selected_category_id'],
		 'posts_per_page' => $current_options['post_display_count']);
		 $news_query = new WP_Query($args);	
			}
		 else
			{  
			$arr=explode(",",$current_options['featured_slider_post']);
			$args = array('post__not_in' => $arr);
			$news_query = new WP_Query($args);
			}
			$i=1;
			while($news_query->have_posts() ) : $news_query->the_post();			
			?>
			<div class="col-md-6">
				<div class="blog-sm-area">
					<div class="media">
						<div class="blog-sm-box">
							<?php $defalt_arg =array('class' => "img-responsive"); ?>
							<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('appointment_latest_news_img', $defalt_arg); ?>
							<?php endif; ?>
						</div>
						<div class="media-body">
							<div class="blog-post-sm">
								<?php if($current_options['home_meta_section_settings']=='on') { ?>
								<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
								<?php echo get_the_date('j'); ?> <?php echo get_the_date('M'); ?>,<?php echo get_the_date('Y'); ?>
								<?php 	$tag_list = get_the_tag_list();
								if(!empty($tag_list)) { ?>
								<div class="blog-tags-sm"><?php the_tags('', ', ', ''); ?></div>
							<?php } } ?>
							</div>
							
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo get_home_blog_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php 
			  if($i==2)
			  { 
			     echo '<div class="clearfix"></div>';
				 $i=0;
			  }$i++;
			  wp_reset_postdata();
			endwhile; ?>
		</div>
	</div>
</div>
<?php } ?>