<?php if( get_theme_mod( 'works_display', true ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'works_category' );
		$title = get_theme_mod( 'works_section_title' );
		$description = get_theme_mod( 'works_section_description' );

		$args = array(
        	'cat' => absint( $category_id ),
    		'posts_per_page'  => 6
        );
        $query = new WP_Query( $args );        
	?>

<?php if( $query->have_posts() ) : ?>

<!-- Start Project -->
		<section id="project" class="section clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
							<h2><?php echo esc_html( $title ); ?></h2>
							<p><?php echo esc_html( $description ); ?></p>
						</div>
					</div>
				</div>
				<div class="row no-margin wow fadeInUp">
					<?php while( $query->have_posts() ) : $query->the_post(); ?>
						<!-- Single Project -->
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="project-single">
								<?php if ( has_post_thumbnail() ) :	?>
									<div class="project-head">													                      
				                        <?php the_post_thumbnail( 'medium' ); ?>
									</div>
								<?php endif; ?>
								<div class="project-hover">
									<h4><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h4>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<!--/ End Project -->
					<?php endwhile; wp_reset_postdata(); ?>
					
				</div>
			</div>
		</section>
		<!--/ End Project -->
	<?php endif; ?>
<?php endif; ?>