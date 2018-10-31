<?php
/**
 * Default theme options.
 *
 * @package Best Learner
 */

if ( ! function_exists( 'best_learner_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function best_learner_get_default_theme_options() {

	$defaults = array();

	$defaults['show_header_contact_info'] 	= true;
    $defaults['header_email']             	= __( 'info@creativthemes.com','best-learner' );
    $defaults['header_phone' ]            	= __( '+1-541-754-3010','best-learner' );
    $defaults['header_location' ]           = __( 'London, UK','best-learner' );
    $defaults['show_header_social_links'] 	= true;
    $defaults['header_social_links']		= array();

	// Featured Slider Section
	$defaults['disable_featured_slider']	= true;
	$defaults['number_of_sr_items']			= 3;
	$defaults['sr_content_type']			= 'sr_page';

	// Featured Courses Section
	$defaults['disable_featured_courses_section']	= true;
	$defaults['featured_courses_title']	   	 		= esc_html__( 'Our Courses', 'best-learner' );
	$defaults['number_of_ss_column']				= 3;
	$defaults['number_of_ss_items']					= 3;
	$defaults['ss_content_type']					= 'ss_page';

	//Featured Plans Section	
	$defaults['disable_featured_plans_section']	= true;
	$defaults['number_of_cs_column']			= 3;
	$defaults['number_of_cs_items']				= 3;
	$defaults['cs_content_type']				= 'cs_page';

	// Why Choose Us Section
	$defaults['disable_additional_info_section']	= true;
	$defaults['additional_info_section_title']	   	= esc_html__( 'Why Choose Us', 'best-learner' );
	$defaults['number_of_column']					= 3;
	$defaults['number_of_items']					= 3;
	$defaults['ad_content_type']					= 'ad_page';

	//Cta Section	
	$defaults['disable_cta_section']	   	= true;
	$defaults['background_cta_section']		= get_template_directory_uri() .'/assets/images/default-header.jpg';
	$defaults['cta_small_description']	   	= esc_html__( 'Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.', 'best-learner' );
	$defaults['cta_description']	   	 	= esc_html__( 'We work hard to prepare every student for their professional life', 'best-learner' );
	$defaults['cta_button_label']	   	 	= esc_html__( 'Purchase Now', 'best-learner' );
	$defaults['cta_button_url']	   	 		= '#';

	// Blog Section
	$defaults['disable_blog_section']		= true;
	$defaults['blog_title']	   	 			= esc_html__( 'Latest Notice', 'best-learner' );
	$defaults['blog_category']	   			= 0; 
	$defaults['blog_number']				= 3;

	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','best-learner');
	$defaults['excerpt_length']				= 40;
	$defaults['layout_options']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'best-learner' );

	// Pass through filter.
	$defaults = apply_filters( 'best_learner_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'best_learner_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function best_learner_get_option( $key ) {

		$default_options = best_learner_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;