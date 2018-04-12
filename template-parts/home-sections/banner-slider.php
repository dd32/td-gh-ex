<?php if( get_theme_mod( 'banner_slider_display', true ) ) : ?>
	<?php
		for( $i = 1; $i <= 3; $i++ ) {
	       $slider[ $i ] = esc_attr( get_theme_mod( 'banner_slider_' . $i ) );
	    }
	    $slider = array_filter( $slider );

	    $args = array (
	      'post_type' => 'page',              
	      'post__in'  => $slider,
	      'orderby'   =>'post__in',
	    );
              
    	$query = new WP_Query( $args );
	?>

	<?php if( $query->have_posts() ) { ?>
		<!-- Start Slider -->
		<section id="j-slider" class="clearfix">
			<div id="particles-js"></div>
			<div class="slide-main">
				<?php while( $query->have_posts() ) : $query->the_post(); ?>
					<!-- Single Slider -->
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?> 
					<?php if(has_post_thumbnail()): ?>
					<div class="single-slider" style="background-image:url(<?php echo esc_url( $image[0] ); ?>);" >
					<?php else: ?>
					<div class="single-slider" style="background-image:url(<?php echo esc_url(get_template_directory().'images/skill-bg.jpg');?> );">
					<?php endif; ?>
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="slide-text left">
										<h1><?php the_title(); ?></h1>
										<?php the_excerpt(); ?>
										<div class="slide-button">
											<a href="<?php the_permalink(); ?>" class="button hvr-bounce-to-top"><?php esc_html_e( 'Read More', 'agency-x' ); ?></a>
							
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Single Slider -->
				<?php endwhile; wp_reset_postdata(); ?>				
			</div>
		</section>
		<!--/ End Slider -->
	<?php } ?>
<?php endif; ?>