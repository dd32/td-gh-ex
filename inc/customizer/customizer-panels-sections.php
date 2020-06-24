<?php
/**
 * Semper Fi Lite: Customizer-Panels-Sections
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 14
 */

// Change Name of Background Image to just Background
$wp_customize->add_section( 'background_image', array(
    'title'     => __( 'Background' , 'semper-fi-lite' ),
    'priority'  => '9', ) );

// Array for duplicate Paneles
$semper_fi_lite_check_for_duplicate_panels = array('Default');

// Array for duplicate Sections
$semper_fi_lite_check_for_duplicate_sections = array('Default');

// Create an Array for Multi-dimensional Theme Options Naming
$semper_fi_lite_customizer_multi_dimensional_array = array(
    1   => '1st',
    2   => '2nd',
    3   => '3rd',
    4   => '4th',
    5   => '5th',
    6   => '6th',
    7   => '7th',
    8   => '8th',
    9   => '9th',
    10  => '10th',
    11  => '11th',
    12  => '12th',
    13  => '13th',
    14  => '14th',
    15  => '15th',
    16  => '16th',
    17  => '17th',
    18  => '18th',
    19  => '19th',
    20  => '20th',
    21  => '21st',
    22  => '22nd',
    23  => '23rd',
    24  => '24th',
    25  => '25th',
    26  => '26th',
    27  => '27th',
    28  => '28th',
    29  => '29th',
    30  => '30th', );


// Loop through and create the sections
foreach($semper_fi_lite_customizer_customizer_options_array as $semper_fi_lite_panels_section_key => $semper_fi_lite_panels_section_value) {
    
    $semper_fi_lite_count_out_panels_sections = 1;
    
    while ( $semper_fi_lite_count_out_panels_sections <=  count( $semper_fi_lite_panels_section_value['default_options'] ) ) {
    
        foreach( $semper_fi_lite_panels_section_value as $semper_fi_lite_panels_section_values => $semper_fi_lite_panels_sections_name ) {

            // Check if $semper_fi_lite_panels_section_values is at a "panel_title"
            if ( ( $semper_fi_lite_panels_section_values == 'panel_title' ) && ( !in_array( $semper_fi_lite_panels_sections_name , $semper_fi_lite_check_for_duplicate_panels ) ) ) {
                
                // Create the Panel
                $wp_customize->add_panel(
                    $semper_fi_lite_panels_sections_name, array(
                        'priority'  => $semper_fi_lite_panels_section_value['panel_priority'],
                        'title'     => $semper_fi_lite_panels_sections_name));

                // Add to Array and Stop future duplicate panels
                array_push( $semper_fi_lite_check_for_duplicate_panels , $semper_fi_lite_panels_sections_name );

            }
            
            
            // Check if $semper_fi_lite_panels_section_values is at a "section_title"
            if ( $semper_fi_lite_panels_section_values == 'section_title' ) {
                
                // has multiple default options but only one 'section_title' for all those options
                if ( !is_array ( $semper_fi_lite_panels_sections_name ) ) {
                    
                    // Need to create the 'section_title' now to check for duplicates
                    $semper_fi_lite_modified_section_title = str_replace( "~", $semper_fi_lite_customizer_multi_dimensional_array[$semper_fi_lite_count_out_panels_sections], $semper_fi_lite_panels_section_value['section_title'] );
                    
                    if ( !in_array( $semper_fi_lite_modified_section_title , $semper_fi_lite_check_for_duplicate_sections ) ) {
                        
                        //echo $semper_fi_lite_modified_section_title . "\n";

                        // Create the Section
                        $wp_customize->add_section(
                             $semper_fi_lite_modified_section_title, array(
                                'panel'         => $semper_fi_lite_panels_section_value['panel_title'],
                                'priority'      => $semper_fi_lite_panels_section_value['section_priority'],
                                'title'         => $semper_fi_lite_modified_section_title, ) );

                        // Add to Array and Stop future duplicate sections
                        array_push( $semper_fi_lite_check_for_duplicate_sections , $semper_fi_lite_modified_section_title );
                        
                    }
                    
                    
                } 
                
                // multiple 'section_title' to go with each default option
                else {
                    
                    // Double checking for duplicates
                    if ( !in_array( $semper_fi_lite_panels_sections_name[$semper_fi_lite_count_out_panels_sections] , $semper_fi_lite_check_for_duplicate_sections ) ) {
                        
                        //echo $semper_fi_lite_panels_section_value['section_title'][$semper_fi_lite_count_out_panels_sections] . "\n";

                        // Create the Section
                        $wp_customize->add_section(
                            $semper_fi_lite_panels_sections_name[$semper_fi_lite_count_out_panels_sections], array(
                                'panel'         => $semper_fi_lite_panels_section_value['panel_title'],
                                'priority'      => $semper_fi_lite_panels_section_value['section_priority'],
                                'title'         => str_replace( "~", $semper_fi_lite_customizer_multi_dimensional_array[$semper_fi_lite_count_out_panels_sections], $semper_fi_lite_panels_section_value['section_title'][$semper_fi_lite_count_out_panels_sections] ) ));

                        // Add to Array and Stop future duplicate sections
                        array_push( $semper_fi_lite_check_for_duplicate_sections , $semper_fi_lite_panels_sections_name[$semper_fi_lite_count_out_panels_sections] );

                    }
                    
                }
                
            }
            
        }
        
        $semper_fi_lite_count_out_panels_sections++;
        
    }
    
}