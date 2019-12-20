<?php

function semperfi_open_graph_protocol_html() {
    
    if ( get_theme_mod( 'open_graph_protocol_1' ) ) {

        require get_parent_theme_file_path( '/inc/open-graph-protocol/html.php' );
        
    }

}

add_action( 'wp_head' , 'semperfi_open_graph_protocol_html', 1 );


function semperfi_open_graph_protocol_customizer_setup() {

    require get_parent_theme_file_path( '/inc/open-graph-protocol/customizer.php' );

}

add_action( 'semperfi_do_action_assemble_customizer_array', 'semperfi_open_graph_protocol_customizer_setup' );

