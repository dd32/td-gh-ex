<?php
/**
 * Azauthority Customize Options
 * 
 * @package Az_Authority
 */

/**
 * Default Sections
 * 
 * @return array
 */
function azauthority_get_default_sections( $plugin_token ) {

	$panel_id = $plugin_token . '_panel_id';
	$prefix = $plugin_token . '_section_';

	$sections = apply_filters( $plugin_token . '_default_sections', array (

		$prefix . 'featured'	=> array(
			'title'			=> __( 'Featured Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 5,
		),

		$prefix . 'homepage'	=> array(
			'title'			=> __( 'Homepage Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 10,
		),

		$prefix . 'general'	=> array(
			'title'			=> __( 'General Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 15,
		),

		$prefix . 'header'	=> array(
			'title'			=> __( 'Header Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 30,
		),

		$prefix . 'single'	=> array(
			'title'			=> __( 'Single Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 40,
		),

		$prefix . 'style'	=> array(
			'title'			=> __( 'Style Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 50,
		),

		$prefix . 'footer'	=> array(
			'title'			=> __( 'Footer Settings', 'azauthority' ),
			'panel'			=> $panel_id,
			'priority'		=> 60,
		),

	));

	return $sections;
}


/**
 * Default Fields
 */
function azauthority_get_default_fields( $plugin_token ) {

	// Customizer Asset Path
	$asset_customizer_path = get_template_directory_uri() .'/assets';

	$prefix_section = $plugin_token . '_section_';

	$fields = apply_filters( $plugin_token . '_default_fields', array(

		// Homepage Setting

		array(
			'type'        => 'repeater',
			'label'       => esc_attr__( 'Post Sections', 'azauthority' ),
			'section'     => $prefix_section . 'homepage',
			'priority'    => 10,
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__('Homepage Post Style', 'azauthority' ),
			),
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__('Homepage Post Style', 'azauthority' ),
			),
			'button_label' => esc_attr__('Add Homepage Section', 'azauthority' ),
			'settings'     => 'custom_homepage_control',
			'default'      => array(			
				array(
					'link_text' => esc_attr__( 'Title Section', 'azauthority' ),
					'link_url'  => '',
				),
			),
			'fields' => array(
				'link_text' => array(
					'type'        => 'text',
					'label'       => esc_attr__( 'Title Post', 'azauthority' ),
					'default'     => '',
				),
				'category_post' => array(
					'type'       		=> 'select',
					'label'				=> esc_html__( 'Select Category', 'azauthority' ),
					'choices'			=> azauthority_get_category_list(),
				),
				'box_post' => array(
					'type'       		=> 'select',
					'label'				=> esc_html__( 'Select box', 'azauthority' ),
					'choices'			=> array(

						'three_box'     => esc_html__( 'Three Box', 'azauthority'),
						'five_box'		=> esc_html__( 'Five Box', 'azauthority')


					),
				),
			)
		),

		/**
		* Featured Fields
		*/
		array(
			'settings'			=> 'azauthority_enable_featured',
			'label'				=> esc_html__( 'Featured Homepage', 'azauthority' ),
			'section'			=> $prefix_section . 'featured',
			'type'				=> 'switch',
			'default'			=> 1,
			'priority'			=> 5,
		),

		array(
			'settings'		=> 'azauthority_select_list',
			'type'        	=> 'select',
			'label'       	=> esc_html__( 'Select One Category', 'azauthority' ),
			'section'		=> $prefix_section . 'featured',
			'default'    	=> '',
			'choices'		=> azauthority_get_category_list(),
			'priority'			=> 15,
			'active_callback'	=> array(
					array(
						'setting'  => 'azauthority_throght_category',
						'operator' => '==',
						'value'    => 1,
					)
			)
		),


		/**
		* General Fields
		*/
		array(
			'settings'			=> 'azauthority_sidebar_layout',
			'label'				=> esc_html__( 'Sidebar', 'azauthority' ),
			'section'			=> $prefix_section . 'general',
			'type'				=> 'radio-image',
			'default'			=> 'none',
			'priority'			=> 1,
			'choices'			=> array(
				'left'			=> $asset_customizer_path .'/images/col-2cr.png',				
				'none'			=> $asset_customizer_path .'/images/col-1cl.png',
				'right'			=> $asset_customizer_path .'/images/col-2cl.png',
			)
		),

		// Meta info Single Posts
		array(
			'settings'			=> 'azauthority_meta_info',
			'label'				=> esc_html__( 'Single Meta Info', 'azauthority' ),
			'section'			=> $prefix_section . 'general',
			'type'				=> 'multicheck',
			'default'			=> array('date', 'author', 'category', 'tag'),
			'priority'			=> 10,
			'choices'			=> array(				
				'author'			=> esc_attr__( 'Author', 'azauthority' ),
				'date'				=> esc_attr__( 'Date', 'azauthority' ),
				'category'			=> esc_attr__( 'Categories', 'azauthority' ),
				'tag'				=> esc_attr__( 'Tags', 'azauthority' ),
			)
		),		

		/**
		* Footer Fields
		*/
		
		array(
			'settings'			=> 'azauthority_title_head_footer',
			'label'				=> esc_html__( 'Footer Widget Titles', 'azauthority' ),
			'section'			=> $prefix_section . 'footer',
			'type'				=> 'color',
			'default'			=> '#000',
			'priority'			=> 20,
			'choices'			=> array(
				'alpha'			=> true,
			),
			'output'			=> array(
				array(
					'element'	=> '.footer-widgets .widget-title',
					'property'	=> 'color'
				)
			)
		),

		array(
			'settings'			=> 'azauthority_link_color_footer',
			'label'				=> esc_html__( 'Footer Widget Links Color', 'azauthority' ),
			'section'			=> $prefix_section . 'footer',
			'type'				=> 'color',
			'default'			=> '#000',
			'priority'			=> 40,
			'choices'			=> array(
				'alpha'			=> true,
			),
			'output'			=> array(
				array(
					'element'	=> '.footer-widgets a',
					'property'	=> 'color'

				)
			)
		),		

	));

	return $fields;
}