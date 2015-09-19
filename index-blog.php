<?php 
$corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options );
if($current_options['blog_section_enabled'] == true ) { ?>
<!--Homepage Blog Section-->
<div class="home-blog-section">
	<div class="container">
		<div class="row">
			<div class="corpo_heading_title">
			<?php if($current_options['blog_title'] !='') { ?>
				<h1><?php echo esc_html($current_options['blog_title']);  ?></h1>
				<?php } ?>
				<?php if($current_options['blog_description'] !='') { ?>
				<p><?php echo esc_html($current_options['blog_description']); ?></p>
				<?php } ?>
			</div>	
		</div>
		<div class="row">
		<?php
		
		$cat_id = array();
		$cat_id = $current_options['blog_selected_category_id'];
		$no_of_post = $current_options['post_display_count'];	

		 $args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => $cat_id, 'posts_per_page' => $no_of_post);
		 $news_query = new WP_Query($args);	
			$i=1;
			while($news_query->have_posts() ) : $news_query->the_post();				
			?>
			<div class="col-md-4 col-sm-6">
				<div class="home-blog-area">
					<div class="home-blog-post-img">
					<?php $defalt_arg =array('class' => "img-responsive"); ?>
							<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('', $defalt_arg); ?>
							<?php endif; ?>
					</div>
					<div class="home-blog-info">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="home-blog-description">
						<p><?php echo get_home_blog_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php 
			  if($i==3)
			  { 
			     echo '<div class="clearfix"></div>';
				 $i=0;
			  }$i++;
			  wp_reset_postdata();
			endwhile;  ?>
		</div>

	</div>
	<?php } ?>
</div>
</div>
<!--Homepage Blog Section-->