<?php

$slider_navigation 	= bard_options( 'featured_slider_navigation' );
$slider_pagination 	= bard_options( 'featured_slider_pagination' );

$slider_data = '{';

	$slider_data .= '"slidesToShow":1, "fade":true';

	if ( ! $slider_navigation ) {
		$slider_data .= ', "arrows":false';
	}
	
$slider_data .= '}';

?>

<!-- Wrap Slider Area -->
<div class="featured-slider-area<?php echo bard_options( 'general_slider_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>">

<!-- Featured Slider -->
<div id="featured-slider" class="<?php echo esc_attr(bard_options( 'general_slider_width' )) === 'boxed' ? 'boxed-wrapper': ''; ?>" data-slick="<?php echo esc_attr( $slider_data ); ?>">
	
	<?php

	$post_types = array( 'post', 'page' );

	// Query Args
	$args = array(
		'post_type'		      	=> $post_types,
	 	'orderby'		      	=> 'rand',
		'order'			      	=> 'DESC',
		'posts_per_page'      	=> bard_options( 'featured_slider_amount' ),
		'ignore_sticky_posts'	=> 1,
		'meta_query' 			=> array( 
			array(
				'key' 		=> '_thumbnail_id',
				'compare' 	=> 'EXISTS'
			)
		),	
	);

	if ( bard_options( 'featured_slider_display' ) === 'category' ) {
		$args['cat'] = bard_options( 'featured_slider_category' );
	}
	
	$sliderQuery = new WP_Query();
	$sliderQuery->query( $args );

	// Loop Start
	if ( $sliderQuery->have_posts() ) :

	while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();

	$featured_image = get_the_post_thumbnail_url();
		
	?>

	<div class="slider-item">

		<div class="slider-item-bg" style="background-image:url(<?php echo esc_url($featured_image); ?>);"></div>

		<div class="cv-container image-overlay">
			<div class="cv-outer">
				<div class="cv-inner">
					<div class="slider-info">

						<?php $category_list = get_the_category_list( ', ' ); ?>		

						<?php if ( $category_list ) : ?>
						<div class="slider-categories">
							<?php echo '' . $category_list; ?>
						</div> 
						<?php endif; ?>

						<h2 class="slider-title"> 
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>	
						</h2>

						<div class="slider-read-more">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','bard' ); ?></a>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

	<?php

	endwhile; // Loop end
	endif;

	?>

</div><!-- #featured-slider -->

</div><!-- .featured-slider-area -->