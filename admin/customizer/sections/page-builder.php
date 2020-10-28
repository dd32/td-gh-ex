<?php

/**
 * Define the sections and settings for the style panel
 *
 */
function weaverx_customizer_define_pagebuilder_sections() {
	$panel = 'weaverx_page-builder';
	$pb_sections = array();

	// global settings

	// ---- Header Replace

	$pb_sections['pb-header-replace'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Global Header Area Replacement', 'weaver-xtreme' ),
		'description' => esc_html__( 'Replace Weaver Header Area with Page Builder page.', 'weaver-xtreme' ),
		'options'     => array(

			'pb-hdr1' => weaverx_cz_group_title( __( 'Header Replacement Page', 'weaver-xtreme' ),
				__( 'You can replace the entire Weaver Header area with the content from a page builder page. None of the standard theme header elements except the menu bars will be displayed.  You can also specify a Header Replacement as a Per Page option.', 'weaver-xtreme' ) ),

			'pb_header_hide_menus' => weaverx_cz_checkbox(
				__( 'Hide Weaver Menus', 'weaver-xtreme' ),
				__( 'Check to hide the Weaver Primary Menu normally displayed below the replacement page.', 'weaver-xtreme' )
			),
		),

	);


	if ( defined( 'ELEMENTOR_VERSION' ) ) {                // only provide if elementor is active
		$pb_sections['pb-header-replace']['options']['elementor_header_replacement'] = weaverx_cz_select(
			__( 'Elementor Header Replacement', 'weaver-xtreme' ),
			__( 'Select an Elementor Page or Post to replace the Header Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_elementor_pages', 'none', 'refresh'
		);
	}

	if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {        // only provide if siteorigins is active

		$pb_sections['pb-header-replace']['options']['siteorigin_header_replacement'] = weaverx_cz_select(
			__( 'SiteOrigin Header Replacement', 'weaver-xtreme' ),
			__( 'Select an SiteOrigin Page or Post to replace the Header Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_siteorigin_pages', 'none', 'refresh'
		);
	}

	if ( ! defined( 'ELEMENTOR_VERSION' ) && ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
		$pb_sections['pb-header-replace']['options']['no-pb1'] = weaverx_cz_group_title( __( 'No Page Builder Detected', 'weaver-xtreme' ),
			__( 'Sorry, Weaver can only show a list of page builder pages from Elementor or SiteOrigin Page Builder, but you can still provide a page/post ID. Please install and activate one of those plugins.', 'weaver-xtreme' ) );
	}

	$pb_sections['pb-header-replace']['options']['pb_header_replace_page_id'] = weaverx_cz_textarea(
		__( 'Page or Post ID Header Replacement', 'weaver-xtreme' ),
		__( 'Provide any page or post ID to serve as header replacement. Overrides list selection above. Does not have to be from a page builder.', 'weaver-xtreme' ), 1, '',
		'refresh', '', 'weaverx_cz_sanitize_int' );


	// ---- Footer Replace

	$pb_sections['footer-pb-replace'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Global Footer Area Replacement', 'weaver-xtreme' ),
		'description' => esc_html__( 'Replace Weaver Footer Area with Page Builder page.', 'weaver-xtreme' ),
		'options'     => array(

			'pb-ftr1' => weaverx_cz_group_title( __( 'Footer Replacement', 'weaver-xtreme' ),
				__( 'You can replace the entire Weaver Footer area with the content from a page builder page. None of the standard theme footer elements will be displayed.  You can also specify a Footer Replacement as a Per Page option.', 'weaver-xtreme' ) ),

		),

	);


	if ( defined( 'ELEMENTOR_VERSION' ) ) {                // only provide if elementor is active
		$pb_sections['footer-pb-replace']['options']['elementor_footer_replacement'] = weaverx_cz_select(
			__( 'Elementor Footer Replacement', 'weaver-xtreme' ),
			__( 'Select an Elementor Page or Post to replace the Footer Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_elementor_pages', 'none', 'refresh'
		);
	}

	if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {        // only provide if siteorigins is active

		$pb_sections['footer-pb-replace']['options']['siteorigin_footer_replacement'] = weaverx_cz_select(
			__( 'SiteOrigin Footer Replacement', 'weaver-xtreme' ),
			__( 'Select an SiteOrigin Page or Post to replace the Footer Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_siteorigin_pages', 'none', 'refresh'
		);
	}

	if ( ! defined( 'ELEMENTOR_VERSION' ) && ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
		$pb_sections['footer-pb-replace']['options']['no-pb2'] = weaverx_cz_group_title( __( 'No Page Builder Detected', 'weaver-xtreme' ),
			__( 'Sorry, Weaver can only show a list of page builder pages from Elementor or SiteOrigin Page Builder, but you can still provide a page/post ID. Please install and activate one of those plugins.', 'weaver-xtreme' ) );
	}

	$pb_sections['footer-pb-replace']['options']['pb_footer_replace_page_id'] = weaverx_cz_textarea(
		__( 'Page or Post ID Footer Replacement', 'weaver-xtreme' ),
		__( 'Provide any page or post ID to serve as footer replacement. Overrides list selection above. Does not have to be from a page builder', 'weaver-xtreme' ),
		1, '', 'refresh', false, 'weaverx_cz_sanitize_int' );


	// --- Elementor

	if ( defined( 'ELEMENTOR_VERSION' )  ) {
		$pb_sections['pb-elementor'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Elementor', 'weaver-xtreme' ),
			'description' => esc_html__( 'Weaver theme overrides for Elementor Page Builder.', 'weaver-xtreme' ),
			'options'     => array(

				'pb-title1' => weaverx_cz_group_title( __( 'Elementor Default Colors (Global)', 'weaver-xtreme' ),
					__( 'You can override the Elementor per Page/Post Default Color Palette values ( Primary, Secondary, Text, and Accent ) globally by setting as many of the following color values you wish. These colors will be used for ALL Elementor Pages or Posts, whether or not you have chosen a Color Palette, or have disabled the Default Colors in the Elementor:Settings admin menu. The goal is to allow you to match your Weaver theme settings with your Elementor designs. You do not need to set all four colors. Any you don\'t specify will show the default Elementor color.', 'weaver-xtreme' ) ),

				'elementor_primary_color' => weaverx_cz_color(
					'elementor_primary_color',
					__( 'Elementor Primary Color', 'weaver-xtreme' ),
					__( 'The Primary color is used for Elementor Titles and other elements.', 'weaver-xtreme' ),
					'refresh'
				),

				'elementor_secondary_color' => weaverx_cz_color(
					'elementor_secondary_color',
					__( 'Elementor Secondary Color', 'weaver-xtreme' ),
					__( 'The Secondary color is used in just a few Elementor elements.', 'weaver-xtreme' ),
					'refresh'
				),


				'elementor_text_color' => weaverx_cz_color(
					'elementor_text_color',
					__( 'Elementor Text Color', 'weaver-xtreme' ),
					__( 'The Text color is used as the main text color in most of the Elementor elements.', 'weaver-xtreme' ),
					'refresh'
				),

				'elementor_accent_color' => weaverx_cz_color(
					'elementor_accent_color',
					__( 'Elementor Accent Color', 'weaver-xtreme' ),
					__( 'The Accent color is used as ta highlight color in some Elementor elements such as the TAB element.', 'weaver-xtreme' ),
					'refresh'
				),
			),

		);
	}


	return $pb_sections;
}
