<?php if( get_theme_mod( 'team_display', true ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'team_category' );
		$title = get_theme_mod( 'team_section_title' );
		$description = get_theme_mod( 'team_section_description' );
		
		$args = array(
        	'cat' => absint( $category_id ),
    		'posts_per_page'  => 6
        );
        $query = new WP_Query( $args );
	?>

<?php if( $query->have_posts() ) : ?>
<!-- Start Team -->
		<section id="team" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
							<h2><?php echo esc_html( $title ); ?></h2>
							<p><?php echo esc_html( $description ); ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php while( $query->have_posts() ) : $query->the_post(); ?>
						<!-- Team Single -->
						<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">		
							<div class="single-team">
								<div class="team-head">
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?> 
										<?php if( ! empty( $image ) ) { ?>
											<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
										<?php } ?>
									<ul class="team-social">
										<li><a href="<?php the_permalink(); ?>"><?php esc_html_e('Detail & Experience','agency-x'); ?></a></li>
									</ul>
								</div>
								<div class="team-info">
									<div class="name">
										<h4><?php the_title(); ?></h4>
									</div>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<!--/ End Single Team -->
					<?php endwhile; wp_reset_postdata(); ?>					
                </div>
			</div>
		</section>	 
		<!--/ End Team -->
	<?php endif; ?>
<?php endif; ?>