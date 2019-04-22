<?php if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'baw_footer', array(
    'title'          => __( 'Footer Options', 'baw' ),
    'priority'       => 94,
    'capability'     => 'edit_theme_options',
) ); 

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'baw_copyright',
	'label'       => __( 'Activate Custom Copyright', 'baw' ),
	'section'     => 'baw_footer',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'code',
	'settings'    => 'code_copyright_text',
	'label'       => esc_html__( 'Add Copyright', 'baw' ),
	'section'     => 'baw_footer',
	'default'     => '',
	'choices'     => array(
		'language' => 'html',
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'baw_footer_background',
	'label'       => __( 'Background Color', 'baw' ),
	'section'     => 'baw_footer',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'baw_footer_title',
	'label'       => __( 'Title Color', 'baw' ),
	'section'     => 'baw_footer',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'baw_footer_text',
	'label'       => __( 'Text Color', 'baw' ),
	'section'     => 'baw_footer',
	'default'     => '',
) );


Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'baw_footer_link_hover',
	'label'       => __( 'Link Hover Color', 'baw' ),
	'section'     => 'baw_footer',
	'default'     => '',
) );


/**
 * Footer styles
 */ 	

function baw_footer_method() {

        $baw_footer_background = get_theme_mod( 'baw_footer_background' );
        $baw_footer_title = get_theme_mod( 'baw_footer_title' );
        $baw_footer_text = get_theme_mod( 'baw_footer_text' );
        $baw_footer_link_hover = get_theme_mod( 'baw_footer_link_hover' );

		
		if($baw_footer_background) { $style1 = ".footer-center, .site-info {background: {$baw_footer_background} !important;}";} else {$style1 ="";}
		if($baw_footer_title) { $style2 = ".footer-widgets h2 {color: {$baw_footer_title} !important;}";} else {$style2 ="";}
		if($baw_footer_text) { $style3 = ".footer-widgets a, .footer-widgets, .site-info,  .site-info a {color: {$baw_footer_text} !important;}";} else {$style3 ="";}
		if($baw_footer_link_hover) { $style4 = ".footer-widgets a:hover, .site-info a:hover {color: {$baw_footer_link_hover} !important;}";} else {$style4 ="";}

        wp_add_inline_style( 'black-and-white-style',
		$style1.$style2.$style3.$style4
		);
}
add_action( 'wp_enqueue_scripts', 'baw_footer_method' );		
		