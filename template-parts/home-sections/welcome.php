<?php if( get_theme_mod( 'welcome_display', true ) ) : ?>

	<?php
		$title = get_theme_mod( 'welcome_section_title', '' );
		$description = get_theme_mod( 'welcome_section_description', '' );
	?>

	<?php
		$page_id = esc_attr( get_theme_mod( 'welcome_section_page' ) );
		$args = array(
			'page_id' => $page_id,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$query = new WP_Query( $args );	
	?>
	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
		<!-- Start About -->
		<section id="about-us" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
							<h2><?php echo esc_html( $title ); ?></h2>
							<?php echo wpautop( $description, $br = true ); ?>
						</div>
					</div>
				</div>
				<div class="row fadeInUp"> 
					<!-- About Main -->
					<div class="col-md-7 col-sm-6 col-xs-12 wow fadeInUp">
						<div class="about-main">
							<h3><?php the_title(); ?></h3>
							<div class="single-about">
								<?php the_content(); ?>
							</div>
							<a class="button primary" href="<?php echo '#footer-top' ?>"><?php echo esc_html__( 'Contact Us','agency-x' ); ?><i class="fa fa-angle-double-right"></i></a>
						</div>
					</div>
					<!--/ End About Main -->
					<!-- About Slide -->
					<div class="col-md-5 col-sm-6 col-xs-12 wow fadeInUp">
						<div class="about-video">
							<div class="single-video">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?> 
								<?php if( ! empty( $image ) ) { ?>
									<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="<?php echo esc_attr( get_the_title() ); ?>">
								<?php } ?>								
							</div>
						</div>
					</div>
					<!--/ End About Slide -->
				</div>
			</div>
		</section>
		<!--/ End About -->
	<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
<?php endif; ?>