<?php
/**
 * Semper Fi Lite: Customizer-Options
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 63
 */

// Just the default array to get the ball rolling
$semperfi_customizer_array_of_default_options = array(
    
    
    'open_graph_protocol' => array(
        'default_options'  => array(
            1                   => false, ),
        'label'             => __('Enable Open Graph Protocol', 'semper-fi-lite'),
        'description'       => array(
            1                   => 'The <a href="http://ogp.me/" target="_blank">Open Graph protocol</a> enables any web page to become a rich object in a social graph. For instance, this is used on Facebook to allow any web page to have the same functionality as any other object on Facebook.<br><br>While many different technologies and schemas exist and could be combined together, there is not a single technology which provides enough information to richly represent any web page within the social graph. The Open Graph protocol builds on these existing technologies and gives developers one thing to implement. Developer simplicity is a key goal of the Open Graph protocol which has informed many of <a href="http://www.scribd.com/doc/30715288/The-Open-Graph-Protocol-Design-Decisions" target="_blank">the technical design decisions</a>.', ),
        'panel_title'       => __('Microdata for Structured Data', 'semper-fi-lite'),
        'panel_priority'    => 106,
        'priority'          => 10,
        'section_title'     => __('Open Graph Protocol', 'semper-fi-lite'),
        'section_priority'  => 10,
        'selector'          => 'header#title-and-image .customizer-tite-image-3',
        'type'              => 'radio',
        'choices' => array(
			true             => 'Yes',
			false            => 'No')),
    
    
);


// Start with a clean slate
set_theme_mod( 'semperfi_theme_mod_assembling_customizer_array', $semperfi_customizer_array_of_default_options );

//Hook for all the modules to add their customizer options to
do_action( 'semperfi_do_action_assemble_customizer_array' );

// Final array all assembled, ready for use
$semperfi_customizer_array_of_options = get_theme_mod('semperfi_theme_mod_assembling_customizer_array');