<?php if( get_theme_mod( 'testimonial_display', true ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'testimonial_category' );
		$title = get_theme_mod( 'testimonial_section_title' );		
		
		$args = array(
        	'cat' => absint( $category_id ),
    		'posts_per_page'  => 6
        );
        $query = new WP_Query( $args );
	?>

<?php if( $query->have_posts() ) : ?>
<!-- Start Testimonials -->
		<section id="testimonial" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
							<h2><?php echo esc_html( $title ); ?></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="testimonial-carousel">
							<?php while( $query->have_posts() ) : $query->the_post(); ?>
								<!-- Start Testimonial -->
								<div class="single-testimonial">
									<div class="testimonial-content">
										<?php the_excerpt(); ?>
									</div>
									<div class="testimonial-info">
										<span class="arrow"></span>
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?> 
										<?php if( ! empty( $image ) ) { ?>
											<img src="<?php echo esc_url( $image[0] ); ?>" class="img-circle" alt="<?php echo esc_attr( get_the_title() ); ?>">
										<?php } ?>
										<h6><?php the_title(); ?></h6>
									</div>			
								</div>
								<!--/ End Testimonial -->
							<?php endwhile; wp_reset_postdata(); ?>								
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Testimonial -->
	<?php endif; ?>
<?php endif; ?>