<?php if( get_theme_mod( 'contact_display', true ) ) : ?>
		<?php		
		$page_id = get_theme_mod( 'contact_section_page' );
		$args = array(
			'page_id' => $page_id,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$query = new WP_Query( $args );
	?>
	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
		<!-- Contact Us -->
		<section id="contact" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
								<h2><?php the_title(); ?></h2>	
								<?php the_content();?>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Contact Form -->
					<div class="col-md-5 col-sm-6 col-xs-12 wow fadeInUp">
						<form class="form" method="post" >
							<?php if (get_theme_mod('contact_form_code')):
					  		echo do_shortcode(get_theme_mod('contact_form_code')); 
						endif; ?>		
						</form>
					</div>
					<!--/ Contact Form -->
					<!-- Google Map -->
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?> 
					<?php if( ! empty( $image ) ) { ?>
					<!-- Google Map -->
						<div class="col-md-7 col-sm-6 col-xs-12 wow fadeInUp">
							<div class="contact-map">
								<div class="map">									
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">									
								</div>
							</div>
						</div>
						<!--/ End Google Map -->
					<?php } ?>
					<!--/ End Google Map -->
				</div>
			</div>
		</section>
		<!--/ End Clients Us -->
	<?php endwhile; endif; ?>
<?php wp_reset_postdata(); endif; ?>



		