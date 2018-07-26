<?php
/**
 * Sets all of our theme defaults.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'asagi_get_defaults' ) ) {
	/**
	 * Set default options
	 *
	 */
	function asagi_get_defaults() {
		$asagi_defaults = array(
			'hide_title' => '',
			'hide_tagline' => '',
			'top_bar_width' => 'full',
			'top_bar_inner_width' => 'contained',
			'top_bar_alignment' => 'left',
			'container_width' => '1100',
			'header_layout_setting' => 'contained-header',
			'header_inner_width' => 'contained',
			'nav_alignment_setting' => 'center',
			'header_alignment_setting' => 'center',
			'nav_layout_setting' => 'contained-nav',
			'nav_inner_width' => 'contained',
			'nav_position_setting' => 'nav-below-header',
			'nav_dropdown_type' => 'hover',
			'nav_search' => 'disable',
			'content_layout_setting' => 'separate-containers',
			'layout_setting' => 'right-sidebar',
			'blog_layout_setting' => 'right-sidebar',
			'single_layout_setting' => 'right-sidebar',
			'blog_header_image' => '',
			'post_content' => 'excerpt',
			'footer_layout_setting' => 'fluid-footer',
			'footer_inner_width' => 'contained',
			'footer_widget_setting' => '3',
			'footer_copyright' => __( '&copy; 2018 All rights reserved.', 'asagi' ),
			'footer_bar_alignment' => 'right',
			'back_to_top' => 'enable',
			'text_color' => '#3a3a3a',
			'link_color' => '#936d02',
			'link_color_hover' => '#000000',
			'link_color_visited' => '',
			'font_awesome_essentials' => true,
			'header_date' => true,
			'header_date_format' => 'M d, Y'
		);

		return apply_filters( 'asagi_option_defaults', $asagi_defaults );
	}
}

if ( ! function_exists( 'asagi_get_color_defaults' ) ) {
	/**
	 * Set default options
	 */
	function asagi_get_color_defaults() {
		$asagi_color_defaults = array(
			'top_bar_background_color' => '#936d02',
			'top_bar_text_color' => '#ffffff',
			'top_bar_link_color' => '#eeeeee',
			'top_bar_link_color_hover' => '#ffffff',
			'header_background_color' => 'rgba(255,255,255,0)',
			'header_text_color' => '#3a3a3a',
			'header_link_color' => '#3a3a3a',
			'header_link_hover_color' => '',
			'site_title_color' => '#222222',
			'site_tagline_color' => '#555555',
			'navigation_background_color' => 'rgba(255,255,255,0)',
			'navigation_text_color' => '#222222',
			'navigation_background_hover_color' => '#3f3f3f',
			'navigation_text_hover_color' => '#ffffff',
			'navigation_background_current_color' => 'rgba(255,255,255,0)',
			'navigation_text_current_color' => '#222222',
			'subnavigation_background_color' => '#3f3f3f',
			'subnavigation_text_color' => '#ffffff',
			'subnavigation_background_hover_color' => '#4f4f4f',
			'subnavigation_text_hover_color' => '#ffffff',
			'subnavigation_background_current_color' => '#4f4f4f',
			'subnavigation_text_current_color' => '#ffffff',
			'content_background_color' => '#ffffff',
			'content_text_color' => '',
			'content_link_color' => '',
			'content_link_hover_color' => '',
			'content_title_color' => '',
			'blog_post_title_color' => '',
			'blog_post_title_hover_color' => '',
			'entry_meta_text_color' => '#888888',
			'entry_meta_link_color' => '#555555',
			'entry_meta_link_color_hover' => '#936d02',
			'h1_color' => '',
			'h2_color' => '',
			'h3_color' => '',
			'h4_color' => '',
			'h5_color' => '',
			'h6_color' => '',
			'sidebar_widget_background_color' => '#ffffff',
			'sidebar_widget_text_color' => '',
			'sidebar_widget_link_color' => '',
			'sidebar_widget_link_hover_color' => '',
			'sidebar_widget_title_color' => '#222222',
			'footer_widget_background_color' => '#ffffff',
			'footer_widget_text_color' => '',
			'footer_widget_link_color' => '',
			'footer_widget_link_hover_color' => '',
			'footer_widget_title_color' => '#222222',
			'footer_background_color' => '#936d02',
			'footer_text_color' => '#ffffff',
			'footer_link_color' => '#ffffff',
			'footer_link_hover_color' => '#eeeeee',
			'form_background_color' => '#fafafa',
			'form_text_color' => '#555555',
			'form_background_color_focus' => '#ffffff',
			'form_text_color_focus' => '#555555',
			'form_border_color' => '#cccccc',
			'form_border_color_focus' => '#bfbfbf',
			'form_button_background_color' => '#555555',
			'form_button_background_color_hover' => '#3f3f3f',
			'form_button_text_color' => '#ffffff',
			'form_button_text_color_hover' => '#ffffff',
			'back_to_top_background_color' => 'rgba( 0,0,0,0.4 )',
			'back_to_top_background_color_hover' => 'rgba( 0,0,0,0.6 )',
			'back_to_top_text_color' => '#ffffff',
			'back_to_top_text_color_hover' => '#ffffff',
		);

		return apply_filters( 'asagi_color_option_defaults', $asagi_color_defaults );
	}
}

if ( ! function_exists( 'asagi_get_default_fonts' ) ) {
	/**
	 * Set default options.
	 *
	 *
	 * @param bool $filter Whether to return the filtered values or original values.
	 * @return array Option defaults.
	 */
	function asagi_get_default_fonts( $filter = true ) {
		$asagi_font_defaults = array(
			'font_body' => 'Playfair Display',
			'font_body_category' => 'serif',
			'font_body_variants' => 'regular',
			'body_font_weight' => 'normal',
			'body_font_transform' => 'none',
			'body_font_size' => '18',
			'body_line_height' => '1.5', // no unit
			'paragraph_margin' => '1.5', // em
			'font_top_bar' => 'inherit',
			'font_top_bar_category' => '',
			'font_top_bar_variants' => '',
			'top_bar_font_weight' => 'normal',
			'top_bar_font_transform' => 'none',
			'top_bar_font_size' => '13',
			'font_site_title' => 'Cinzel',
			'font_site_title_category' => 'serif',
			'font_site_title_variants' => '700',
			'site_title_font_weight' => '700',
			'site_title_font_transform' => 'none',
			'site_title_font_size' => '50',
			'mobile_site_title_font_size' => '30',
			'font_site_tagline' => 'Libre Barcode 39 Extended Text',
			'font_site_tagline_category' => 'sans-serif',
			'font_site_tagline_variants' => 'regular',
			'site_tagline_font_weight' => 'normal',
			'site_tagline_font_transform' => 'none',
			'site_tagline_font_size' => '25',
			'font_navigation' => 'Open Sans',
			'font_navigation_category' => 'sans-serif',
			'font_navigation_variants' => '600',
			'navigation_font_weight' => '600',
			'navigation_font_transform' => 'none',
			'navigation_font_size' => '17',
			'font_widget_title' => 'inherit',
			'font_widget_title_category' => '',
			'font_widget_title_variants' => '',
			'widget_title_font_weight' => 'normal',
			'widget_title_font_transform' => 'none',
			'widget_title_font_size' => '20',
			'widget_title_separator' => '30',
			'widget_content_font_size' => '17',
			'font_buttons' => 'inherit',
			'font_buttons_category' => '',
			'font_buttons_variants' => '',
			'buttons_font_weight' => 'normal',
			'buttons_font_transform' => 'none',
			'buttons_font_size' => '',
			'font_heading_1' => 'Cinzel',
			'font_heading_1_category' => 'serif',
			'font_heading_1_variants' => '700',
			'heading_1_weight' => '700',
			'heading_1_transform' => 'none',
			'heading_1_font_size' => '40',
			'heading_1_line_height' => '1.2', // em
			'mobile_heading_1_font_size' => '30',
			'font_heading_2' => 'Cinzel',
			'font_heading_2_category' => 'serif',
			'font_heading_2_variants' => '700',
			'heading_2_weight' => '700',
			'heading_2_transform' => 'none',
			'heading_2_font_size' => '30',
			'heading_2_line_height' => '1.2', // em
			'mobile_heading_2_font_size' => '25',
			'font_heading_3' => 'Cinzel',
			'font_heading_3_category' => 'serif',
			'font_heading_3_variants' => '700',
			'heading_3_weight' => '700',
			'heading_3_transform' => 'none',
			'heading_3_font_size' => '20',
			'heading_3_line_height' => '1.2', // em
			'font_heading_4' => 'Cinzel',
			'font_heading_4_category' => 'serif',
			'font_heading_4_variants' => '700',
			'heading_4_weight' => '700',
			'heading_4_transform' => 'none',
			'heading_4_font_size' => '',
			'heading_4_line_height' => '', // em
			'font_heading_5' => 'Cinzel',
			'font_heading_5_category' => 'serif',
			'font_heading_5_variants' => '700',
			'heading_5_weight' => '700',
			'heading_5_transform' => 'none',
			'heading_5_font_size' => '',
			'heading_5_line_height' => '', // em
			'font_heading_6' => 'Cinzel',
			'font_heading_6_category' => 'serif',
			'font_heading_6_variants' => '700',
			'heading_6_weight' => '700',
			'heading_6_transform' => 'none',
			'heading_6_font_size' => '',
			'heading_6_line_height' => '', // em
			'font_footer' => 'inherit',
			'font_footer_category' => '',
			'font_footer_variants' => '',
			'footer_weight' => 'normal',
			'footer_transform' => 'none',
			'footer_font_size' => '15',
		);

		if ( $filter ) {
			return apply_filters( 'asagi_font_option_defaults', $asagi_font_defaults );
		}

		return $asagi_font_defaults;
	}
}

if ( ! function_exists( 'asagi_spacing_get_defaults' ) ) {
	/**
	 * Set the default options.
	 *
	 *
	 * @param bool $filter Whether to return the filtered values or original values.
	 * @return array Option defaults.
	 */
	function asagi_spacing_get_defaults( $filter = true ) {
		$asagi_spacing_defaults = array(
			'top_bar_top' => '10',
			'top_bar_right' => '10',
			'top_bar_bottom' => '10',
			'top_bar_left' => '10',
			'header_top' => '15',
			'header_right' => '5',
			'header_bottom' => '15',
			'header_left' => '5',
			'menu_item' => '15',
			'menu_item_height' => '45',
			'sub_menu_item_height' => '10',
			'content_top' => '40',
			'content_right' => '40',
			'content_bottom' => '40',
			'content_left' => '40',
			'mobile_content_top' => '30',
			'mobile_content_right' => '30',
			'mobile_content_bottom' => '30',
			'mobile_content_left' => '30',
			'separator' => '15',
			'left_sidebar_width' => '25',
			'right_sidebar_width' => '25',
			'widget_top' => '30',
			'widget_right' => '30',
			'widget_bottom' => '30',
			'widget_left' => '30',
			'footer_widget_container_top' => '30',
			'footer_widget_container_right' => '30',
			'footer_widget_container_bottom' => '30',
			'footer_widget_container_left' => '30',
			'footer_widget_separator' => '30',
			'footer_top' => '20',
			'footer_right' => '20',
			'footer_bottom' => '20',
			'footer_left' => '20',
		);

		if ( $filter ) {
			return apply_filters( 'asagi_spacing_option_defaults', $asagi_spacing_defaults );
		}

		return $asagi_spacing_defaults;
	}
}

if ( ! function_exists( 'asagi_typography_default_fonts' ) ) {
	/**
	 * Set the default system fonts.
	 *
	 */
	function asagi_typography_default_fonts() {
		$fonts = array(
			'inherit',
			'System Stack',
			'Arial, Helvetica, sans-serif',
			'Cinzel',
			'Comic Sans MS',
			'Courier New',
			'Georgia, Times New Roman, Times, serif',
			'Helvetica',
			'Impact',
			'Libre Barcode 39 Extended Text',
			'Playfair Display',
			'Segoe UI, Helvetica Neue, Helvetica, sans-serif',
			'Tahoma, Geneva, sans-serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif'
		);

		return apply_filters( 'asagi_typography_default_fonts', $fonts );
	}
}
