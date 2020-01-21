<?php

function semperfi_open_graph_protocol() {

    function semperfi_open_graph_protocol_html() {

        if ( absint ( get_theme_mod( 'open_graph_protocol_1' ) ) ) {

            require get_parent_theme_file_path( '/inc/open-graph-protocol/html.php' );

        }

    }

    add_action( 'wp_head' , 'semperfi_open_graph_protocol_html', 1 );
    
    
    function semperfi_open_graph_protocol_customizer_setup( $semperfi_customizer_customizer_options_array ) {
        
        require get_parent_theme_file_path( '/inc/open-graph-protocol/customizer.php' );
        
        $semperfi_customizer_customizer_options_array = array_merge_recursive( $semperfi_customizer_customizer_options_array , $semperfi_open_graph_protocol_customizer_options_array );
        
        return $semperfi_customizer_customizer_options_array;
    
    }
    
    add_filter( 'semperfi_add_to_customizer_options_array' , 'semperfi_open_graph_protocol_customizer_setup' );

}

add_action( 'semperfi-functions-hook' , 'semperfi_open_graph_protocol' );