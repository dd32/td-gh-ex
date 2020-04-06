<?php

function semper_fi_lite_woo_commerce_display_products_shopping_cart() {
    
    /*
    // Display store after shopping cart page, remove categories and tags
    function semper_fi_lite_woo_commerce_display_products_shopping_cart_html() {

        if ( is_cart() ) {
        
            //require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

            //add_action( 'semper_fi_lite_page_after_content' , 'semper_fi_lite_woo_commerce_display_products_shopping_cart_html' );
            //add_action( 'semper_fi_lite_page_after_footer', 'semper_fi_lite_woo_commerce_display_products_css' );

        }

    }

    //add_action( 'semper_fi_lite_page_after_header', 'semper_fi_lite_woo_commerce_display_products_shopping_cart' );*/


    // Display store on the page store instead of standard page
    function semper_fi_lite_woo_commerce_display_products() {

        if ( is_shop() ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

        }

    }

    add_action( 'semper_fi_lite_woo_commerce_after_header' , 'semper_fi_lite_woo_commerce_display_products' );


    // When viewing a single product the store will display below the product
    function semper_fi_lite_woo_commerce_display_products_on_single_product() {

        if ( is_product() ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

        }

    }
        
    add_action( 'semper_fi_lite_woo_commerce_after_content' , 'semper_fi_lite_woo_commerce_display_products_on_single_product' );


    // Adds the store to the front page when enabled
    function semper_fi_lite_woo_commerce_display_products_front_page_html() {

        if ( !is_paged() && absint ( get_theme_mod( 'woocommerce_store_front_enable_1' , false ) ) ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

        }

    }

    add_action( 'semper_fi_lite_front_page_after_content', 'semper_fi_lite_woo_commerce_display_products_front_page_html' , 5 );

    
    // Adds the store after blog when is not home
    function semper_fi_lite_woo_commerce_display_products_front_page_before_footer() {

        if ( is_paged() && absint ( get_theme_mod( 'woocommerce_store_front_enable_1' , false ) ) ) {

            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );
            add_action( 'semper_fi_lite_page_after_footer', 'semper_fi_lite_woo_commerce_display_products_css' );

        }

    }

    //add_action( 'semper_fi_lite_front_page_before_footer', 'semper_fi_lite_woo_commerce_display_products_front_page_before_footer' );
    
    
    function semper_fi_lite_store_front_css() {
        
        wp_enqueue_style( 'semper_fi_lite-store-front' , get_theme_file_uri( '/inc/store-front/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

    }
    
    add_action( 'semper_fi_lite_404_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_attachment_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_front_page_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_index_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_page_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_search_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_single_the_header' , 'semper_fi_lite_store_front_css', 9 );
    add_action( 'semper_fi_lite_woo_commerce_the_header' , 'semper_fi_lite_store_front_css', 9 );

}

add_action( 'semper_fi_lite-functions-hook', 'semper_fi_lite_woo_commerce_display_products_shopping_cart' );