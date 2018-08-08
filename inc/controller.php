<?php
/**
 * Customizer data
 *
 * Theme Customizer's sections and control field data.
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Set theme customizer panels.
 *
 * @since 1.0.0
 *
 * @param  array $panels Array of theme customizer panels.
 * @return array Returns array of theme customizer panels.
 */
function aamla_get_theme_panels( $panels = [] ) {
	return array_merge( $panels,
		[
			'aamla_theme_panel' =>
			[
				'title'       => esc_html__( 'Theme Options', 'aamla' ),
				'priority'    => 6,
				'description' => esc_html__( 'Theme options to customize your site.', 'aamla' ),
			],
		]
	);
}
add_filter( 'aamla_theme_panels', 'aamla_get_theme_panels' );

/**
 * Set theme customizer sections.
 *
 * @since 1.0.0
 *
 * @param  array $sections array of theme customizer sections.
 * @return array Returns array of theme customizer sections.
 */
function aamla_get_theme_sections( $sections = [] ) {
	return array_merge( $sections,
		[
			'aamla_general_section' =>
			[
				'title' => esc_html__( 'General Settings', 'aamla' ),
				'panel' => 'aamla_theme_panel',
			],
			'aamla_contact_section' =>
			[
				'title' => esc_html__( 'Contact Information', 'aamla' ),
				'panel' => 'aamla_theme_panel',
			],
		]
	);
}
add_filter( 'aamla_theme_sections', 'aamla_get_theme_sections' );

/**
 * Set theme customizer controls and settings.
 *
 * @since 1.0.0
 *
 * @param  array $controls array of theme controls and settings.
 * @return array Returns array of theme controls and settings.
 */
function aamla_get_theme_controls( $controls = [] ) {
	return array_merge( $controls,
		[
			[
				'label'   => esc_html__( 'Display Site Title', 'aamla' ),
				'section' => 'title_tagline',
				'setting' => 'aamla_display_site_title',
				'type'    => 'checkbox',
			],
			[
				'label'    => esc_html__( 'Display Tagline', 'aamla' ),
				'section'  => 'title_tagline',
				'setting'  => 'aamla_display_site_desc',
				'type'     => 'checkbox',
				'priority' => 20,
			],
			[
				'label'   => esc_html__( 'Archive Sidebar Layout', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_archive_sidebar_layout',
				'type'    => 'select',
				'choices' => [
					'sidebar-left'  => esc_html__( 'Sidebar-Content', 'aamla' ),
					'sidebar-right' => esc_html__( 'Content-Sidebar', 'aamla' ),
					'no-sidebar'    => esc_html__( 'Only Content - No Sidebar', 'aamla' ),
				],
			],
			[
				'label'   => esc_html__( 'Page Sidebar Layout', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_page_sidebar_layout',
				'type'    => 'select',
				'choices' => [
					'sidebar-left'  => esc_html__( 'Sidebar-Content', 'aamla' ),
					'sidebar-right' => esc_html__( 'Content-Sidebar', 'aamla' ),
				],
			],
			[
				'label'   => esc_html__( 'Post Sidebar Layout', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_post_sidebar_layout',
				'type'    => 'select',
				'choices' => [
					'sidebar-left'  => esc_html__( 'Sidebar-Content', 'aamla' ),
					'sidebar-right' => esc_html__( 'Content-Sidebar', 'aamla' ),
				],
			],
			[
				'label'       => esc_html__( 'Index/Blog page layout', 'aamla' ),
				'section'     => 'aamla_general_section',
				'setting'     => 'aamla_index_layout',
				'type'        => 'select',
				'choices'     => [
					'list' => esc_html__( 'List View', 'aamla' ),
					'grid' => esc_html__( 'Responsive Grid View', 'aamla' ),
				],
				'description' => esc_html__( 'Posts on search page will always be displayed in list view as it is quick to scan.', 'aamla' ),
			],
			[
				'label'       => esc_html__( 'Footer Text', 'aamla' ),
				'section'     => 'aamla_general_section',
				'setting'     => 'aamla_footer_text',
				'type'        => 'text',
				'description' => esc_html__( 'Change footer copyright & credit text at the bottom of your site.', 'aamla' ) . ' ' . esc_html__( 'For Site Title, Use ', 'aamla' ) . '[site_title]. ' . esc_html__( 'For Copyright symbol, Use ', 'aamla' ) . '[copy_symbol]. ' . esc_html__( 'For Current Year, Use ', 'aamla' ) . '[current_year]',
			],
			[
				'label'   => esc_html__( 'Show Primary Navigation', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_primary_nav',
				'type'    => 'checkbox',
			],
			[
				'label'   => esc_html__( 'Show Header Search', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_header_search',
				'type'    => 'checkbox',
			],
			[
				'label'   => esc_html__( 'Show Thumbnail Placeholder', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_thumbnail_placeholder',
				'type'    => 'checkbox',
			],
			[
				'label'   => esc_html__( 'Show Thumbnail on Single Post', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_thumbnail_on_single',
				'type'    => 'checkbox',
			],
			[
				'label'   => esc_html__( 'Show Print Post Icon', 'aamla' ),
				'section' => 'aamla_general_section',
				'setting' => 'aamla_print_post_icon',
				'type'    => 'checkbox',
			],
			[
				'label'       => esc_html__( 'Your Mobile/Telephone Number', 'aamla' ),
				'section'     => 'aamla_contact_section',
				'setting'     => 'aamla_tel_number',
				'type'        => 'tel',
				'description' => esc_html__( 'Number will be visible at the top of your site.', 'aamla' ),
			],
			[
				'label'       => esc_html__( 'Your Email ID', 'aamla' ),
				'section'     => 'aamla_contact_section',
				'setting'     => 'aamla_email_id',
				'type'        => 'email',
				'description' => esc_html__( 'Email will be visible at the top of your site.', 'aamla' ),
			],
			[
				'label'       => esc_html__( 'Hide Social icons from contact bar', 'aamla' ),
				'section'     => 'aamla_contact_section',
				'setting'     => 'aamla_hide_social_icons_on_contact_bar',
				'type'        => 'checkbox',
				'description' => esc_html__( 'If any social menu is defined, hide it from top Contact Information bar.', 'aamla' ),
			],
		]
	);
}
add_filter( 'aamla_theme_controls', 'aamla_get_theme_controls' );

/**
 * Set default values for theme customization options.
 *
 * @since 1.0.0
 *
 * @param  array $defaults Array of customizer option default values.
 * @return array Returns Array of customizer option default values.
 */
function aamla_get_theme_defaults( $defaults = [] ) {
	return array_merge( $defaults, [
		'aamla_display_site_title'     => 1,
		'aamla_display_site_desc'      => 1,
		'aamla_index_post_layout'      => 'list-view',
		'aamla_archive_sidebar_layout' => 'sidebar-right',
		'aamla_page_sidebar_layout'    => 'sidebar-right',
		'aamla_post_sidebar_layout'    => 'sidebar-right',
		'aamla_index_layout'           => 'list',
		'aamla_primary_nav'            => 1,
		'aamla_header_search'          => 1,
		'aamla_thumbnail_placeholder'  => 1,
		'aamla_thumbnail_on_single'    => 1,
		'aamla_print_post_icon'        => 1,
		'aamla_footer_text'            => '[site_title] [copy_symbol] [current_year] &middot; ' . esc_html__( 'All rights reserved', 'aamla' ), // Note: Translation friendly instructions for using footer text placeholders has been given in customizer control description.
	] );
}
add_filter( 'aamla_theme_defaults', 'aamla_get_theme_defaults' );
