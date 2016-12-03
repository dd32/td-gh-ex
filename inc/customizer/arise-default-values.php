<?php
if(!function_exists('arise_get_option_defaults_values')):
/******************** ARISE DEFAULT OPTION VALUES ******************************************/
function arise_get_option_defaults_values() {
	global $arise_default_values;
	$arise_default_values = array(
		'arise_responsive'	=> 'on',
		'arise_design_layout' => 'wide-layout',
		'arise_sidebar_layout_options' => 'right',
		'arise_blog_layout_temp' => 'large_image_display',
		'arise_enable_slider' => 'frontpage',
		'arise_transition_effect' => 'fade',
		'arise_transition_delay' => '4',
		'arise_transition_duration' => '1',
		'arise_secondary_text'	=> '',
		'arise_secondary_url' => '',
		'arise_top_bar' => 0,
		'arise_search_custom_header' => 0,
		'arise-img-upload-header-logo'	=> '',
		'arise_header_display'=> 'header_text',
		'arise_categories'	=> array(),
		'arise_custom_css'	=> '',
		'arise_scroll'	=> 0,
		'arise_custom_header_options' => 'homepage',
		'arise_slider_link' =>0,
		'arise_tag_text' => 'Read More',
		'arise_excerpt_length'	=> '30',
		'arise_single_post_image' => 'off',
		'arise_reset_all' => 0,
		'arise_stick_menu'	=>0,
		'arise_blog_post_image' => 'on',
		'arise_blog_content_layout' => 'excerptblog_display',
		'arise_search_text' => 'Search ...',
		'arise_slider_type' => 'default_slider',
		'arise_slider_textposition' => 'middle',
		'arise_slider_no' => '4',
		'arise_slider_button' => 0,
		'arise_total_features' => '3',
		'arise_features_title' => '',
		'arise_features_description' => '',
		'arise_disable_features' => 0,
		'arise_slider_header_line'=> 0,
		'arise_display_header_image' => 'below',
		'arise_disable_features_alterpage' => 0,
		'arise_header_primary_text' =>'',
		'arise_header_primary_url' => '',
		'arise_header_secondary_text' =>'',
		'arise_Header_secondary_url' => '',
		'arise_Header_description'	=> '',
		'arise_footer_column_section' =>'4',
		'arise_disable_header_image_only' => 0,
		'arise_entry_format_blog' => 'show',
		'arise_entry_meta_blog' => 'show-meta',
		'arise_slider_content'	=> 'on',
		'arise_top_social_icons'	=> 0,
		'arise_buttom_social_icons'	=> 0,
		'arise_display_page_featured_image'=>0
		);
	return apply_filters( 'arise_get_option_defaults_values', $arise_default_values );
}
endif;
?>
