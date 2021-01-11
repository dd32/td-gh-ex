<?php

function semper_fi_lite_wp_footer() {
    
    
    function semper_fi_lite_wp_footer_html() {
        
        require get_parent_theme_file_path( '/inc/wp-footer/html.php' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_wp_footer_html', 99 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_wp_footer_html', 99 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_wp_footer_html', 99 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_wp_footer_html', 99 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_wp_footer_html', 99 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_wp_footer_html', 99 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_wp_footer_html', 99 );
    
    
}

add_action( 'semper_fi_lite_functions_hook' , 'semper_fi_lite_wp_footer' );