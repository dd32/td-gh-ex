<?php

function semper_fi_lite_google_fonts() {
    
    
    function semper_fi_lite_google_fonts_css() {
        
        // Generate CSS Code for wp_add_inline_stye
        require get_parent_theme_file_path( '/inc/customizer/customizer-options.php' );
        
        $semper_fi_lite_default_fonts = 'Open+Sans|Teko:500';
        
        foreach( $semper_fi_lite_customizer_customizer_options_array as $option => $values ) {
            
            $i = 1;

            while ( $i <=  count( $values['default_options'] ) ) {
                
                if ( $values['type'] == 'font' ) {
                        
                    $input = esc_html( get_theme_mod( $option . '_' . $i ) );
                    
                        if ( $input != 'default'  && 'Open+Sans' && 'Teko' ) {

                            if ( ( $input != $values[ 'default_options' ][ $i ] ) && ( $input != '' ) ) {

                                $semper_fi_lite_default_fonts .= '|' . $input;

                            }
                            
                        }
                    
                }
                
                $i++;
                
            }
            
        }
        
        wp_enqueue_style( 'semper_fi_lite-google-font' , 'https://fonts.googleapis.com/css?family=' . $semper_fi_lite_default_fonts . '&amp;subset=latin-ext' , false , '' , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_google_fonts_css', 9 );
    
}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_google_fonts' );