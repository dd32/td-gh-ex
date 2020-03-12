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
    'title'     => 'Background',
    'priority'  => '9', ) );

// Array for duplicate Paneles
$semperfi_check_for_duplicate_panels = array('Default');

// Array for duplicate Sections
$semperfi_check_for_duplicate_sections = array('Default');

// Create an Array for Multi-dimensional Theme Options Naming
$semperfi_customizer_multi_dimensional_array = array(
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
foreach($semperfi_customizer_customizer_options_array as $semperfi_panels_section_key => $semperfi_panels_section_value) {
    
    $semperfi_count_out_panels_sections = 1;
    
    while ( $semperfi_count_out_panels_sections <=  count( $semperfi_panels_section_value['default_options'] ) ) {
    
        foreach( $semperfi_panels_section_value as $semperfi_panels_section_values => $semperfi_panels_sections_name ) {

            // Check if $semperfi_panels_section_values is at a "panel_title"
            if ( ( $semperfi_panels_section_values == 'panel_title' ) && ( !in_array( $semperfi_panels_sections_name , $semperfi_check_for_duplicate_panels ) ) ) {
                
                // Create the Panel
                $wp_customize->add_panel(
                    $semperfi_panels_sections_name, array(
                        'priority'  => $semperfi_panels_section_value['panel_priority'],
                        'title'     => $semperfi_panels_sections_name));

                // Add to Array and Stop future duplicate panels
                array_push( $semperfi_check_for_duplicate_panels , $semperfi_panels_sections_name );

            }
            
            
            // Check if $semperfi_panels_section_values is at a "section_title"
            if ( $semperfi_panels_section_values == 'section_title' ) {
                
                // has multiple default options but only one 'section_title' for all those options
                if ( !is_array ( $semperfi_panels_sections_name ) ) {
                    
                    // Need to create the 'section_title' now to check for duplicates
                    $semperfi_modified_section_title = str_replace( "~", $semperfi_customizer_multi_dimensional_array[$semperfi_count_out_panels_sections], $semperfi_panels_section_value['section_title'] );
                    
                    if ( !in_array( $semperfi_modified_section_title , $semperfi_check_for_duplicate_sections ) ) {
                        
                        //echo $semperfi_modified_section_title . "\n";

                        // Create the Section
                        $wp_customize->add_section(
                             $semperfi_modified_section_title, array(
                                'panel'         => $semperfi_panels_section_value['panel_title'],
                                'priority'      => $semperfi_panels_section_value['section_priority'],
                                'title'         => $semperfi_modified_section_title, ) );

                        // Add to Array and Stop future duplicate sections
                        array_push( $semperfi_check_for_duplicate_sections , $semperfi_modified_section_title );
                        
                    }
                    
                    
                } 
                
                // multiple 'section_title' to go with each default option
                else {
                    
                    // Double checking for duplicates
                    if ( !in_array( $semperfi_panels_sections_name[$semperfi_count_out_panels_sections] , $semperfi_check_for_duplicate_sections ) ) {
                        
                        //echo $semperfi_panels_section_value['section_title'][$semperfi_count_out_panels_sections] . "\n";

                        // Create the Section
                        $wp_customize->add_section(
                            $semperfi_panels_sections_name[$semperfi_count_out_panels_sections], array(
                                'panel'         => $semperfi_panels_section_value['panel_title'],
                                'priority'      => $semperfi_panels_section_value['section_priority'],
                                'title'         => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$semperfi_count_out_panels_sections], $semperfi_panels_section_value['section_title'][$semperfi_count_out_panels_sections] ) ));

                        // Add to Array and Stop future duplicate sections
                        array_push( $semperfi_check_for_duplicate_sections , $semperfi_panels_sections_name[$semperfi_count_out_panels_sections] );

                    }
                    
                }
                
            }
            
        }
        
        $semperfi_count_out_panels_sections++;
        
    }
    
}