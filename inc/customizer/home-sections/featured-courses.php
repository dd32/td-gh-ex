<?php
/**
 * Featured Courses options.
 *
 * @package Best Learner
 */

$default = best_learner_get_default_theme_options();

// Featured Featured Courses Section
$wp_customize->add_section( 'section_home_featured_courses',
	array(
		'title'      => __( 'Featured Courses', 'best-learner' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Featured Courses Section
$wp_customize->add_setting('theme_options[disable_featured_courses_section]', 
	array(
	'default' 			=> $default['disable_featured_courses_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'best_learner_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_featured_courses_section]', 
	array(		
	'label' 	=> __('Disable Feautured Courses Section', 'best-learner'),
	'section' 	=> 'section_home_featured_courses',
	'settings'  => 'theme_options[disable_featured_courses_section]',
	'type' 		=> 'checkbox',	
	)
);

//Featured Courses Section title
$wp_customize->add_setting('theme_options[featured_courses_title]', 
	array(
	'default'           => $default['featured_courses_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_courses_title]', 
	array(
	'label'       => __('Section Title', 'best-learner'),
	'section'     => 'section_home_featured_courses',   
	'settings'    => 'theme_options[featured_courses_title]',
	'active_callback' => 'best_learner_featured_courses_active',		
	'type'        => 'text'
	)
);

// Number of counter
$wp_customize->add_setting('theme_options[number_of_ss_column]', 
	array(
	'default' 			=> $default['number_of_ss_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'best_learner_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ss_column]', 
	array(
	'label'       => __('Column Per Row', 'best-learner'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3', 'best-learner'),
	'section'     => 'section_home_featured_courses',   
	'settings'    => 'theme_options[number_of_ss_column]',		
	'type'        => 'number',
	'active_callback' => 'best_learner_featured_courses_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_ss_items]', 
	array(
	'default' 			=> $default['number_of_ss_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'best_learner_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ss_items]', 
	array(
	'label'       => __('Number Of Featured Courses', 'best-learner'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'best-learner'),
	'section'     => 'section_home_featured_courses',   
	'settings'    => 'theme_options[number_of_ss_items]',		
	'type'        => 'number',
	'active_callback' => 'best_learner_featured_courses_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[ss_content_type]', 
	array(
	'default' 			=> $default['ss_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'best_learner_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[ss_content_type]', 
	array(
	'label'       => __('Content Type', 'best-learner'),
	'section'     => 'section_home_featured_courses',   
	'settings'    => 'theme_options[ss_content_type]',		
	'type'        => 'select',
	'active_callback' => 'best_learner_featured_courses_active',
	'choices'	  => array(
			'ss_page'	  => __('Page','best-learner'),
		),
	)
);

$number_of_ss_items = best_learner_get_option( 'number_of_ss_items' );

for( $i=1; $i<=$number_of_ss_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[featured_courses_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'best_learner_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_courses_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'best-learner'), $i),
		'section'     => 'section_home_featured_courses',   
		'settings'    => 'theme_options[featured_courses_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'best_learner_featured_courses_page',
		)
	);

}