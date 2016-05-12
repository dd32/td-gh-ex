<?php 
$corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); ?>
<!--Homepage Blog Section-->
<div class="home-blog-section">
	<div class="container">
		<div class="row">
			<div class="section_title">
			<?php if($current_options['blog_title'] !='') { ?>
				<h1 class="widget-title"><?php echo esc_html($current_options['blog_title']);  ?></h1>
				<?php } ?>
				<?php if($current_options['blog_description'] !='') { ?>
				<p><?php echo esc_html($current_options['blog_description']); ?></p>
				<?php } ?>
			</div>	
		</div>
		<div class="row">
		<?php
		$cat_id = $current_options['blog_selected_category_id'];
		$no_of_post = $current_options['post_display_count'];	

		 $args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => $cat_id, 'posts_per_page' => $no_of_post);
		 $news_query = new WP_Query($args);	
			$i=1;
			while($news_query->have_posts() ) : $news_query->the_post();				
			?>
			<div class="col-md-4 col-sm-6">
				<article class="post">
					<div class="post-thumbnail">
					<?php 
					$defalt_arg =array('class' => "img-responsive"); 
					if(has_post_thumbnail()): 
						the_post_thumbnail('', $defalt_arg); 
					endif; 
					?>
					</div>
					<div class="entry-header">
						<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>	
					<div class="entry-content">
						<p><?php echo get_home_blog_excerpt(); ?></p>
					</div>
				</article>
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
</div>
<!--Homepage Blog Section-->