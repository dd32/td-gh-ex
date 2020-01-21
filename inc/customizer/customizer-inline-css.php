<?php
/**
 * Semper Fi Lite: Customizer-CSS-Sanitizers
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 93
 */

// Generate the CSS to be inlined
$css_modified = '';        
        
foreach( $semperfi_customizer_inline_this_css as $option => $values ) {

    $i = 1;

    while ( $i <=  count( $values['default_options'] ) ) {

        $input = esc_html( get_theme_mod( $option . '_' . $i ) );

        if ( ( $input != $values['default_options'][$i] ) && ( $input != '' ) ) {

            if ( $values['type'] == 'font' ) {

                $input = preg_replace( '/[^a-zA-Z0-9]+/' , ' ' , $input );

            }

            $stylesheet_handle = $values[ 'input_attrs' ][ 'stylesheet_handle' ];

            $css = $values[ 'input_attrs' ]['css'];

            $css_modified .= str_replace( "$" , $input , $css );

            $css_modified = str_replace( "@" , abs( $input ) , $css_modified );

            $css_modified .= "; }\n";

        }

        $i++;

    }

}

$css_modified = substr($css_modified, 0, -1);

wp_add_inline_style( 'semperfi-above-the-fold', $css_modified );
