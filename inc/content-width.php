<?php if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'baw_content_section', array(
    'title'          => __( 'Content', 'baw' ),
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'content_max_width',
	'label'       => esc_html__( 'Content max width', 'baw' ),
	'section'     => 'baw_content_section',
	'default'     => 0,
	'choices'     => array(
		'min'  => '0',
		'max'  => '2000',
		'step' => '100',
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'content_padding',
	'label'       => esc_html__( 'Content Padding', 'baw' ),
	'section'     => 'baw_content_section',
	'default'     => 0,
	'choices'     => array(
		'min'  => '0',
		'max'  => '200',
		'step' => '1',
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'hide_home_content',
	'label'       => __( 'Hide sidebar and content on home page', 'baw' ),
	'section'     => 'baw_content_section',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

/********************************************
* Content Styles
*********************************************/ 	

function baw_content_styles () {

        $content_max_width = get_theme_mod( 'content_max_width' );
        $hide_home_content = get_theme_mod( 'hide_home_content' );
        $content_padding = get_theme_mod( 'content_padding' );

		if($content_max_width) { $content_max_width_style = "#content,.h-center {max-width: {$content_max_width}px !important;}";} else {$content_max_width_style ="";}
		if($hide_home_content and (is_home() or is_front_page())) { $hide_home_content_style = "#content #primary, body #content #secondary {display: none !important;}";} else {$hide_home_content_style ="";}
		if($content_padding) { $content_padding_style = "#content,.h-center {padding: {$content_padding}px !important;}";} else {$content_padding_style ="";}

		
        wp_add_inline_style( 'black-and-white-style', 
		$content_max_width_style.$hide_home_content_style.$content_padding_style
		);
}
add_action( 'wp_enqueue_scripts', 'baw_content_styles' );