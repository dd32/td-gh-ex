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

		$output = '';
		$output .= '<div class="flex-container">';         
		$output .= '<div class="flexslider">';         
		$output .= '<ul class="slides">';          
	if ( greenr_slide_exists() ) {     
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
	}else {
			$output .= '<li>';    
			$slide_image = GREENR_PARENT_URL .'/images/slide1.png';
			$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
			$slide_description = sprintf( __( '<h1>The Most Modern WordPress Theme</h1><h3> Slider Setting </h3><p>You haven\'t created any slider yet. Go to Customizer and click Home => FlexSlider Settings, edit or add  your images and Caption.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'greenr' ), admin_url('customize.php') );
			$output .= '<div class="flex-caption">' . $slide_description . '</div>';
			$output .= '</li>';
		}

		$output .= '</ul>';
		$output .= '</div><!-- .flexslider -->';
		$output .= '</div><!-- .flex-container -->';

		echo $output;

	if ( get_theme_mod('info') ) {
		$info = get_theme_mod('info');
		echo '<div class="services gap nomrn"><div class="container">';
		echo $info;
		echo '</div></div>';
	}else {
		echo '<div class="services gap nomrn"><div class="container">';
		printf('<div class="one-third column"><img src="' . get_template_directory_uri() . '/images/info.png"></div>');
		echo '<div class="two-thirds column"><h2>';
		printf( __('Info text : Set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Info Section.</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here", making it look like readable English.</p><div class="row"><div class="eight columns"><h2>Branding Design</h2><p>Duis blandit eget leo eu interdum. Mauris accumsan euismod aliquet. Phasellus quis mi vitae orci tempor tempus vel sit amet nulla. Fusce gravida ligula et felis ultricies, lobortis interdum est ultrices. Praesent commodo justo eget sapien ornare hendrerit. Cras consequat lobortis velit, et hendrerit sapien. Sed commodo vel sem a convallis.</p><a href="#">Keep Reading</a></div><div class="eight columns"><h2>Web Development</h2><p>Duis blandit eget leo eu interdum. Mauris accumsan euismod aliquet. Phasellus quis mi vitae orci tempor tempus vel sit amet nulla. Fusce gravida ligula et felis ultricies, lobortis interdum est ultrices. Praesent commodo justo eget sapien ornare hendrerit. Cras consequat lobortis velit, et hendrerit sapien. Sed commodo vel sem a convallis.</p><a href="#">Keep Reading</a></div></div></div>', 'greenr'), admin_url('customize.php') );
		echo '</div></div>';
	}

	if ( get_theme_mod('testimonial') ) {
		$testimonial = get_theme_mod( 'testimonial' ) ;
		echo $testimonial;
	}else {
		echo '<div class="container gap"><div class="testimonials"><ul class="slides"><li><div class="testimony"><img src="'. get_template_directory_uri() . '/images/client.png"><p>Testimonial text : Set your own custom text. Click  <a href="'.admin_url('customize.php').'"target="_blank"> Customizer </a> and Goto Home => Testimonial Section.</p><p class="client"><strong>Lord Varys</strong>, Spy Master, Iron Throne</p></div></li></ul><br class="clear"/></div></div>';
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
		} else {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '<h2>' . __('Featured Page','greenr') .'</h2></div>';
			$output .= sprintf( __( '<div class="service"><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p></div>', 'greenr'), admin_url('customize.php') );
			$output .= '</div><!-- .one-third -->';
		}

		if ( get_theme_mod('service-icon-2') || get_theme_mod('service-title-2') || get_theme_mod('service-description-2') )  {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-2') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-2') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-2') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '<h2>' . __('Featured Page','greenr') .'</h2></div>';
			$output .= sprintf( __( '<div class="service"><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p></div>', 'greenr'), admin_url('customize.php') );
			$output .= '</div><!-- .one-third -->';
		}

		if ( get_theme_mod('service-icon-3') || get_theme_mod('service-title-3') || get_theme_mod('service-description-3') )  {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-3') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-3') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-3') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '<h2>' . __('Featured Page','greenr') .'</h2></div>';
			$output .= sprintf(__( '<div class="service"><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p></div>', 'greenr'), admin_url('customize.php') );
			$output .= '</div><!-- .one-third -->';
		}

		if ( get_theme_mod('service-icon-4') || get_theme_mod('service-title-4') || get_theme_mod('service-description-4') )  {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-4') ) . '"></i></p>';
			$output .= '<h2>' . esc_html( get_theme_mod('service-title-4') ) . '</h2></div>';
			$output .= '<div class="service">' . get_theme_mod('service-description-4') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="four columns" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '<h2>' . __('Featured Page','greenr') . '</h2></div>';
			$output .= sprintf( __('<div class="service"><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Service Section -2 .</p></div>', 'greenr' ), admin_url('customize.php') );
			$output .= '</div><!-- .one-third -->';
		}

		$output .= '</div><!-- .container -->';
		$output .= '</div><!-- .services -->';

		echo $output;

	if ( get_theme_mod('cta') ) {
		$cta = get_theme_mod('cta');
		echo '<div class="container gap">';
		echo $cta;
		echo '</div>';
	}else {
		echo '<div class="container gap">';
		echo '<div class="callout-widget"><div class="call-content"><p>CTA text : Set your own custom text. Click  <a href="'.admin_url('customize.php').'"target="_blank"> Customizer </a> and Goto Home => Additional Info Section .</p></div><div class="callout-btn"><a href="#">Take Action</a></div><br class="clear"></div>';
		echo '</div>';
	}

	get_footer(); 
}
?>