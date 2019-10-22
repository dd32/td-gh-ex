<?php

function semperfi_woo_commerce_after_shop_loop() {
    
    function semperfi_woo_commerce_after_shop_loop_html() {
        
        require get_parent_theme_file_path( '/inc/woo-commerce-after-shop-loop/html.php' );

    }
    
    add_action( 'woocommerce_after_shop_loop' , 'semperfi_woo_commerce_after_shop_loop_html' );
    
    
    function semperfi_woo_commerce_after_shop_loop_css() {
        
        wp_enqueue_style( 'semperfi-woo-commerce-after-shop-loop' , get_theme_file_uri( '/inc/woo-commerce-after-shop-loop/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semperfi_404_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_attachment_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_front_page_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_index_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_page_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_search_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_single_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_woo_commerce_after_shop_loop_css', 9 );
    
}

add_action( 'functions-hook' , 'semperfi_woo_commerce_after_shop_loop' );