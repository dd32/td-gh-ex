<?php
/**
 * Function to pass the slider effect parameters from php file to js file.
 */
function adventurous_pass_slider_value() {
	global $adventurous_options_settings;
   	$options = $adventurous_options_settings;

	$transition_effect = $options[ 'transition_effect' ];
	$transition_delay = $options[ 'transition_delay' ] * 1000;
	$transition_duration = $options[ 'transition_duration' ] * 1000;
	wp_localize_script( 
		'adventurous-slider',
		'js_value',
		array(
			'transition_effect' => $transition_effect,
			'transition_delay' => $transition_delay,
			'transition_duration' => $transition_duration
		)
	);
}// adventurous_pass_slider_value


/**
 * Shows Default Slider Demo if there is not iteam in Featured Post Slider
 */
function adventurous_default_sliders() { 
	delete_transient( 'adventurous_default_sliders' );
	
	if ( !$adventurous_default_sliders = get_transient( 'adventurous_default_sliders' ) ) {
		echo '<!-- refreshing cache -->';	
		$adventurous_default_sliders = '
		<div id="main-slider">
			<section class="featured-slider">
			
				<article class="post hentry slides demo-image displayblock">
					<figure class="slider-image">
						<a title="Seto Ghumba" href="#">
							<img src="'. get_template_directory_uri() . '/images/demo/slider-1-1600x600.jpg" class="wp-post-image" alt="Seto Ghumba" title="Seto Ghumba">
						</a>
					</figure>          
				</article><!-- .slides --> 	
				
				<article class="post hentry slides demo-image displaynone">
					<figure class="slider-image">
						<a title="Kathmandu Durbar Square" href="#">
							<img src="'. get_template_directory_uri() . '/images/demo/slider-2-1600x600.jpg" class="wp-post-image" alt="Kathmandu Durbar Square" title="Kathmandu Durbar Square">
						</a>
					</figure>
				</article><!-- .slides --> 			
			</section>
			<div id="controllers"></div>
		</div><!-- #main-slider -->';
			
	set_transient( 'adventurous_default_sliders', $adventurous_default_sliders, 86940 );
	}
	echo $adventurous_default_sliders;	
} // adventurous_default_sliders	


if ( ! function_exists( 'adventurous_post_sliders' ) ) :
/**
 * Template for Featued Post Slider
 *
 * To override this in a child theme
 * simply create your own adventurous_post_sliders(), and that function will be used instead.
 *
 * @uses adventurous_header action to add it in the header
 * @since Adventurous 1.0
 */
function adventurous_post_sliders() { 
	//delete_transient( 'adventurous_post_sliders' );
	
	global $post, $adventurous_options_settings;
   	$options = $adventurous_options_settings;

	
	if( ( !$adventurous_post_sliders = get_transient( 'adventurous_post_sliders' ) ) && !empty( $options[ 'featured_slider' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$adventurous_post_sliders = '
		<div id="main-slider">
        	<section class="featured-slider">';
				$get_featured_posts = new WP_Query( array(
					'posts_per_page' => $options[ 'slider_qty' ],
					'post__in'		 => $options[ 'featured_slider' ],
					'orderby' 		 => 'post__in',
					'ignore_sticky_posts' => 1 // ignore sticky posts
				));
				$i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
					$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
					$excerpt = get_the_excerpt();
					if ( $i == 1 ) { $classes = 'post postid-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'post postid-'.$post->ID.' hentry slides displaynone'; }
					$adventurous_post_sliders .= '
					<article class="'.$classes.'">
						<figure class="slider-image">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
								'. get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'pngfix' ) ).'
							</a>	
						</figure>';
						if ( empty ( $options[ 'disable_slider_text' ] ) ) {
							$adventurous_post_sliders .= '
							<div class="entry-container">
								<header class="entry-header">
									<h1 class="entry-title">
										<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
									</h1>
								</header>';
								if( $excerpt !='') {
									$adventurous_post_sliders .= '<div class="entry-content">'. $excerpt.'</div>';
								}
								$adventurous_post_sliders .= '
							</div>';
						}
						
					$adventurous_post_sliders .= '</article><!-- .slides -->';
					
				endwhile; wp_reset_query();
				$adventurous_post_sliders .= '
			</section>
        	<div id="controllers"></div>
  		</div><!-- #main-slider -->';
			
	set_transient( 'adventurous_post_sliders', $adventurous_post_sliders, 86940 );
	}
	echo $adventurous_post_sliders;	
} // adventurous_post_sliders	
endif;


if ( ! function_exists( 'adventurous_page_sliders' ) ) :
/**
 * Template for Featued Page Slider
 *
 * To override this in a child theme
 * simply create your own adventurous_page_sliders(), and that function will be used instead.
 *
 * @uses adventurous_header action to add it in the header
 * @since Adventurous 1.0
 */
function adventurous_page_sliders() { 
	//delete_transient( 'adventurous_page_sliders' );
	
	global $post;
	global $adventurous_options_settings;
   	$options = $adventurous_options_settings;

	
	if( ( !$adventurous_page_sliders = get_transient( 'adventurous_page_sliders' ) ) && !empty( $options[ 'featured_slider_page' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$adventurous_page_sliders = '
		<div id="main-slider">
        	<section class="featured-slider">';
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'	=> $options[ 'slider_qty' ],
					'post_type'			=> 'page',
					'post__in'			=> $options[ 'featured_slider_page' ],
					'orderby' 			=> 'post__in'
				));
				$i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
					$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
					$excerpt = get_the_excerpt();
					if ( $i == 1 ) { $classes = 'page pageid-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'page pageid-'.$post->ID.' hentry slides displaynone'; }
					$adventurous_page_sliders .= '
					<article class="'.$classes.'">
						<figure class="slider-image">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
								'. get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'pngfix' ) ).'
							</a>	
						</figure>';
						if ( empty ( $options[ 'disable_slider_text' ] ) ) {
							$adventurous_page_sliders .= '
							<div class="entry-container">
								<header class="entry-header">
									<h1 class="entry-title">
										<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
									</h1>
								</header>';
								if( $excerpt !='') {
									$adventurous_page_sliders .= '<div class="entry-content">'. $excerpt.'</div>';
								}
								$adventurous_page_sliders .= '
							</div>';
						}
					$adventurous_page_sliders .= '</article><!-- .slides -->';	
					
				endwhile; wp_reset_query();
				$adventurous_page_sliders .= '
			</section>
        	<div id="controllers"></div>
  		</div><!-- #main-slider -->';
			
	set_transient( 'adventurous_page_sliders', $adventurous_page_sliders, 86940 );
	}
	echo $adventurous_page_sliders;	
} // adventurous_page_sliders	
endif;


if ( ! function_exists( 'adventurous_category_sliders' ) ) :
/**
 * Template for Featued Page Slider
 *
 * To override this in a child theme
 * simply create your own adventurous_category_sliders(), and that function will be used instead.
 *
 * @uses adventurous_header action to add it in the header
 * @since Adventurous 1.0
 */
function adventurous_category_sliders() { 
	//delete_transient( 'adventurous_category_sliders' );
	
	global $post;
	global $adventurous_options_settings;
   	$options = $adventurous_options_settings;

	
	if( ( !$adventurous_category_sliders = get_transient( 'adventurous_category_sliders' ) ) && !empty( $options[ 'slider_category' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$adventurous_category_sliders = '
		<div id="main-slider">
        	<section class="featured-slider">';
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'		=> $options[ 'slider_qty' ],
					'category__in'			=> $options[ 'slider_category' ],
					'ignore_sticky_posts' 	=> 1 // ignore sticky posts
				));
				$i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
					$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
					$excerpt = get_the_excerpt();
					if ( $i == 1 ) { $classes = 'post pageid-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'post pageid-'.$post->ID.' hentry slides displaynone'; }
					$adventurous_category_sliders .= '
					<article class="'.$classes.'">
						<figure class="slider-image">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
								'. get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'pngfix' ) ).'
							</a>	
						</figure>';
						if ( empty ( $options[ 'disable_slider_text' ] ) ) {
							$adventurous_category_sliders .= '
							<div class="entry-container">
								<header class="entry-header">
									<h1 class="entry-title">
										<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
									</h1>
								</header>';
								if( $excerpt !='') {
									$adventurous_category_sliders .= '<div class="entry-content">'. $excerpt.'</div>';
								}
								$adventurous_category_sliders .= '
							</div>';
						}
					$adventurous_category_sliders .= '</article><!-- .slides -->';	
					
				endwhile; wp_reset_query();
				$adventurous_category_sliders .= '
			</section>
        	<div id="controllers"></div>
  		</div><!-- #main-slider -->';
			
	set_transient( 'adventurous_category_sliders', $adventurous_category_sliders, 86940 );
	}
	echo $adventurous_category_sliders;	
} // adventurous_category_sliders	
endif;


if ( ! function_exists( 'adventurous_image_sliders' ) ) :
/**
 * Template for Featued Image Slider
 *
 * To override this in a child theme
 * simply create your own adventurous_image_sliders(), and that function will be used instead.
 *
 * @uses adventurous_header action to add it in the header
 * @since Adventurous 1.0
 */
function adventurous_image_sliders() { 
	//delete_transient( 'adventurous_image_sliders' );
	
	global $adventurous_options_settings;
   	$options = $adventurous_options_settings;

	$more_tag_text = $options[ 'more_tag_text' ];
	
	if ( ( !$adventurous_image_sliders = get_transient( 'adventurous_image_sliders' ) ) && !empty( $options[ 'featured_image_slider_image' ] ) ) {
		echo '<!-- refreshing cache -->';
		
		$adventurous_image_sliders = '
		<div id="main-slider">
        	<section class="featured-slider">';	
			
				for ( $i=0; $i<=$options[ 'slider_qty' ]; $i++ ) {
					
					//Adding in Classes for Display blok and none
					if ( $i == 1 ) { $classes = 'image imageid-'.$i.' hentry slides displayblock'; } else { $classes = 'image imageid-'.$i.' hentry slides displaynone'; }


					//Check Image Not Empty to add in the slides
					if ( !empty ( $options[ 'featured_image_slider_image' ][ $i ] ) ) { 

						//Checking Title
						if ( !empty ( $options[ 'featured_image_slider_title' ][ $i ] ) ) {
							$imagetitle = $options[ 'featured_image_slider_title' ][ $i ];
							
							if ( !empty ( $options[ 'featured_image_slider_link' ][ $i ] ) ) {
								$title = '<header class="entry-header"><h1 class="entry-title"><a title="' . $imagetitle . '" href="'.$options[ 'featured_image_slider_link' ][ $i ].'" target="'.$target.'"><span>' . $imagetitle . '</span></a></h1></header>';
							}
							else {
								$title = '<header class="entry-header"><h1 class="entry-title"><span>' . $imagetitle . '</span></h1></header>';
							}
							
						}
						else {
							$title = '';
							$imagetitle = '';
						}
						
						//Checking Link
						if ( !empty ( $options[ 'featured_image_slider_link' ][ $i ] ) ) {
							//support for qtranslate custom link
							if ( function_exists( 'qtrans_convertURL' ) ) {
								$link = qtrans_convertURL($options[ 'featured_image_slider_link' ][ $i ]);
							}
							else {
								$link = $options[ 'featured_image_slider_link' ][ $i ];
							}
							//Checking Link Target
							if ( !empty ( $options[ 'featured_image_slider_base' ][ $i ] ) ) {
								$target = '_blank';
							} else {
								$target = '_self';
							}
							//Checking image
							$image = '<figure class="slider-image"><a title="' . $imagetitle . '" href="' . $link . '" target="' . $target . '"><img title="' . $imagetitle . '" alt="' . $imagetitle . '" class="wp-post-image" src="'.$options[ 'featured_image_slider_image' ][ $i ].'" /></a></figure>';
						}
						else {
							$link = '';
							$target = '';
							$image = '<figure class="slider-image"><span class="no-img-link"><img title="' . $imagetitle . '" alt="' . $imagetitle . '" class="wp-post-image" src="'.$options[ 'featured_image_slider_image' ][ $i ].'" /></figure>';
						}
						
						//Checking Content
						if ( !empty ( $options[ 'featured_image_slider_content' ][ $i ] ) ) {
							$imagecontent = $options[ 'featured_image_slider_content' ][ $i ];
							
							if ( !empty ( $options[ 'featured_image_slider_link' ][ $i ] ) ) {
								$content = '<div class="entry-content">' . $imagecontent . ' <a href="' . $link . '" class="more-link" target="' . $target . '">' . $more_tag_text . '</a></div>';
							}
							else {
								$content = '<div class="entry-content">' . $imagecontent . '</div>';	
							}
						}
						else {
							$content = '';
							$imagecontent = '';
						}
						
						//Content Opening and Closing
						if ( !empty ( $options[ 'featured_image_slider_title' ][ $i ] ) || !empty ( $options[ 'featured_image_slider_content' ][ $i ] ) ) {
							$contentopening = '<div class="entry-container">';
							$contentclosing = '</div>';
						}
						else {
							$contentopening = '';
							$contentclosing = '';
						}

						$adventurous_image_sliders .= '
						<article class="'.$classes.'">'
							.$image;
							if ( empty ( $options[ 'disable_slider_text' ] ) ) {
								$adventurous_image_sliders .=
								$contentopening
									.$title
									.$content
								.$contentclosing;
							}
						$adventurous_image_sliders .= '</article><!-- .slides -->';
						
					}
				}
			$adventurous_image_sliders .= '
			</section>
        	<div id="controllers"></div>
  		</div><!-- #main-slider -->';
			
	set_transient( 'adventurous_image_sliders', $adventurous_image_sliders, 86940 );
	}
	echo $adventurous_image_sliders;	
} // adventurous_image_sliders	
endif;


if ( ! function_exists( 'adventurous_slider_display' ) ) :
/**
 * Shows Slider
 */
function adventurous_slider_display() {
	global $post, $wp_query, $adventurous_options_settings;;
   	$options = $adventurous_options_settings;

	// get data value from theme options
	$enableslider = $options[ 'enable_slider' ];
	$slidertype = $options[ 'select_slider_type' ];
	
	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts'); 

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	
	if ( ( $enableslider == 'enable-slider-allpage' ) || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && $enableslider == 'enable-slider-homepage' ) ) :
		// This function passes the value of slider effect to js file 
		if ( function_exists( 'adventurous_pass_slider_value' ) ) : adventurous_pass_slider_value(); endif;

		if (  $slidertype == 'post-slider' ) {
			if ( !empty( $options[ 'featured_slider' ] ) && function_exists( 'adventurous_post_sliders' ) ) {
				adventurous_post_sliders();
			}
			else {
				echo '<p style="text-align: center">' . esc_attr__( 'You have selected Post Slider but you haven\'t added the Post ID in "Appearance => Theme Options => Featured Slider => Featured Post Slider Options"', 'adventurous' ) . '</p>';
			}
		}
		elseif (  $slidertype == 'page-slider' ) {
			if ( !empty( $options[ 'featured_slider_page' ] ) && function_exists( 'adventurous_page_sliders' ) ) {
				adventurous_page_sliders();
			}
			else {
				echo '<p style="text-align: center">' . esc_attr__( 'You have selected Page Slider but you haven\'t added the Page ID in "Appearance => Theme Options => Featured Slider => Featured Page Slider Options"', 'adventurous' ) . '</p>';
			}			
		}
		elseif (  $slidertype == 'category-slider' ) {
			if ( !empty( $options[ 'slider_category' ] ) && function_exists( 'adventurous_category_sliders' ) ) {
				adventurous_category_sliders();
			}
			else {
				echo '<p style="text-align: center">' . esc_attr__( 'You have selected Category Slider but you haven\'t selected any categories in "Appearance => Theme Options => Featured Slider => Featured Category Slider Options"', 'adventurous' ) . '</p>';
			}			
		}
		elseif (  $slidertype == 'image-slider' ) {
			if ( !empty( $options[ 'featured_image_slider_image' ] ) && function_exists( 'adventurous_image_sliders' ) ) {
				adventurous_image_sliders();
			}
			else {
				echo '<p style="text-align: center">' . esc_attr__( 'You have selected Image Slider but you haven\'t uploaded any image in "Appearance => Theme Options => Featured Slider => Featured Image Slider Options"', 'adventurous' ) . '</p>';
			}				
		}		
		else {
			adventurous_default_sliders();
		}
	endif;	
}
endif; // adventurous_slider_display

add_action( 'adventurous_before_main', 'adventurous_slider_display', 40 );