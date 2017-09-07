<?php
/**
 * Semper Fi Lite: Customizer-Generate-Default-Options
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 14
 */

add_action('after_switch_theme', 'semperfi_after_switch_theme_options');

add_action( 'customize_register', 'semperfi_after_switch_theme_options' );

function semperfi_after_switch_theme_options () {

    /**
     * Request the Array of Options
     */
    require get_parent_theme_file_path( '/inc/customizer-options.php' );
    
    /*if (get_theme_mod('semperfi_installed_and_set_defaults') != 'true') { */

        foreach($semperfi_customizer_array_of_options as $option => $values) {

            set_theme_mod('semperfi_installed_and_set_defaults', 'true');

            if (get_theme_mod($option) == '') {

                set_theme_mod( $option, $semperfi_customizer_array_of_options[$option]['default'] );

            /*}*/
        }
    }
}


/* * if get_theme_mod never existed lets generate the default setting
if (is_customize_preview()) { 
    require get_parent_theme_file_path( '/inc/customizer-options.php' );
    
    foreach($semperfi_customizer_array_of_options as $option => $values) {
        
        if (isset(get_theme_($option))) {
            
            set_theme_mod( $option, $semperfi_customizer_array_of_options[$option]['default'] );
            
        }   
    }
} /* */




/**
 * unset all the options with a default value for testing
 *
require get_parent_theme_file_path( '/inc/customizer-options.php' );

foreach($semperfi_customizer_array_of_options as $option => $values) {

    if (get_theme_mod($option) == $semperfi_customizer_array_of_options[$option]['default']) {

        set_theme_mod( $option, '' );

    }
}/* */
