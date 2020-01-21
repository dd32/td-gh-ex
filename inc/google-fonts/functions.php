<?php

function semperfi_google_fonts() {
    
    
    function semperfi_google_fonts_css() {
        
        // Generate CSS Code for wp_add_inline_stye
        require get_parent_theme_file_path( '/inc/customizer/customizer-options.php' );
        
        $semperfi_default_fonts = 'Open+Sans|Teko:500';
        
        foreach( $semperfi_customizer_customizer_options_array as $option => $values ) {
            
            $i = 1;

            while ( $i <=  count( $values['default_options'] ) ) {
                
                if ( $values['type'] == 'font' ) {
                        
                    $input = esc_html( get_theme_mod( $option . '_' . $i ) );
                    
                        if ( $input != 'default'  && 'Open+Sans' && 'Teko' ) {

                            if ( ( $input != $values[ 'default_options' ][ $i ] ) && ( $input != '' ) ) {

                                $semperfi_default_fonts .= '|' . $input;

                            }
                            
                        }
                    
                }
                
                $i++;
                
            }
            
        }
        
        wp_enqueue_style( 'semperfi-google-font' , 'https://fonts.googleapis.com/css?family=' . $semperfi_default_fonts . '&amp;subset=latin-ext' , false , '' , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_google_fonts_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_google_fonts_css', 9 );
    
}

add_action( 'semperfi-functions-hook', 'semperfi_google_fonts' );