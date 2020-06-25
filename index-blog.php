<?php $elitepress_lite_options=elitepress_theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
if( $current_options['blog_section_enabled']== true ) { ?>
<!-- Blog Section -->
<div class="home-blog">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-header">
					<?php if($current_options['blog_title']) { ?>
					<h3 class="section-title"><?php echo esc_html($current_options['blog_title']); ?></h3>
					<?php }
					if($current_options['blog_description']) { ?>
					<p class="section-subtitle"><?php echo esc_html($current_options['blog_description']); ?></p>
					<?php } ?>
				</div>
			</div>		
		</div>
		<!-- /Section Title -->
		
		<!-- blog -->
		<div class="row">
			<?php
			$args = array(
			'post_type' => 'post', 'posts_per_page' => 3);
			$blog_query = null;
			$blog_query = new WP_Query($args);
			if($blog_query->have_posts())
			{	while($blog_query->have_posts()): $blog_query->the_post();
			?>
			<div class="col-md-4 col-sm-6">
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
				<?php if(has_post_thumbnail()){
				$defalt_arg =array('class' => "img-responsive"); ?>
					<div class="post-thumbnail">
					<?php the_post_thumbnail('', $defalt_arg); ?>
						<div class="entry-date"><span><?php echo esc_html(get_the_date()); ?></span></div>
					</div>
					<?php } ?>
					<div class="blog-info">
						<header class="entry-header">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</header>						
						<div class="entry-content">
							<p><?php echo elitepress_get_home_blog_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile;
			wp_reset_postdata();
			} ?>

		</div>
		<!-- /blog -->
	</div>
</div>
<!-- /Blog Section -->
<div class="clearfix"></div>
<?php }?>