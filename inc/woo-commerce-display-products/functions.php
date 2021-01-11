<?php

function semper_fi_lite_woo_commerce_display_products_shopping_cart_functions() {


    // Display store on the page store instead of standard page
    function semper_fi_lite_woo_commerce_display_products() {

        if ( is_shop() ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

        }

    }

    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_woo_commerce_display_products' , 25 );


    // When viewing a single product the store will display below the product
    function semper_fi_lite_woo_commerce_display_products_on_single_product() {

        if ( is_product() ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

        }

    }
        
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_woo_commerce_display_products_on_single_product' , 75 );


    // Adds the store to the front page when enabled
    function semper_fi_lite_woo_commerce_display_products_front_page_html() {

        if ( !is_paged() && absint ( get_theme_mod( 'woocommerce_store_front_enable_1' , false ) ) ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

        }

    }

    add_action( 'semper_fi_lite_front_page', 'semper_fi_lite_woo_commerce_display_products_front_page_html' , 15 );
    
    
    function semper_fi_lite_woocommerce_store_front_css() {
        
        wp_enqueue_style( 'semper-fi-lite-store-front' , get_theme_file_uri( '/inc/store-front/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_attachment' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_front_page' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_index' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_page' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_search' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_single' , 'semper_fi_lite_woocommerce_store_front_css', 1 );
    add_action( 'semper_fi_lite_woo_commerce' , 'semper_fi_lite_woocommerce_store_front_css', 1 );

}

add_action( 'semper_fi_lite_functions_hook', 'semper_fi_lite_woo_commerce_display_products_shopping_cart_functions' );