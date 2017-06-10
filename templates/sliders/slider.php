<?php 
$slider_columns 	= ashe_options( 'featured_slider_columns' );
$slider_autoplay 	= ashe_options( 'featured_slider_autoplay' );
$slider_navigation 	= ashe_options( 'featured_slider_navigation' );
$slider_pagination 	= ashe_options( 'featured_slider_pagination' );

$slider_data = '{';
$slider_data .= '"slidesToShow":'.$slider_columns;


if ( $slider_autoplay > 0 ) {
	$slider_data .= ', "autoplay": true, "autoplaySpeed": '. $slider_autoplay;
}

if ( !$slider_navigation ) {
	$slider_data .= ', "arrows":false';
} 

if ( $slider_pagination ) {
	$slider_data .= ', "dots":true';
}

if ( $slider_columns === 1 ) {
  	$slider_data .= ', "fade":true';
}

$slider_data .= '}';
?>

<div id="featured-slider" data-slick="<?php echo esc_attr( $slider_data ); ?>" class="<?php echo ashe_options( 'general_slider_width' ) === 'boxed' ? 'boxed-wrapper': ''; ?>">
	
	<?php 

	// Query Args
	$args = array(
		'post_type'		      	=> array( 'post', 'page' ),
	 	'orderby'		      	=> ashe_options( 'featured_slider_orderby' ),
		'order'			      	=> 'DESC',
		'posts_per_page'      	=> ashe_options( 'featured_slider_amount' ),
		'ignore_sticky_posts'	=> 1,
		'meta_query' 			=> array( 
			array(
				'key' 		=> '_thumbnail_id',
				'compare' 	=> 'EXISTS'
			) ),			
	);

	if ( ashe_options( 'featured_slider_display' ) === 'category' ) {
		$args['cat'] = ashe_options( 'featured_slider_category' );
	} 

	if ( ashe_options( 'featured_slider_display' ) === 'metabox' ) {
		$args['meta_query'] = array( 
		'relation'		=> 'AND',
		array(
			'key'	 	=> 'show_in_featured_slider',
			'value'	  	=> 'yes',
			'compare' 	=> 'EXISTS',
		),
		array(
			'key' 		=> '_thumbnail_id',
			'compare' 	=> 'EXISTS'
		) );
	}

	$sliderQuery = new WP_Query();
	$sliderQuery->query( $args );
	?>

	<?php if ( $sliderQuery->have_posts() ) : while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post(); ?>

	
				
		
			<div class="slider-item">

				<?php if ( $slider_columns === 1 ) : ?>
				<img src="<?php the_post_thumbnail_url('ashe-slider-full-thumbnail'); ?>" alt="">
				<?php else : ?>	
				<img src="<?php the_post_thumbnail_url('ashe-slider-grid-thumbnail'); ?>" alt="">
				<?php endif; ?>

				<div class="cv-container image-overlay">
				<div class="cv-outer">
					<div class="cv-inner">
			
					<div class="slider-info">

						<?php $category_list = get_the_category_list( ', ' ); ?>			
						<?php if ( ashe_options( 'featured_slider_categories' ) === true && $category_list ) : ?>
						<div class="slider-categories">
							<?php echo '' . $category_list; ?>
						</div> 
						<?php endif; ?>

						<?php if( ashe_options( 'featured_slider_title' ) === true ) : ?>
						<h2 class="slider-title"> 
							<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>								
						</h2>
						<?php endif; ?>

						<?php if (ashe_options( 'featured_slider_excerpt' ) === true ): ?>							
						<div class="slider-content"><?php ashe_excerpt(30); ?></div>
						<?php endif; ?>

						<?php if ( ashe_options( 'featured_slider_more' ) === true ) : ?>
						<div class="slider-read-more">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'read more','ashe' ); ?></a>
						</div>
						<?php endif; ?>

						<?php if( ashe_options( 'featured_slider_date' ) === true ) : ?>
						<div class="slider-date"><?php the_time( get_option('date_format') ); ?></div>
						<?php endif; ?>
						
					</div>

					</div>
				
				</div>
				</div>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>
</div>