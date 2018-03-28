<?php if( get_theme_mod( 'services_display', true ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'services_category' );
		$title = get_theme_mod( 'services_section_title' );
		$description = get_theme_mod( 'services_section_description' );
		
		$args = array(
        	'cat' => absint( $category_id ),
    		'posts_per_page'  => 6
        );
        $query = new WP_Query( $args );
	?>

<?php if( $query->have_posts() ) : ?>
	<!-- Start Service -->
	<section id="service" class="section clearfix">
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
			<?php $count = 1; ?>
			<?php while( $query->have_posts() ) : $query->the_post(); ?>
				<!-- Single Service -->
				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
					<div class="single-service">
						<div class="number"><p><?php echo esc_html( $count ); ?></p></div>
						<h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<i class="ico-bg fa fa-pencil"></i>
					</div>
				</div>
				<!--/ End Single Service -->
				<?php $count++; ?>
			<?php endwhile; wp_reset_postdata(); ?>
				
			</div>
		</div>
	</section>
	<!--/ End Service -->
<?php endif; ?>

<?php endif; ?>