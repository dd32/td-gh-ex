<?php
/**
 *	The template for dispalying the about section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	if( is_customize_preview() ) {
		$bg_image = get_theme_mod('asterion_counters_bg_image', get_template_directory_uri() . '/images/counters-bg.jpg' );
		$counter_set = get_theme_mod('asterion_counters_title_1', 1);
	} else {
		$bg_image = get_theme_mod('asterion_counters_bg_image');
		$counter_set = get_theme_mod('asterion_counters_title_1');
	}

	$default_val = array(
		1 => array( 'title' => esc_html__('Awards','asterion'), 'count' => '16'),
		2 => array( 'title' => esc_html__('Clients','asterion'), 'count' => '453'),
		3 => array( 'title' => esc_html__('Team','asterion'), 'count' => '7'),
		4 => array( 'title' => esc_html__('Projects','asterion'), 'count' => '24'),
	);

	$bg_color = get_theme_mod('asterion_counters_bg_color', '#ffffff');

	
	if( get_theme_mod('asterion_counters_bg_type', 1) == 2 ) {
		$bg_style = 'background-color:'.$bg_color;
	} else {
		$bg_style = 'background-image: url('.$bg_image.')';
	}

	if ( get_theme_mod('asterion_counters_image_parallax', 1) ) {
		$parallax_class = " intro-parallax"; 
	} else { 
		$parallax_class = false; 
	}

	if ( get_theme_mod('asterion_counters_image_overlay', 1) ) {
		$overlay_class = " dark-overlay"; 
	} else { 
		$overlay_class = false; 
	}

	$text_color = get_theme_mod('asterion_counters_text_color', 0);
?>

<?php if( $counter_set ) : ?>
	<div id="counters" class="stats-bar <?php echo esc_attr(( $text_color == 1) ? 'text-light' : 'text-dark').$parallax_class; ?>" style="<?php echo esc_attr( $bg_style );?>">
		<div class="short-section<?php echo esc_attr($overlay_class);?>">
			<div class="ot-container text-center">
				<div class="row">
					<?php 
					
						foreach ($default_val as $key => $value) :
							
							if( is_customize_preview() ) {
								$title = get_theme_mod('asterion_counters_title_'.$key, $default_val[$key]['title']);
								$count = get_theme_mod('asterion_counters_count_'.$key, $default_val[$key]['count']);
							} else {
								$title = get_theme_mod('asterion_counters_title_'.$key);
								$count = get_theme_mod('asterion_counters_count_'.$key);
							}

							
					?>
						<?php if( $title || $count ) : ?>
							<div class="col-md-3 mb-sm-30 <?php echo esc_attr( 'ot-counter-nr-'.$key );?>">
								<div class="counter-item">
									<h2 class="stat-number" data-n="<?php echo esc_attr( $count ); ?>">0</h2>
									<h6><?php echo esc_html($title); ?></h6>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				

				</div>
			</div>
		</div>
	</div>
<?php endif; ?>