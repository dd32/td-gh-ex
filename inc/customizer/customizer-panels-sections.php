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
    'priority'  => '9'));

// Array for duplicate Paneles
$check_for_duplicate_panels = array('Default');

// Array for duplicate Sections
$check_for_duplicate_sections = array('Default');

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
foreach($semperfi_customizer_customizer_options_array as $key => $value) {
    
    $i = 1;
    
    while ( $i <=  count( $value['default_options'] ) ) {
    
        foreach( $value as $values => $data ) {

            // Check if $values is at a "panel_title"
            if ( ( $values == 'panel_title' ) && ( !in_array( $data , $check_for_duplicate_panels ) ) ) {
                
                // Create the Panel
                $wp_customize->add_panel(
                    $data, array(
                        'priority'  => $value['panel_priority'],
                        'title'     => $data));

                // Add to Array and Stop future duplicate panels
                array_push( $check_for_duplicate_panels , $data );

            }
            
            
            // Check if $values is at a "section_title"
            if ( $values == 'section_title' ) {
                
                // has multiple default options but only one 'section_title' for all those options
                if ( !is_array ( $data ) ) {
                    
                    // Need to create the 'section_title' now to check for duplicates
                    $modified_section_title = str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $value['section_title'] );
                    
                    if ( !in_array( $modified_section_title , $check_for_duplicate_sections ) ) {
                        
                        //echo $modified_section_title . "\n";

                        // Create the Section
                        $wp_customize->add_section(
                             $modified_section_title, array(
                                'panel'         => $value['panel_title'],
                                'priority'      => $value['section_priority'],
                                'title'         => $modified_section_title ));

                        // Add to Array and Stop future duplicate sections
                        array_push( $check_for_duplicate_sections , $modified_section_title );
                        
                    }
                    
                    
                } 
                
                // multiple 'section_title' to go with each default option
                else {
                    
                    // Double checking for duplicates
                    if ( !in_array( $data[$i] , $check_for_duplicate_sections ) ) {
                        
                        //echo $value['section_title'][$i] . "\n";

                        // Create the Section
                        $wp_customize->add_section(
                            $data[$i], array(
                                'panel'         => $value['panel_title'],
                                'priority'      => $value['section_priority'],
                                'title'         => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $value['section_title'][$i] ) ));

                        // Add to Array and Stop future duplicate sections
                        array_push( $check_for_duplicate_sections , $data[$i] );

                    }
                    
                }
                
            }
            
        }
        
        $i++;
        
    }
    
}