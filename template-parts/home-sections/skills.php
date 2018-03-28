<?php if( get_theme_mod( 'skills_display', true ) ) : ?>
	<?php		
		$page_id = get_theme_mod( 'skills_section_page' );
		$args = array(
			'page_id' => $page_id,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$query = new WP_Query( $args );		
	?>
	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
		<section id="skills-experience" class="section" data-stellar-background-ratio="0.3">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
							<!-- Skill Text -->
							<div class="skill-text">
								<?php the_excerpt(); ?>
							</div>
							<!--/ End Skill Text -->
						</div>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<?php if( ! empty( $image ) ) : ?>
							<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
								<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
							</div>
						<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endwhile; endif; ?>
<?php wp_reset_postdata(); endif; ?>