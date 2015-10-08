<?php
/**
 * The Front Page template file.
 *
 * This is the front page template file, use to display static page
 * when set 'Front page displays' to a page in Reading Settings
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GREENR
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {
	get_header(); 

	if ( greenr_slide_exists() ) {
		$output = '';
		$output .= '<div class="flex-container">';   
		$output .= '<div class="flexslider">';
		$output .= '<ul class="slides">';          

		for( $slide_count = 1 ;  $slide_count < 6; $slide_count++ ) {
			
			if ( get_theme_mod( 'image_upload-' . $slide_count ) ) {
				$output .= '<li>';
				$slide_image = get_theme_mod( 'image_upload-' . $slide_count );
				$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
			}

			if ( get_theme_mod( 'flexcaption-' . $slide_count ) ) {
				$slide_description =  get_theme_mod( 'flexcaption-' . $slide_count );
				$output .= '<div class="flex-caption">' . $slide_description . '</div>';
			} 

			$output .= '</li>';
			
		}

		$output .= '</ul>';
		$output .= '</div><!-- .flexslider -->';
		$output .= '</div><!-- .flex-container -->';

		echo $output;
	}
	if ( get_theme_mod('info') ) {
		$info = get_theme_mod('info');
		echo '<div class="services gap nomrn"><div class="container">';
		echo $info;
		echo '</div></div>';
	}
	if ( get_theme_mod('testimonial') ) {
		$testimonial = get_theme_mod( 'testimonial' ) ;
		echo $testimonial;
	}

		$output = '';
		$output = '<div class="services">';
		$output .= '<div class="container">';
		
		if ( get_theme_mod('service-icon-1') || get_theme_mod('service-title-1') || get_theme_mod('service-description-1') ) {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-1') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-1') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-1') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} 

		if ( get_theme_mod('service-icon-2') || get_theme_mod('service-title-2') || get_theme_mod('service-description-2') )  {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-2') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-2') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-2') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} 

		if ( get_theme_mod('service-icon-3') || get_theme_mod('service-title-3') || get_theme_mod('service-description-3') )  {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-3') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-3') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-3') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} 

		if ( get_theme_mod('service-icon-4') || get_theme_mod('service-title-4') || get_theme_mod('service-description-4') )  {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-4') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-4') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-4') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} 

		$output .= '</div><!-- .container -->';
		$output .= '</div><!-- .services -->';

		echo $output;

		$cta = get_theme_mod('cta');
		echo '<div class="container gap">';
		echo $cta;
		echo '</div>';

	get_footer(); 
}
?>