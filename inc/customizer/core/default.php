<?php
/**
 * Default theme options.
 *
 * @package bc-business-consulting
 */

if ( ! function_exists( 'business_consulting_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function business_consulting_get_default_theme_options() {

		$defaults = array();
		
		/*Global Layout*/
		$defaults['social_profile']     			= 1;
		$defaults['social_profile_link']     		= '#';
		$defaults['search_icon']     			= 1;
		
		/*Posts Layout*/
		$defaults['blog_layout']     				= 'pull-left';
		$defaults['excerpt_length_blog']     		= 60;
		$defaults['blog_loop_content_type']     	= 'excerpt-only';
		/*Posts Layout*/
		$defaults['page_layout']     				= 'pull-left';
		
		/*layout*/
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'bc-business-consulting' );
		
		$defaults['dialog_top'] 					= esc_html__( 'Your Trusted 24 Hours Service Provider! ', 'bc-business-consulting' );
		
		$defaults['business_consulting_award']['award_title_1']['title']		= esc_html__( 'Number #1 Provider', 'bc-business-consulting' );
		$defaults['business_consulting_award']['award_title_1']['text']		= esc_html__( 'of Industrial Solution', 'bc-business-consulting' );
		
		$defaults['business_consulting_award']['award_title_2']['title']		= esc_html__( 'Global Certificate', 'bc-business-consulting' );
		$defaults['business_consulting_award']['award_title_2']['text']		= esc_html__( 'ISO 9001:2015', 'bc-business-consulting' );
		
		$defaults['business_consulting_award']['award_title_3']['title']		= esc_html__( 'Award Winning', 'bc-business-consulting' );
		$defaults['business_consulting_award']['award_title_3']['text']		= esc_html__( 'Solution Of The Year', 'bc-business-consulting' );

		// Pass through filter.
		$defaults = apply_filters( 'business_consulting_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
