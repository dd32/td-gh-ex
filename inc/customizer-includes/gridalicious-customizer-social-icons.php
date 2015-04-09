<?php
/**
 * The template for Social Links in Customizer
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

	// Social Icons
	if( 4 <= get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'gridalicious_social_links', array(
		    'capability'     => 'edit_theme_options',
		    'description'	=> __( 'Note: Enter the url for correponding social networking website', 'gridalicious' ),
		    'priority'       => 600,
			'title'    		 => __( 'Social Links', 'gridalicious' ),
		) );
	}
	
	$wp_customize->add_section( 'gridalicious_social_links', array(
		'panel'			=> 'gridalicious_social_links',
		'priority' 		=> 1,
		'title'   	 	=> __( 'Social Links', 'gridalicious' ),
	) );

	$gridalicious_social_icons 	=	gridalicious_get_social_icons_list();	
	
	$i 	=	1;

	foreach ( $gridalicious_social_icons as $option ){
		$lower_case_option	=	str_replace( ' ', '_', strtolower( $option ) );
			
		if( $option == 'Skype' ){
			$wp_customize->add_setting( 'gridalicious_theme_options['. $lower_case_option .'_link]', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',
				) );

			$wp_customize->add_control( 'gridalicious_'. $lower_case_option .'_link', array(
				'description'	=> __( 'Skype link can be of formats:<br>callto://+{number}<br> skype:{username}?{action}. More Information in readme file', 'gridalicious' ),
				'label'    		=> $option,
				'priority' 		=> $i + '2',
				'section'  		=> 'gridalicious_social_links',
				'settings' 		=> 'gridalicious_theme_options['. $lower_case_option .'_link]',
				'type'	   		=> 'url',
			) );
		}
		else {
			if( $option == 'Email' ){
				$wp_customize->add_setting( 'gridalicious_theme_options['. $lower_case_option .'_link]', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_email',
					) );
			}
			
			else {
				$wp_customize->add_setting( 'gridalicious_theme_options['. $lower_case_option .'_link]', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw',
					) );
			}

			$wp_customize->add_control( 'gridalicious_'. $lower_case_option .'_link', array(
				'label'    => $option,
				'priority' => $i + '2',
				'section'  => 'gridalicious_social_links',
				'settings' => 'gridalicious_theme_options['. $lower_case_option .'_link]',
				'type'	   => 'url',
			) );
		}
	
		$i++;
	}
	// Social Icons End