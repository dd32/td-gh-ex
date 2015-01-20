<?php 
/**
 *The main index template file
**/
get_header(); ?>
<?php $impressive_options = get_option( 'impressive_theme_options' ); ?>
<section>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="impressive-container container">
		<div class="site-breadcumb">
			<h1>
				<?php if(!empty($impressive_options['blogtitle'])) { 
					echo esc_attr($impressive_options['blogtitle']);
				 } else { 	
					echo _e('Our Blog','impressive');
				} ?>
			</h1>
		</div>
		<div class="row blog-page">
			<div class="col-md-9 col-sm-8">
			<?php 
				$impressive_args = array( 
								'orderby'      => 'post_date', 
								'order'        => 'DESC',
								'post_type'    => 'post',
								'paged' => $paged,
								'post_status'    => 'publish'	
							  );
				$impressive_query = new WP_Query($impressive_args);
				if ($impressive_query->have_posts() ) : while ($impressive_query->have_posts()) : $impressive_query->the_post(); 
			?>
				<div class="blog-box">
					<?php $impressive_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );   ?>
					<?php if($impressive_image[0] != "") { ?>
						<img src="<?php echo $impressive_image[0]; ?>" width="<?php echo $impressive_image[1]; ?>" height="<?php echo $impressive_image[2]; ?>" class="img-responsive blog-image" alt="<?php the_title(); ?>" />
					<?php } ?>
					<a href="<?php echo esc_url( get_permalink() ) ; ?>" class="work-title"><?php the_title(); ?></a>
					<div class="our-blog-details">
						<?php impressive_entry_meta(); ?> 
						<?php the_excerpt(); ?>
					</div>
				</div> 
			<?php endwhile; endif; ?> 
				<div class="site-pagination">
					<?php  impressive_pagination(); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>   
		</div>
	</div>
</div>	
</section>
<?php get_footer(); ?>
