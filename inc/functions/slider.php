<?php

/**
* Custom slider and the featured posts for the theme.
*/

if ( !function_exists( 'awaken_featured_posts' ) ) :

function awaken_featured_posts() { 

		global $awaken_options;
		$category = $awaken_options['slider-category'];

		$slider_posts = new WP_Query( array(
			'posts_per_page' => 5,
			'cat'	=>	$category,
			'ignore_sticky_posts' => 1
			)
		); ?>
		<div class="awaken-featured-container">
		<div class="awaken-featured-slider">
			<section class="slider">
				<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-loader="true" data-cycle-timeout="6000" data-cycle-slides="div.slide" data-cycle-speed="500" data-cycle-pause-on-hover="true" id="homepage-slider">
					<div class="cycle-prev">
						<a href="#"><i class="fa fa-angle-left"></i></a>
					</div> <!-- end cycle-prev -->

					<div class="cycle-next">
						<a href="#"><i class="fa fa-angle-right"></i></a>
					</div> <!-- end cycle-next -->
					<?php while( $slider_posts->have_posts() ) : $slider_posts->the_post(); ?>

						<div class="slide">
							<div class="awaken-slider-container">
								<?php if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail( 'featured-slider' ); ?>
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri() . '/images/slide.jpg' ?>">
								<?php } ?>

								<div class="awaken-slider-details-container">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><h1 class="awaken-slider-title"><?php the_title(); ?></h1></a>
								</div>
							</div>
						</div><!--.slide-->
						
					<?php endwhile; ?>
					<div id="progress"></div>
				</div>
			</section>
		</div><!-- .awaken-slider -->
		<div class="awaken-featured-posts">
			<?php 

				$fposts_category = $awaken_options['fposts-category']; 

				$fposts = new WP_Query( array(
					'posts_per_page' => 2,
					'cat'	=>	$fposts_category,
					'ignore_sticky_posts' => 1
				));

				while( $fposts->have_posts() ) : $fposts->the_post(); ?>

					<div class="afp">
						<figure class="afp-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'featured', array('title' => get_the_title()) ); ?></a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="<?php the_title(); ?>" /></a>
							<?php } ?>						
						</figure>						
						<div class="afp-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</div>
					</div>

				<?php endwhile; ?>

		</div>
	</div>
<?php 
}

endif;