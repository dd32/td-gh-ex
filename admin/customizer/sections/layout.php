<?php

if ( ! function_exists( 'weaverx_customizer_define_layout_sections' ) ) :
/**
 * Define the sections and settings for the Layout panel
 */
function weaverx_customizer_define_layout_sections( $sections ) {
	$panel = 'weaverx_layout';
	$layout_sections = array();

	if (  weaverx_options_level() >= WEAVERX_LEVEL_BEGINNER ) {		// show if advanced, int
	$layout_sections['layout-fullwidth'] = array(
		'panel'   => $panel,
		'title'   => __( 'Site Widths', 'weaver-xtreme' ),
		'description' => __( '<p>Set the overall site width, including expanding the entire content of areas or extending only the BG attributes of areas to the full browser width. Content is responsively displayed.</p><p>By adjusting the width of the individual Header, Container, Content, and Footer areas on the <em>Spacing, Width, Alignment</em> menu, combined with <em>Extend BG Attributes</em>, you can create interesting full width sites. <em>Expand Area</em> options expand the entire content of an area.</p><p> <strong style="color:red;">NOTE: Expand, Extend BG, and Full-width BG Color options <em>DO NOT MIX</em> for a given area (header, container, footer). Do not Expand sub-areas if you Expand the enclosing Area.</strong></p>', 'weaver-xtreme' ),

		'options' => array(

			'fullwidth-expand-swide' => weaverx_cz_group_title( __( 'Site Width', 'weaver-xtreme' ),
			__('You can set the site width of you core content, or make the entire site full browser width.','weaver-xtreme')),

			'theme_width_int'     => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh',
					'default' => WEAVERX_THEME_WIDTH
				),

				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Theme Width (px)', 'weaver-xtreme' ). WEAVERX_REFRESH_ICON,
					'description' => __("Set the maximum width of site's content. This theme cannot create a fixed-width site.", 'weaver-xtreme'),
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 770,
						'max'  => 3200,
						'step' => 10,
					),
				),
			),

			'wrapper_fullwidth'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Display Entire Site Full Width', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Checking this option will display the <strong>ENTIRE SITE</strong> in the full width of the browser. This option overrides the <em>Site Width</em> option.', 'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

/* ------------------------ FULL WIDTH HEADER ----------------------- */

			'fullwidth-expand-header' => weaverx_cz_group_title( __( 'Full Width Site Header Area', 'weaver-xtreme' ),
				__('The Header Area contains the Menus, the Header Widget Area, the Site Image, and the Header HTML Area.',	'weaver-xtreme')),

			'expand_header'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header Expand Area', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Checking this option will automatically include the other Header Area Expand options as well.', 'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),
			'header_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'header_extend_bgcolor'   => array(
				'setting' => array(
					'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
					'default' => weaverx_cz_getopt('header_extend_bgcolor'),
					'transport' => 'refresh' // can't do the #container:before required
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_COLOR_CONTROL,
					'label'        => __( 'Header Full-width BG Color', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'  => __( 'Extend this BG color to full theme width. You can use only one of the "Attributes" vs. "Color" option.', 'weaver-xtreme' ),
				),
			),

			'expand_header-image'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header Image Expand Area', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Also consider using the <em>Spacing, Widths, Alignment -> Header Area -> Move Title/Tagline over Image</em> option to create an attractive header.', 'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'expand_site_title'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Site Title/Tagline Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('This option includes the Site Title, Tagline, Search Button, and MiniMenu.','weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'expand_header-widget-area'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header Widget Area Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'header_sb_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header Widget Area Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

			'expand_header-html'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header HTML Area Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'header_html_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header HTML Area Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

/* ------------------------ FULL WIDTH MENUS ----------------------- */

		'fullwidth-expand-menusm' => weaverx_cz_group_title( __( 'Full Width Menus', 'weaver-xtreme' ),
				__('Expand the primary and secondary menus to full width.',	'weaver-xtreme')),

			'expand_m_primary'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Primary Menu Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'm_primary_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Primary Menu Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),


			'expand_m_secondary'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Secondary Menu Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'm_secondary_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Secondary Menu Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

			'm_primary_extend_bgcolor'   => array(
				'setting' => array(
					'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
					'default' => weaverx_cz_getopt('m_primary_extend_bgcolor'),
					'transport' => 'refresh' // can't do the #container:before required
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_COLOR_CONTROL,
					'label'        => __( 'Primary Menu Full-width BG color', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
				),
			),

			'm_secondary_extend_bgcolor'   => array(
				'setting' => array(
					'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
					'default' => weaverx_cz_getopt('m_secondary_extend_bgcolor'),
					'transport' => 'refresh' // can't do the #container:before required
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_COLOR_CONTROL,
					'label'        => __( 'Secondary Menu Full-width BG color', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
				),
			),




/* ------------------------ FULL WIDTH CONTENT ----------------------- */

			'fullwidth-expand-content' => weaverx_cz_group_title( __( 'Full Width Content Area', 'weaver-xtreme' ),
				__('The Content Area contains page content, as well as posts.',	'weaver-xtreme')),


			'expand_container'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Container Expand Area', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('The container wraps the Info Bar, the content, and widget areas.','weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),
			'container_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Container Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
				'type'  => 'checkbox',
				),
			),
			'container_extend_bgcolor'   => array(
				'setting' => array(
					'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
					'default' => weaverx_cz_getopt('container_extend_bgcolor'),
					'transport' => 'refresh' // can't do the #container:before required
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_COLOR_CONTROL,
					'label'        => __( 'Container Full-width BG color', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
				),
			),



			'expand_infobar'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Info Bar Expand to Full Width', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('The Info Bar contains the breadcrumbs and page links.', 'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'infobar_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Info Bar Extend BG', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

			/*'content_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Content Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			), *.
			'content_extend_bgcolor'   => array(
				'setting' => array(
					'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
					'default' => weaverx_cz_getopt('content_extend_bgcolor'),
					'transport' => 'refresh' // can't do the #container:before required
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_COLOR_CONTROL,
					'label'        => __( 'Content Full-width BG color', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
				),
			), */

			'post_expand'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Posts Expand to Full Width', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

			'post_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Posts Extend BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Most useful with FI as BG images', 'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),


/* ------------------------ FULL WIDTH FOOTER ----------------------- */

			'fullwidth-expand-footer' => weaverx_cz_group_title( __( 'Full Width Footer Area', 'weaver-xtreme' ),
				__('The Footer Area contains the Footer Widget Area, the Footer HTML Area, the copyright line.', 'weaver-xtreme')),


			'expand_footer'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Footer Expand Area', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Checking this option will automatically include the other Footer Area Expand options as well.', 'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),
			'footer_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Extend Footer BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'footer_extend_bgcolor'   => array(
				'setting' => array(
					'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
					'default' => weaverx_cz_getopt('footer_extend_bgcolor'),
					'transport' => 'refresh' // can't do the #container:before required
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_COLOR_CONTROL,
					'label'        => __( 'Footer Full-width BG color', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'  => __( 'Extend this BG color to full theme width on Desktop View.', 'weaver-xtreme' ),
				),
			),


			'expand_footer_sb'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Footer Widget Area Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,

					'type'  => 'checkbox',
				),
			),
			'footer_sb_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Extend Footer Widget Area BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

			'expand_footer_html'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Footer HTML Area Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'footer_html_extend_width'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Extend Footer HTML Area BG Attributes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

			'expand_site-ig-wrap'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Footer Copyright Area Expand', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),

		),
	);

}


	/**
	 * Site Header
	 */
if (  weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {		// show if advanced, int
	$layout_sections['layout-header'] = array(
		'panel'   => $panel,
		'title'   => __( 'Header Area', 'weaver-xtreme' ),
		'options' => array(

			'layout-heading-wheader' => weaverx_cz_group_title( __( 'Header Widget Area', 'weaver-xtreme' )),

			'header_sb_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Header Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),

			'layout-header-custom-widths' => weaverx_cz_heading( __( 'Header Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )),

			'_header_sb_lw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Header Desktop Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
					'input_attrs' => array(
						'placeholder'  => __('25,25,50; 60,40; - for example', 'weaver-xtreme')
					),
				),
			),
			'_header_sb_mw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Header Small Tablet Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),
			'_header_sb_sw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Header Phone Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),

			'header_sb_position'=> array(
				'setting' => array(
					'transport' => 'refresh',
					'default' => 'top',
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_SELECT_CONTROL,
					'label' => __( 'Header Widget Area Position', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __( 'Change where Header Widget Area is displayed within the Header Area. You can move it to one of seven positions in the Header.', 'weaver-xtreme' ),
					'type'	=> 'select',
					'choices' =>array(
						'top' => __('Top of Header', 'weaver-xtreme' /*adm*/),
						'before_header' => __('Before Header Image', 'weaver-xtreme' /*adm*/) ,
						'after_header' => __('After Header Image', 'weaver-xtreme' /*adm*/) ,
						'after_html' => __('After HTML Block', 'weaver-xtreme' /*adm*/) ,
						'after_menu' => __('After Lower Menu', 'weaver-xtreme' /*adm*/) ,
						'pre_header' => __('Pre-#header &lt;div&gt;', 'weaver-xtreme' /*adm*/),
						'post_header' => __('Post-#header &lt;div&gt;', 'weaver-xtreme' /*adm*/),

					),
				),
			),

			'header_sb_fixedtop'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Fixed-Top Header Widget Area', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Fix entire Header area to top of page. You may set the Header Bottom Margin for more space under the menu. Use the Extend BG Attributes to make a full width header.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'hdr_sb_l1' => weaverx_cz_line(),

			'header_sb_no_widget_margins'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Header No Smart Widget Margins', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Do not use "smart margins" between  multi-column widgets on rows.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'header_sb_eq_widgets'=> array(
				'setting' => array(
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Header Equal Height Widget Rows', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('Make widgets equal height rows if &gt; 1 column.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),



		),
	);


	/**
	 * Main Menu
	 */
	$layout_sections['layout-menus'] = array(
		'panel'   => $panel,
		'title'   => __( 'Menus', 'weaver-xtreme' ),
		'description' => __( 'Set layout for Menus.', 'weaver-xtreme' ),
		'options' => array(
			'layout-primary-heading' => weaverx_cz_group_title( __( 'Layout For Primary Menu', 'weaver-xtreme' )),


			'm_primary_fixedtop'=> weaverx_cz_select(	// must be refresh because column class applied to specific page id
				__( 'Fixed-Top Primary Menu', 'weaver-xtreme' ) ,
				__( 'Fix the Primary Menu to top of page.  Use the Expand/Extend BG Attributes to make a full width menu.', 'weaver-xtreme' ),
				'weaverx_cz_choices_fixed_menu','none', 'refresh'
			),

			'm_primary_move' => array(
				'setting' => array(
					'transport' => 'refresh',
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Move Primary Menu to Top', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __( 'Move Primary Menu at Top of Header Area. This is not the same as a Fixed-Top Menu (Default: Bottom)', 'weaver-xtreme' ),
					'type'	=> 'checkbox'
				),
			),

			'layout-secondary-heading' => weaverx_cz_group_title( __( 'Layout For Secondary', 'weaver-xtreme' )),

			'm_secondary_fixedtop'=> weaverx_cz_select(	// must be refresh because column class applied to specific page id
				__( 'Fixed-Top Secondary Menu', 'weaver-xtreme' ) ,
				__( 'Fix the Secondary Menu to top of page.  Use the Expand/Extend BG Attributes to make a full width menu.', 'weaver-xtreme' ),
				'weaverx_cz_choices_fixed_menu','none', 'refresh'
			),

			'm_secondary_move' => array(
				'setting' => array(
					'transport' => 'refresh',
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Move Secondary Menu to Bottom', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __( 'Move Secondary Menu at Bottom of Header Area (Default: Top)', 'weaver-xtreme' ),
					'type'	=> 'checkbox'
				),
			),


			'layout-allmenus-heading' => weaverx_cz_group_title( __( 'Layout For All Menus', 'weaver-xtreme' ),
				__('These options that apply to all menus.', 'weaver-xtreme')),

			'use_smartmenus' => array(
				'setting' => array(
					'transport' => 'refresh',
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Use SmartMenus', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __( 'Use <em>SmartMenus</em> rather than default Weaver Xtreme Menus. <em>SmartMenus</em> provide enhanced menu support, including auto-visibility, and transition effects. Applies to all menus. There are additional <em>Smart Menu</em> options available on the <em>Appearance &rarr; +Xtreme Plus</em> menu. Those options are not currently available on the Customizer Menu, but will be eventually.', 'weaver-xtreme' ),
					'type'	=> 'checkbox'
				),
			),

			'mobile_alt_switch'     => array(
				'setting' => array(	'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 767	),
				'control' => array(
					'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
					'label'   => __( 'Menu Mobile/Desktop Switch Point (px)', 'weaver-xtreme' ). WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('<em>SmartMenus Only:</em> Set when menu bars switch from desktop to mobile. (Default: 767px. Hint: use 768 to force mobile menu on iPad portrait.)', 'weaver-xtreme'),
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 300,
						'max'  =>  1200,
						'step' => 1,
					),
				),
			),

		),
	);

	$smart_options = array (

	);

	/**
	 * Info Bar
	 */
	$layout_sections['layout-info-bar'] = array(
		'panel'   => $panel,
		'title'   => __( 'Info Bar', 'weaver-xtreme' ),
		'description' => __('Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme'),
		'options' => array(

		),
	);

	/**
	 * Content
	 */
	$layout_sections['layout-content'] = array(
		'panel'   => $panel,
		'title'   => __( 'Content', 'weaver-xtreme' ),
		'description' => __('Layout for general page and post content.', 'weaver-xtreme'),
		'options' => array(

			'page_cols' => weaverx_cz_select(	// must be refresh because column class applied to specific page id
				__( 'Content Columns', 'weaver-xtreme' ) ,
				__( 'Automatically split all page content into columns. You can also use the Per Page option. This option does not apply to posts. (Content will displayed as 1 column on IE&lt;=9.)', 'weaver-xtreme' ),
				'weaverx_cz_choices_columns',	'1', 'refresh'
			),



			'hyphenate' => array(
				'setting' => array(
					'transport' => 'refresh',
				),
				'control' => array(

					'label' => __( 'Auto Hyphenate Content', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Allow browsers to automatically hyphenate text for appearance.', 'weaver-xtreme' ),
					'type'	=> 'checkbox'
				),
			),
		),
	);

	/**
	 * Post Specific
	 */
	$layout_sections['layout-post-specific'] = array(
		'panel'   => $panel,
		'title'   => __( 'Post Specific', 'weaver-xtreme' ),
		'description' => __('Post Specific layout - override Content layout.', 'weaver-xtreme'),
		'options' => array(


			'post_cols' => weaverx_cz_select(	// must be refresh because column class applied to specific page id
				__( 'Post Content Columns', 'weaver-xtreme' ) ,
				__( 'Automatically split all post content into columns for both blog and single page views. <em>This is post content only.</em> This is not the same as "Columns of Posts". (Always 1 column on IE&lt;=9.)', 'weaver-xtreme' ),
				'weaverx_cz_choices_columns',	'1', 'refresh'
			),

			'blog_cols' => weaverx_cz_select(
				__( 'Columns of Posts', 'weaver-xtreme' ),
				__( 'Display posts on blog page with this many columns. <em>Hint:</em> Adjust "Blog pages show at most n posts" on Settings:Reading to be a multiple of columns.', 'weaver-xtreme' ),
				'weaverx_cz_choices_post_columns',	'1', 'refresh'
			),

			'masonry_cols' => weaverx_cz_select(
				__( 'Use Masonry for Posts', 'weaver-xtreme' ),
				__( 'Use the <em>Masonry</em> blog layout option to show dynamically packed posts on blog and archive-like pages. Overrides "Columns of Posts" setting. <em>Not compatible with full width FI BG images.</em>', 'weaver-xtreme' ),
				'weaverx_cz_choices_masonry_columns',	'0', 'refresh'
			),



			'archive_cols' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Use Columns on Archive Pages', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Display posts on archive-like pages using columns. (Archive, Author, Category, Tag)', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),

			'blog_first_one' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'First Post One Column', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Display the first post in one column.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),

			'blog_sticky_one' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Sticky Posts One Column', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Display opening Sticky Posts in one column. If First Post One Column also checked, then first non-sticky post will also be one column.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),

			'compact_post_formats' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Compact "Post Format" Posts', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Use compact layout for <em>Post Format</em> posts (Image, Gallery, Video, etc.). Useful for photo blogs and multi-column layouts. Looks great with <em>Masonry</em>.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),




			'layout-post-line1' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'type'  => 'line'
				)
			),

			'reset_content_opts' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Clear Major Content Options', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( '<em>ADVANCED OPTION!</em> Clear wrapping Content Area bg, borders, padding, and top/bottom margins for views with posts. Allows more flexible post styling. Most people will not need this.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),
			'layout-post-line2' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'type'  => 'line'
				)
			),

			'layout-post-excerpt' => weaverx_cz_group_title( __( 'Excerpts / Full Posts', 'weaver-xtreme' ),
				__( 'How to display posts in Blog and Archive views.', 'weaver-xtreme' )),

			'fullpost_blog' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Show Full Blog Posts', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Will display full blog post instead of excerpts on <em>blog pages</em>. Does not override manually added &lt;--more--> breaks.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),

			'fullpost_archive' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Full Post for Archives', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'fullpost_search' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'label' => __( 'Full Post for Searches', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'checkbox',
				),
			),
			'excerpt_length'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 40
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Excerpt length', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __( 'Change post excerpt length.', 'weaver-xtreme' ),
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 2,
						'max'  => 100,
						'step' => 1,
					),
				),
			),


			'layout-post-nav' => weaverx_cz_group_title( __( 'Post Navigation', 'weaver-xtreme' ),
				__( 'Navigation for moving between Posts.', 'weaver-xtreme' )),

			'nav_style' => weaverx_cz_select(
				__( 'Blog Navigation Style', 'weaver-xtreme' ),
				__( 'Style of navigation links on blog pages: "Older/Newer posts", "Previous/Next Post", or by page numbers.', 'weaver-xtreme' ),
				'weaverx_cz_choices_nav_style',	'old_new', 'refresh'
			),


			'nav_hide_above' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Hide Top Nav Links', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON. WEAVERX_REFRESH_ICON,
					'description' => __( 'Hide the blog navigation links at the top.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),
			'nav_hide_below' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Hide Bottom Nav Links', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON. WEAVERX_REFRESH_ICON,
					'description' => __( 'Hide the blog navigation links at the bottom.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),
			'nav_show_first' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Show Top Nav on First Page', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON. WEAVERX_REFRESH_ICON,
					'description' => __( 'Show navigation at top even on the first page.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),

			'single_nav_style' => weaverx_cz_select(
				__( 'Single Page Navigation Style', 'weaver-xtreme' ),
				__( 'Style of navigation links on post Single pages: Previous/Next, by title, or none.', 'weaver-xtreme' ),
				'weaverx_cz_choices_single_nav_style',	'title', 'refresh'
			),

			'single_nav_link_cats' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Nav Links to Same Categories', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON. WEAVERX_REFRESH_ICON,
					'description' => __( 'Single Page navigation links point to posts with same categories.', 'weaver-xtreme' ) ,
					'type'  => 'checkbox',
				),
			),
			'single_nav_hide_above' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Hide Top Nav Links', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON. WEAVERX_REFRESH_ICON,
					'description' => __( 'Hide the single page navigation links at the top.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),
			'single_nav_hide_below' => array(
				'setting' => array(
					'sanitize_callback' => 'weaverx_cz_sanitize_int',
					'transport' => 'refresh'
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Hide Bottom Nav Links', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON. WEAVERX_REFRESH_ICON,
					'description' => __( 'Hide the single page navigation links at the bottom.', 'weaver-xtreme' ),
					'type'  => 'checkbox',
				),
			),





		),
	);


	/**
	 * Sidebars
	 */
	$layout_sections['layout-sidebars'] = array(
		'panel'   => $panel,
		'title'   => __( 'Sidebars & Widget Areas', 'weaver-xtreme' ),
		'description' => __('Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels. Note: General Sidebar Layout for different page types is shown first. Layout options for specific Widget Areas (Primary, Secondary, Top, Bottom) are shown after that, so scroll down!', 'weaver-xtreme'),
		'options' => array(
			'layout-primary-all-heading' => weaverx_cz_group_title( __( 'Sidebar Layout for Page Types', 'weaver-xtreme' ),
				__( 'Sidebar Layout for each type of page ("stack top" used for mobile view).', 'weaver-xtreme' )),

			'layout_default' => weaverx_cz_select(
				__( 'Blog, Post, Page Default', 'weaver-xtreme' ),
				__( 'Select the default theme layout for blog, single post, attachments, and pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout',	'right', 'refresh'
			),


			'layout_default_archive' => weaverx_cz_select(
				__( 'Archive-like Default', 'weaver-xtreme' ),
				__( 'Select the default theme layout for all other pages - archives, search, etc.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout',	'right', 'refresh'
			),

			'layout_page' => weaverx_cz_select(
				__( 'Page', 'weaver-xtreme' ),
				__( 'Layout for normal Pages on your site.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_blog' => weaverx_cz_select(
				__( 'Blog', 'weaver-xtreme' ),
				__( 'Layout for main blog page. Includes "Page with Posts" Page templates.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_single' => weaverx_cz_select(
				__( 'Post Single Page', 'weaver-xtreme' ),
				__( 'Layout for Posts displayed as a single page.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_attachments' => weaverx_cz_select_plus(
				__( 'Attachments', 'weaver-xtreme' ),
				__( 'Layout for attachment pages such as images.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_archive' => weaverx_cz_select_plus(
				__( 'Date Archive', 'weaver-xtreme' ),
				__( 'Layout for archive by date pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_category' => weaverx_cz_select_plus(
				__( 'Category Archive', 'weaver-xtreme' ),
				__( 'Layout for category archive pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_tag' => weaverx_cz_select_plus(
				__( 'Tags Archive', 'weaver-xtreme' ),
				__( 'Layout for tag archive pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_author' => weaverx_cz_select_plus(
				__( 'Author Archive', 'weaver-xtreme' ),
				__( 'Layout for author archive pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_search' => weaverx_cz_select_plus(
				__( 'Search Results, 404', 'weaver-xtreme' ),
				__( 'Layout for search results and 404 pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),


			'layout-sb-line1' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'type'  => 'line'
				)
			),

			'layout-primary-widget-heading' => weaverx_cz_group_title( __( 'Primary Widget Area', 'weaver-xtreme' )),

			'primary_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),

			'layout-primary-custom-widths' => weaverx_cz_heading( __( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )),

			'_primary_lw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Desktop Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
					'input_attrs' => array(
						'placeholder'  => __('25,25,50; 60,40; - for example', 'weaver-xtreme')
					),
				),
			),
			'_primary_mw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Small Tablet Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),
			'_primary_sw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Phone Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),


			'primary_no_widget_margins'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'No Smart Widget Margins', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Do not use "smart margins" between  multi-column widgets on rows.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'primary_eq_widgets'=> array(
				'setting' => array(
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Equal Height Widget Rows', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('Make widgets equal height rows if &gt; 1 column.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),





			'layout-secondary-widget-heading' => weaverx_cz_group_title( __( 'Secondary Widget Area', 'weaver-xtreme' )),

			'secondary_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),
			'layout-secondary-custom-widths' => weaverx_cz_heading( __( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )),

			'_secondary_lw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Desktop Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
					'input_attrs' => array(
						'placeholder'  => __('25,25,50; 60,40; - for example', 'weaver-xtreme')
					),
				),
			),
			'_secondary_mw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Small Tablet Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),
			'_secondary_sw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Phone Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),


			'secondary_no_widget_margins'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'No Smart Widget Margins', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Do not use "smart margins" between multi-column widgets on rows.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'secondary_eq_widgets'=> array(
				'setting' => array(
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Equal Height Widget Rows', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('Make widgets equal height rows if &gt; 1 column.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),



			'layout-top-widget-heading' => weaverx_cz_group_title( __( 'Top Widget Areas', 'weaver-xtreme' ),
				__('Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme')),

			'top_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),

			'layout-top-custom-widths' => weaverx_cz_heading( __( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )),

			'_top_lw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Desktop Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
					'input_attrs' => array(
						'placeholder'  => __('25,25,50; 60,40; - for example', 'weaver-xtreme')
					),
				),
			),
			'_top_mw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Small Tablet Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),
			'_top_sw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Phone Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),

			'top_no_widget_margins'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'No Smart Widget Margins', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Do not use "smart margins" between multi-column widgets on rows.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),
			'top_eq_widgets'=> array(
				'setting' => array(
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Equal Height Widget Rows', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('Make widgets equal height rows if &gt; 1 column.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),



			'layout-bottom-widget-heading' => weaverx_cz_group_title( __( 'Bottom Widget Areas', 'weaver-xtreme' ),
				__('Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme')),

			'bottom_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),

			'layout-bottom-custom-widths' => weaverx_cz_heading( __( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )),

			'_bottom_lw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Desktop Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
					'input_attrs' => array(
						'placeholder'  => __('25,25,50; 60,40; - for example', 'weaver-xtreme')
					),
				),
			),
			'_bottom_mw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Small Tablet Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),
			'_bottom_sw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Phone Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),


			'bottom_no_widget_margins'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'No Smart Widget Margins', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Do not use "smart margins" between multi-column widgets on rows.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),

			'bottom_sb_eq_widgets'=> array(
				'setting' => array(
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Equal Height Widget Rows', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('Make widgets equal height rows if &gt; 1 column.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),


		),
	);

	/**
	 * Widgets
	 */
	$layout_sections['layout-widgets'] = array(
		'panel'   => $panel,
		'title'   => __( 'Individual Widgets', 'weaver-xtreme' ),
		'options' => array(

		),
	);


	/**
	 * Footer
	 */
	$layout_sections['layout-footer'] = array(
		'panel'   => $panel,
		'title'   => __( 'Footer Area', 'weaver-xtreme' ),
		'options' => array(

			'footer_sb_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Footer Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),

			'layout-footer-custom-widths' => weaverx_cz_heading( __( 'Footer Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )),

			'_footer_sb_lw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Footer Desktop Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
					'input_attrs' => array(
						'placeholder'  => __('25,25,50; 60,40; - for example', 'weaver-xtreme')
					),
				),
			),
			'_footer_sb_mw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Footer Small Tablet Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),
			'_footer_sb_sw_cols_list' => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_text', 'transport' => 'refresh',	'default' => '' ),
				'control' => array(
					'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
					'label'   => __( 'Footer Phone Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description'   => __( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
					'type'  => 'text',
				),
			),

			'footer_sb_no_widget_margins'=> array(
				'setting' => array(
				),
				'control' => array(
					'label' => __( 'Footer No Smart Widget Margins', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => __('Do not use "smart margins" between  multi-column widgets on rows.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),
			'footer_sb_eq_widgets'=> array(
				'setting' => array(
				),
				'control' => array(
					'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
					'label' => __( 'Footer Equal Height Widget Rows', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
					'description' => __('Make widgets equal height rows if &gt; 1 column.',
										'weaver-xtreme'),
					'type'  => 'checkbox',
				),
			),




		),
	);
} else {
	$layout_sections['layout-header'] = array(
		'panel'   => $panel,
		'title'   => __( 'Header Area', 'weaver-xtreme' ),
		'options' => array(
			'layout-heading-header' => weaverx_cz_heading( __( 'Site Header', 'weaver-xtreme' )),

			'header_sb_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Header Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),
			)
		);

	$layout_sections['layout-sidebars'] = array(
		'panel'   => $panel,
		'title'   => __( 'Sidebars & Widget Areas', 'weaver-xtreme' ),
		'description' => __('Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels. Note: General Sidebar Layout for different page types is shown first. Layout options for specific Widget Areas (Primary, Secondary, Top, Bottom) are shown after that, so scroll down!', 'weaver-xtreme'),
		'options' => array(
			'layout-primary-all-heading' => weaverx_cz_group_title( __( 'Sidebar Layout for Page Types', 'weaver-xtreme' ),
				__( 'Sidebar Layout for each type of page ("stack top" used for mobile view).', 'weaver-xtreme' )),

			'layout_default' => weaverx_cz_select(
				__( 'Blog, Post, Page Default', 'weaver-xtreme' ),
				__( 'Select the default theme layout for blog, single post, attachments, and pages.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout',	'right', 'refresh'
			),


			'layout_default_archive' => weaverx_cz_select(
				__( 'Archive-like Default', 'weaver-xtreme' ),
				__( 'Select the default theme layout for all other pages - archives, search, etc.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout',	'right', 'refresh'
			),

			'layout_page' => weaverx_cz_select(
				__( 'Page', 'weaver-xtreme' ),
				__( 'Layout for normal Pages on your site.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_blog' => weaverx_cz_select(
				__( 'Blog', 'weaver-xtreme' ),
				__( 'Layout for main blog page. Includes "Page with Posts" Page templates.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),

			'layout_single' => weaverx_cz_select(
				__( 'Post Single Page', 'weaver-xtreme' ),
				__( 'Layout for Posts displayed as a single page.', 'weaver-xtreme' ),
				'weaverx_cz_choices_sb_layout_default',	'default', 'refresh'
			),
		)
	);


	$layout_sections['layout-footer'] = array(
		'panel'   => $panel,
		'title'   => __( 'Footer Area', 'weaver-xtreme' ),
		'options' => array(

			'footer_sb_cols_int'     => array(
				'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh',	'default' => 1
				),
				'control' => array(
					'control_type' => 'WeaverX_Range_Control',
					'label'   => __( 'Footer Columns of Widgets', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'type'  => 'range',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					),
				),
			),
		)
	);

}

	/**
	 * Filter the definitions for the controls in the Color Scheme panel of the Customizer.
	 *
	 * @since 1.3.0.
	 *
	 * @param array    $layout_sections    The array of definitions.
	 */
	$layout_sections = apply_filters( 'weaverx_customizer_layout_sections', $layout_sections );

	// Merge with master array
	return array_merge( $sections, $layout_sections );


}
endif;

add_filter( 'weaverx_customizer_sections', 'weaverx_customizer_define_layout_sections' );
