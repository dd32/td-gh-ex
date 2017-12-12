<?php
/**
 * Default theme options.
 *
 * @package best-education
 */

if ( ! function_exists( 'best_education_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function best_education_get_default_theme_options() {

		$defaults = array();

		$defaults['home_grid_layout']     			= 'homepage-style-1';

		// Slider Section.
		$defaults['show_slider_section']					= 0;
		$defaults['number_of_home_slider']					= 3;
		$defaults['select_category_for_slider']				= 1;
		$defaults['select_category_for_slider_double_post']	= 1;
		
		/*Latest Blog Default Value*/
		$defaults['show_featured_section']				= 0;
		$defaults['main_title_featured_section']		= '';
		$defaults['select_category_for_featured']		= 0;

		/*layout*/
		$defaults['home_page_content_status']     	= 1;
		$defaults['enable_overlay_option']			= 1;
		$defaults['homepage_layout_option']			= 'full-width';
		$defaults['global_layout']					= 'right-sidebar';
		$defaults['excerpt_length_global']			= 50;
		$defaults['archive_layout']					= 'excerpt-only';
		$defaults['archive_layout_image']			= 'full';
		$defaults['single_post_image_layout']		= 'full';
		$defaults['pagination_type']				= 'default';
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'best-education' );
		$defaults['social_icon_style']				= 'square';
		$defaults['number_of_footer_widget']		= 3;
		$defaults['breadcrumb_type']				= 'simple';

		// Pass through filter.
		$defaults = apply_filters( 'best_education_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
