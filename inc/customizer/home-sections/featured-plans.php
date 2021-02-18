<?php
/**
 * Featured Plans options.
 *
 * @package Best Learner
 */

$default = best_learner_get_default_theme_options();

// Featured Plans Section
$wp_customize->add_section( 'section_home_featured_plans',
	array(
		'title'      => __( 'Featured Plans', 'best-learner' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Featured Plans Section
$wp_customize->add_setting('theme_options[disable_featured_plans_section]', 
	array(
	'default' 			=> $default['disable_featured_plans_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'best_learner_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_featured_plans_section]', 
	array(		
	'label' 	=> __('Disable Featured Plans Section', 'best-learner'),
	'section' 	=> 'section_home_featured_plans',
	'settings'  => 'theme_options[disable_featured_plans_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of counter
$wp_customize->add_setting('theme_options[number_of_cs_column]', 
	array(
	'default' 			=> $default['number_of_cs_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'best_learner_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_column]', 
	array(
	'label'       => __('Column Per Row', 'best-learner'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3', 'best-learner'),
	'section'     => 'section_home_featured_plans',   
	'settings'    => 'theme_options[number_of_cs_column]',		
	'type'        => 'number',
	'active_callback' => 'best_learner_featured_plans_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_cs_items]', 
	array(
	'default' 			=> $default['number_of_cs_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'best_learner_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_items]', 
	array(
	'label'       => __('Number Of Featured Plans', 'best-learner'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'best-learner'),
	'section'     => 'section_home_featured_plans',   
	'settings'    => 'theme_options[number_of_cs_items]',		
	'type'        => 'number',
	'active_callback' => 'best_learner_featured_plans_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[cs_content_type]', 
	array(
	'default' 			=> $default['cs_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'best_learner_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[cs_content_type]', 
	array(
	'label'       => __('Content Type', 'best-learner'),
	'section'     => 'section_home_featured_plans',   
	'settings'    => 'theme_options[cs_content_type]',		
	'type'        => 'select',
	'active_callback' => 'best_learner_featured_plans_active',
	'choices'	  => array(
			'cs_page'	  => __('Page','best-learner'),
		),
	)
);

$number_of_cs_items = best_learner_get_option( 'number_of_cs_items' );

for( $i=1; $i<=$number_of_cs_items; $i++ ){

	// Courses First Page
	$wp_customize->add_setting('theme_options[featured_plans_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'best_learner_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_plans_page_'.$i.']', 
		array(
		'label'       => __('Select First Page', 'best-learner'),
		'section'     => 'section_home_featured_plans',   
		'settings'    => 'theme_options[featured_plans_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'best_learner_featured_plans_page',
		)
	);

}