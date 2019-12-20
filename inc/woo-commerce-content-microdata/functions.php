<?php

function semperfi_woo_commerce_content_data() {
    
    function semperfi_woo_commerce_content_data_html() {
        
        require get_parent_theme_file_path( '/inc/woo-commerce-content-microdata/html.php' );

    }
    
    //add_action( 'woo_commerce_content_microdata' , 'semperfi_woo_commerce_content_data_html' );
    
    function semperfi_woo_commerce_content_data_css() {
    
        if ( is_product() ) {

            add_action( 'semperfi_woo_commerce_after_header' , 'semperfi_content_data_css' );

        }
        
    }
    
    //add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_woo_commerce_content_data_css' );
    
    
}

add_action( 'functions-hook' , 'semperfi_woo_commerce_content_data' );