<?php
/**
 * Semper Fi Lite: Customizer-CSS-Sanitizers
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 93
 */

// Generate the CSS to be inlined
$semperfi_customizer_generated_css_modifiers = '';        
        
foreach( $semperfi_customizer_inline_this_css as $semperfi_customizer_option => $semperfi_customizer_values ) {

    $semperfi_generate_css_count = 1;

    while ( $semperfi_generate_css_count <=  count( $semperfi_customizer_values[ 'default_options' ] ) ) {

        $semperfi_customizer_multi_option_retrieved_theme_mod = esc_html( get_theme_mod( $semperfi_customizer_option . '_' . $semperfi_generate_css_count ) );

        if ( ( $semperfi_customizer_multi_option_retrieved_theme_mod != $semperfi_customizer_values[ 'default_options' ][ $semperfi_generate_css_count ] ) && ( $semperfi_customizer_multi_option_retrieved_theme_mod != '' ) ) {

            if ( $semperfi_customizer_values[ 'type' ] == 'font' ) {

                $semperfi_customizer_multi_option_retrieved_theme_mod = preg_replace( '/[^a-zA-Z0-9]+/' , ' ' , $semperfi_customizer_multi_option_retrieved_theme_mod );

            }

            $semperfi_css_customizer_selectors = $semperfi_customizer_values[ 'input_attrs' ][ 'css' ];

            $semperfi_customizer_generated_css_modifiers .= str_replace( "$" , $semperfi_customizer_multi_option_retrieved_theme_mod , $semperfi_css_customizer_selectors );

            $semperfi_customizer_generated_css_modifiers = str_replace( "@" , abs( $semperfi_customizer_multi_option_retrieved_theme_mod ) , $semperfi_customizer_generated_css_modifiers );

            $semperfi_customizer_generated_css_modifiers .= "; }\n";

        }

        $semperfi_generate_css_count++;

    }

}

$semperfi_customizer_generated_css_modifiers = substr( $semperfi_customizer_generated_css_modifiers , 0 , -1 );
