<?php
// Section: Social Links.
$wp_customize->add_section( 'social_links_section', array(
	'priority'       => 30,
	'title'          => __( 'Social Options', 'a-portfolio' ),
	'capability'     => 'edit_theme_options'
) );

// Footer Socail url
$social_name_arrays = array('Linkedin','Facebook','Twitter','Youtube','Behance');
foreach ($social_name_arrays as  $social_name) {
 	$wp_customize->add_setting( 'a_portfolio_footer_social_url_'.$social_name, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'a_portfolio_footer_social_url_'.$social_name, array(
        /* translators: %s: Label */ 
        'label'                 =>  sprintf( __( '%s Url', 'a-portfolio' ), $social_name ),
	    'section'               => 'social_links_section',
	    'type'                  => 'text',
	    'settings' => 'a_portfolio_footer_social_url_'.$social_name,
    ) );
}

