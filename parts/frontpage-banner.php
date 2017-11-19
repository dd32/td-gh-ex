<?php
/**
 * Frontpage Banner, Slider
 *
 * @package ariel
 */
$ariel_frontpage_banner       = ariel_get_option( 'ariel_frontpage_banner' );
$ariel_example_content        = ariel_get_option( 'ariel_example_content' );
$ariel_frontpage_slider_type  = ariel_get_option( 'ariel_frontpage_slider_type' );

/**
 * Get differences in sizes between slider types
 */
if ( $ariel_frontpage_slider_type == 'Default' ) :
	$ariel_size = 'fw';
elseif ( $ariel_frontpage_slider_type == 'Thumbnails' ) :
	$ariel_size = 'sm';
endif;


if ( $ariel_frontpage_banner == 'Posts' ) :

	$ariel_frontpage_posts_slider_category = ariel_get_option( 'ariel_frontpage_posts_slider_category' );
	$ariel_frontpage_posts_slider_number   = ariel_get_option( 'ariel_frontpage_posts_slider_number' );
	$args = array(
		'posts_per_page' => $ariel_frontpage_posts_slider_number,
		'category__in' => $ariel_frontpage_posts_slider_category
	);
	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : ?>

		<div class="frontpage-slider frontpage-slider-posts <?php echo esc_attr ( $ariel_size ); ?>">

			<div class="container">

				<?php
					/**
					 * Thumbnails has .row and columns
					 */
					if ( $ariel_frontpage_slider_type == 'Thumbnails' ) : ?>

					<div class="row">
						<div class="col-sm-10 col-md-8 col-lg-9">

				<?php endif; // 'Thumbnails' ?>


				<div class="slick-carousel">
					<?php
						/**
						 * All have the same main slider markup and query
						 */
						while ( $query->have_posts() ) : $query->the_post();

							$ariel_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ariel-slider-' . $ariel_size ) ;
							$ariel_featured_image = '';

							if ( $ariel_src ) :
								$ariel_featured_image = $ariel_src[0];
							elseif ( $ariel_example_content == 1 ) :
								$ariel_featured_image = ariel_get_sample( 'ariel-slider-' . $ariel_size );
							endif;

						if ( $ariel_featured_image ) : ?>

							<div class="slick-slide" style="background-image:url(<?php echo esc_url( $ariel_featured_image ); ?>)">
								<div class="box-caption">
									<p class="box-caption-category"><?php the_category( ', ' ); ?></p>
									<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<p class="box-caption-meta"><span class="date"><?php echo esc_html ( get_the_date() ); ?></span></p>
								</div>
							</div>

						<?php endif; // $ariel_featured_image
					endwhile; // $query->have_posts() ?>
				</div><!-- slick-carousel -->

			<?php
				/**
				 * Thumbnails closing of columns and .row
				 * Thumbnails carousel control
				 */
				if ( $ariel_frontpage_slider_type == 'Thumbnails' ) : ?>

					</div><!-- col-sm-10 col-md-8 col-lg-9 -->

					<div class="col-sm-2 col-md-4 col-lg-3">
						<div class="latest-post" id="slick-carousel-control">
							<ul>
							<?php
								/**
								 * Initiate counter for proper nav control
								 * @var integer
								 */
								$ariel_count = 0;
								while ( $query->have_posts() ) : $query->the_post();

									$ariel_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ariel-recent' ) ;
									$ariel_featured_image = '';
                                    $ariel_categories = '';

									if ( $ariel_src ) :
										$ariel_featured_image = $ariel_src[0];
									elseif ( $ariel_example_content == 1 ) :
										$ariel_featured_image = ariel_get_sample( 'ariel-recent' );
									endif;

									if ( $ariel_featured_image ) : ?>
										<li data-slick-go-to="<?php echo esc_attr ( $ariel_count++ ); ?>">
											<div class="latest-post-image">
												<img src="<?php echo esc_url( $ariel_featured_image ); ?>" />
											</div>
											<div class="latest-post-body">
												<p class="latest-post-category">
													<?php
														$ariel_categories = get_the_category();
														/**
														 * Display only names, no links
														 */
														foreach ( $ariel_categories as $ariel_category ) {
															if ( end( $ariel_categories ) == $ariel_category ) {
																echo esc_html( $ariel_category->cat_name );
															} else {
																echo esc_html( $ariel_category->cat_name . ', ' );
															}
														}
													?>
												</p>
												<h4 class="latest-post-title"><?php echo esc_html ( ariel_truncated_entry_title (get_the_title(), 45) ) ; ?></h4>
											</div><!-- latest-post-body -->
										</li>
									<?php endif; // $ariel_featured_image
								endwhile; // $query->have_posts() ?>
							</ul>
						</div><!-- latest-post -->
					</div><!-- col-sm-2 col-md-4 col-lg-3 -->

				</div><!-- row -->
				<?php endif; // 'Thumbnails' ?>

			</div><!-- container -->

		</div><!-- frontpage-slider <?php echo esc_attr( $ariel_size ); ?> -->

	<?php endif; // $query->have_posts()
	wp_reset_postdata();

    
elseif ( $ariel_frontpage_banner == 'Banner' ) :
	$header_image             = get_header_image();
	$ariel_banner_heading     = ariel_get_option( 'ariel_banner_heading' );
	$ariel_banner_description = ariel_get_option( 'ariel_banner_description' );
	$ariel_banner_url         = ariel_get_option( 'ariel_banner_url' );

	if ( $header_image ) : ?>
		<div class="frontpage-banner">
			<div class="container">
				<img src="<?php echo esc_url ( $header_image ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />

				<div class="box-caption">
					<?php if ( $ariel_banner_url && $ariel_banner_heading ) : ?>
						<h2><a href="<?php echo esc_url( $ariel_banner_url ); ?>"><?php echo esc_html( $ariel_banner_heading ); ?></a></h2>
					<?php elseif ( ! $ariel_banner_url && $ariel_banner_heading ) : ?>
						<h2><?php echo esc_html( $ariel_banner_heading ); ?></h2>
					<?php endif; // $ariel_banner_url && $ariel_banner_heading ?>

					<?php if( $ariel_banner_description ) : ?>
						<p class="read-more"><?php echo esc_html( $ariel_banner_description ); ?></p>
					<?php endif; // $ariel_banner_description ?>
				</div><!-- box-caption -->
			</div><!-- container -->
		</div><!-- frontpage-banner -->
	<?php endif; // $header_image != ''

endif; // $ariel_frontpage_banner == 'Posts'