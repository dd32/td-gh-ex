<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2013, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 */


/**
 * Helper function that holds array of theme options.
 *
 * @return	array	$options	Array of theme options
 * @uses	thsp_get_theme_customizer_fields()	defined in customizer/helpers.php
 */
function thsp_cbp_get_fields() {

	$thsp_cbp_capability = thsp_cbp_capability();
	
	$options = array(

		// Section ID
		'searchlight_customizer' => array(
	
			'existing_section' => false,
	
			'args' => array(
				'title' => __( 'Searchlight Settings', 'searchlight' ),
				'description' => __( 'Here You can Set Some Specific Options of Searchlight Theme', 'searchlight' ),
				'priority' => 1
			),
			
			/* 
			 * This array contains all the fields that need to be
			 * added to this section
			 */
			'fields' => array(
			
				'field_header' => array(
					'setting_args' => array(
						'default' => '1',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Fixed Header?', 'searchlight' ),
						'type' => 'checkbox', 
						'priority' => 1
					)
				),	
				
				
				'field_banner' => array(
					'setting_args' => array(
						'default' => get_template_directory_uri() . '/images/banner.jpg',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Banner Image', 'searchlight' ),
						'type' => 'image', 
						'priority' => 1
					)
				),	
				
			
				'site_layout' => array(
					'setting_args' => array(
						'default' => '2c-r-fixed',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					), // End setting args			
					'control_args' => array(
						'label' => __( 'Site Layout', 'searchlight' ),
						'type' => 'images_radio', // Image radio replacement
						'choices' => array(
							'2c-r-fixed' => array(
								'label' => __( '2 Column, Right Sidebar', 'searchlight' ),
								// Define source for each image
								'image_src' => get_template_directory_uri() . '/images/2cr.png'
							),
							'2c-l-fixed' => array(
								'label' => __( '2 Column, Left Sidebar', 'searchlight' ),
								'image_src' => get_template_directory_uri() . '/images/2cl.png'
							),
							'1col-fixed' => array(
								'label' => __( '1 Column, No Sidebar', 'searchlight' ),
								'image_src' => get_template_directory_uri() . '/images/1col.png'
							)
						),					
						'priority' => 2
					) 
				),
			
	
				'searchlight_phone' => array(
					'setting_args' => array(
						'default' => __( '(000) 111-222', 'searchlight' ),
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
	
					'control_args' => array(
						'label' => __( 'Header Contact Number', 'searchlight' ),
						'type' => 'text', 
						'priority' => 3
					)
				),				

				
				'social_link1' => array(
					'setting_args' => array(
						'default' => 'http://wordpress.com',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
	
					'control_args' => array(
						'label' => __( 'Social Links', 'searchlight' ),
						'type' => 'text', 
						'priority' => 4
					)
				),			


				'social_link2' => array(
					'setting_args' => array(
						'default' => 'http://wordpress.com',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
	
					'control_args' => array(
						'type' => 'text', 
						'priority' => 5
					)
				),	

				'social_link3' => array(
					'setting_args' => array(
						'default' => 'http://wordpress.com',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
	
					'control_args' => array(
						'type' => 'text', 
						'priority' => 6
					)
				),	
				
				'social_link4' => array(
					'setting_args' => array(
						'default' => 'http://wordpress.com',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
	
					'control_args' => array(
						'type' => 'text', 
						'priority' => 7
					)
				),	
				
				'social_link5' => array(
					'setting_args' => array(
						'default' => 'http://wordpress.com',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
	
					'control_args' => array(
						'type' => 'text', 
						'priority' => 8
					)
				),	
				
				
				

			),
			
		),
		
		

		/*
		 * Add fields to an existing Customizer section
		 */
		'colors' => array(
			'existing_section' => true,
			'fields' => array(
				
				// 01
				'searchlight_content_text_color' => array(
					'setting_args' => array(
						'default' => '#555555',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Content Text Color', 'searchlight' ),
						'type' => 'color', 
						'priority' => 1
					)
				),
				
				// 02
				'searchlight_color01' => array(
					'setting_args' => array(
						'default' => '#05d24d',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Theme Color 01', 'searchlight' ),
						'type' => 'color', 
						'priority' => 2
					)
				),
				
				// 03
				'searchlight_color02' => array(
					'setting_args' => array(
						'default' => '#09cb69',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Theme Color 02', 'searchlight' ),
						'type' => 'color', 
						'priority' => 3
					)
				),
				
				// 04
				'searchlight_color03' => array(
					'setting_args' => array(
						'default' => '#149755',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Theme Color 03', 'searchlight' ),
						'type' => 'color', 
						'priority' => 4
					)
				)
				
						
					
			) 
			
			
			
		)

	);
	
	/* 
	 * 'thsp_cbp_options_array' filter hook will allow you to 
	 * add/remove some of these options from a child theme
	 */
	return apply_filters( 'thsp_cbp_options_array', $options );
	
}