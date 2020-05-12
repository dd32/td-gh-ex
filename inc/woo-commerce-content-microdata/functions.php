<?php

function semper_fi_lite_woo_commerce_content_data() {
    
    function semper_fi_lite_woo_commerce_content_data_html() {
        
        require get_parent_theme_file_path( '/inc/woo-commerce-content-microdata/html.php' );

    }
    
    function semper_fi_lite_woo_commerce_content_data_css() {
    
        if ( is_product() ) {

            add_action( 'semper_fi_lite_woo_commerce_after_header' , 'semper_fi_lite_content_data_css' );

        }
        
    }
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_woo_commerce_content_data' );