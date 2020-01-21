<?php
/**
 * Semper Fi Lite: Customizer
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 63
 */



// Bind JS handlers to instantly live-preview changes.
function semperfi_customize_preview_js() {
    wp_enqueue_script( 'sempperfi-customize-preview', get_theme_file_uri( '/inc/customizer/customize-preview.js' ), array( 'customize-preview' ), wp_get_theme()->get( 'Version' ) , true );
}
add_action( 'customize_preview_init', 'semperfi_customize_preview_js' );


// The following is "Schwarttzy's Customizer", an array generated customzier
function semperfi_customize_register( $wp_customize ) {
    
    
    // Get all the Theme Customizer Options that theme currently supports
    require get_parent_theme_file_path( '/inc/customizer/customizer-options.php' );
    
    
    // Get all the Theme Customizer Options that theme currently supports
    require get_parent_theme_file_path( '/inc/customizer/customizer-custom-sanitizers.php' );


    // Request the Array of Google Fonts
    require get_parent_theme_file_path( '/inc/google-fonts/fonts.php' );


    // Request the Code to Generate the Panels and Sections
    require get_parent_theme_file_path( '/inc/customizer/customizer-panels-sections.php' );


    // Fix the Odd Ball Factory WordPress Defaults
    $wp_customize->get_control( 'background_color' )->section = 'background_image';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial( 'background_color', array('selector' => '#customizer_background'));
    $wp_customize->get_control( 'site_icon' )->section = 'background_image';
    $wp_customize->get_control( 'blogname' )->section = 'site_title';
    $wp_customize->get_control( 'blogdescription' )->section = 'tagline';
    
    
    // Check for Duplicate Selectors
    $check_for_duplicate_selectors = array('Default');
    
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
    
    
    // Here's the special code that make it all happen
    foreach( $semperfi_customizer_customizer_options_array as $option => $values ) {
            
        $i = 1;
        
        while ( $i <=  count( $values['default_options'] ) ) {
            
            
            // Some Customizer options can have multiple 'section_title' in an array, let's use them if they exist
            if ( !is_array( $values['section_title'] ) ) {
                
                $section_title_transformed = $values['section_title'];
                
            } else {
                
                $section_title_transformed = $values['section_title'][$i];
                
            }
            
            
            // Some Customizer options can have multiple 'selector' in an array, let's use them if they exist
            if ( !is_array( $values['selector'] ) ) {
                
                $selector_transformed = str_replace( "~", $i, $values['selector'] );
                
            } else {
                
                $selector_transformed = str_replace( "~", $i, $values['selector'][$i] );
                
            }
            
            
            // Add Color Changing option to Customizer
            if ( $values['type'] == 'color' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'sanitize_hex_color',
                    'transport'         => 'postMessage', ) );

                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $option . '_' . $i, array(
                    'description'   => $values['description'][$i],
                    'input_attrs'       => array(
                            'stylesheet_handle' => $values[ 'input_attrs' ][ 'stylesheet_handle' ],
                            'css'               => $values[ 'input_attrs' ][ 'css' ], ),
                    'label'         => $values['label'],
                    'section'       => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'      => $option . '_' . $i, ) ) );

            }
            
            // Add a font selector to Customizer
            if ( $values['type'] == 'font' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_textarea',
                    'transport'         => 'postMessage', ) );

                $wp_customize->add_control( $option . '_' . $i , array(
                    'choices'           => $finalized_google_font_array,
                    'description'       => $values['description'][$i],
                    'input_attrs'       => array(
                            'stylesheet_handle' => $values[ 'input_attrs' ][ 'stylesheet_handle' ],
                            'css'               => $values[ 'input_attrs' ][ 'css' ], ),
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,
                    'type'              => 'select', ) );

            }

            // Add a Image to Customizer, only cropped images because I'm not going let bandwidth get wasted
            if ( $values['type'] == 'img' ) {
                
                $wp_customize -> add_setting ( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'semperfi_sanitize_image',
                    'transport'         => 'postMessage', ) );
                
                $wp_customize -> add_control ( new WP_Customize_Image_Control ( $wp_customize , $option . '_' . $i , array(
                    'description'       => $values['description'][$i],
                    'input_attrs'       => array(
                            'img_size'          => $values[ 'input_attrs' ][ 'img_size' ], ),
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed  ),
                    'settings'          => $option . '_' . $i, ) ) );

            }

            // Add a font selector to Radio
            if ( $values['type'] == 'radio' ) {

                $wp_customize->add_setting( $option . '_' . $i , array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_textarea',
                    'transport'         => 'postMessage', ) );
                
                $wp_customize->add_control( $option . '_' . $i, array(
                    'choices'           => $values['choices'],
                    'description'       => $values['description'][$i],
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'type'              => 'radio', ));

            }

            // Add a font selector to Range
            if ( $values['type'] == 'range' ) { 

                // Range is cool and all, but the accuracy sucks if you have more than 5 options, so lets just build arrays for a select type

                $stepping = range($values['low'], $values['high'], (1 * ($values['step'])));

                $array_choices = array_combine($stepping, $stepping);

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_attr',
                    'transport'         => 'postMessage', ) );

                $wp_customize->add_control( $option . '_' . $i, array(
                    'choices'           => $array_choices,
                    'description'       => $values['description'][$i],
                    'input_attrs'       => array(
                            'stylesheet_handle' => $values[ 'input_attrs' ][ 'stylesheet_handle' ],
                            'css'               => $values[ 'input_attrs' ][ 'css' ], ),
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,
                    'type'              => 'select', ) );

                // Clear out the Array for the next data set
                unset($array_choices);

            }

            // Add a font selector to Select
            if ( $values['type'] == 'select' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_textarea',
                    'transport'         => 'postMessage', ) );

                $wp_customize->add_control( $option . '_' . $i, array(
                    'choices'           => $values['choices'],
                    'description'       => $values['description'][$i],
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,
                    'type'              => 'select', ) );
            }
            
            // Add a Text box to Customizer
            if ( $values['type'] == 'text' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_textarea',
                    'transport'         => 'postMessage', ) );

                $wp_customize->add_control( $option . '_' . $i, array(
                    'description'       => $values['description'][$i],
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,
                    'type'              => 'text', ) );

            }
            
            // Add a Textarea to Customizer
            if ( $values['type'] == 'textarea' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_textarea',
                    'transport'         => 'postMessage', ) );

                $wp_customize->add_control( $option . '_' . $i, array(
                    'description'       => $values['description'][$i],
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,
                    'type'              => 'textarea', ) );

            }
            
            // Add a URL box to Customizer
            if ( $values['type'] == 'url' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'esc_url',
                    'transport'         => 'postMessage', ));

                $wp_customize->add_control( $option . '_' . $i, array(
                    'description'       => $values['description'][$i],
                    'label'             => $values['label'],
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,
                    'type'              => 'url', ) );

            }

            if ( $values['type'] == 'video' ) {

                $wp_customize->add_setting( $option . '_' . $i, array(
                    'default'           => $values['default_options'][$i],
                    'sanitize_callback' => 'absint',
                    'transport'         => 'postMessage', ) );
                
                $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $option . '_' . $i, array(
                    'description'       => $values['description'][$i],
                    'label'             => $values['label'],
                    'mime_type'         => 'video',
                    'priority'          => $values['priority'],
                    'section'           => str_replace( "~", $semperfi_customizer_multi_dimensional_array[$i], $section_title_transformed ),
                    'settings'          => $option . '_' . $i,  ) ) );

            }
                
            if ( ( array_key_exists ( 'selector' , $values ) ) && ( !in_array( $selector_transformed , $check_for_duplicate_selectors ) ) ) {

                $wp_customize->selective_refresh->add_partial( $option . '_' . $i, array( 
                    'selector'              => $selector_transformed, ) );

                // Add to Array and Stop future duplicate selectors
                array_push( $check_for_duplicate_selectors, $selector_transformed );

            }
            
            $i++;

        }
    
    }

} add_action( 'customize_register', 'semperfi_customize_register' );
