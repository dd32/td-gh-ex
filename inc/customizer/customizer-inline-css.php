<?php
/**
 * Semper Fi Lite: Customizer-CSS-Sanitizers
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 93
 */

// Generate the CSS to be inlined
$semper_fi_lite_customizer_generated_css_modifiers = '';        
        
foreach( $semper_fi_lite_customizer_inline_this_css as $semper_fi_lite_customizer_option => $semper_fi_lite_customizer_values ) {

    $semper_fi_lite_generate_css_count = 1;

    while ( $semper_fi_lite_generate_css_count <=  count( $semper_fi_lite_customizer_values[ 'default_options' ] ) ) {

        $semper_fi_lite_customizer_multi_option_retrieved_theme_mod = esc_html( get_theme_mod( $semper_fi_lite_customizer_option . '_' . $semper_fi_lite_generate_css_count ) );

        if ( ( $semper_fi_lite_customizer_multi_option_retrieved_theme_mod != $semper_fi_lite_customizer_values[ 'default_options' ][ $semper_fi_lite_generate_css_count ] ) && ( $semper_fi_lite_customizer_multi_option_retrieved_theme_mod != '' ) ) {

            if ( $semper_fi_lite_customizer_values[ 'type' ] == 'font' ) {

                $semper_fi_lite_customizer_multi_option_retrieved_theme_mod = preg_replace( '/[^a-zA-Z0-9]+/' , ' ' , $semper_fi_lite_customizer_multi_option_retrieved_theme_mod );

            }

            $semper_fi_lite_css_customizer_selectors = $semper_fi_lite_customizer_values[ 'input_attrs' ][ 'css' ];

            $semper_fi_lite_customizer_generated_css_modifiers .= str_replace( "$" , $semper_fi_lite_customizer_multi_option_retrieved_theme_mod , $semper_fi_lite_css_customizer_selectors );

            $semper_fi_lite_customizer_generated_css_modifiers = str_replace( "@" , abs( $semper_fi_lite_customizer_multi_option_retrieved_theme_mod ) , $semper_fi_lite_customizer_generated_css_modifiers );

            $semper_fi_lite_customizer_generated_css_modifiers .= "; }\n";

        }

        $semper_fi_lite_generate_css_count++;

    }

}

$semper_fi_lite_customizer_generated_css_modifiers = substr( $semper_fi_lite_customizer_generated_css_modifiers , 0 , -1 );
