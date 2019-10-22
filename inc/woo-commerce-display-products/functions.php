<?php

function semperfi_woo_commerce_display_products_shopping_cart() {
    
    function semperfi_woo_commerce_display_products_shopping_cart_html() {
        
        require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );

    }
    
    if ( is_cart() ) {

        add_action( 'semperfi_page_after_content' , 'semperfi_woo_commerce_display_products_shopping_cart_html' );
        add_action( 'semperfi_page_after_footer', 'semperfi_woo_commerce_display_products_css' );
        remove_action( 'categories-and-tags-single' , 'semperfi_categories_and_tages_single' );
        remove_action( 'semperfi_page_after_footer' , 'semperfi_categories_and_tags_css' );
        
    }
    
}

add_action( 'semperfi_page_after_header', 'semperfi_woo_commerce_display_products_shopping_cart' );




function semperfi_woo_commerce_display_products() {
    
    if ( is_shop() ) {

        require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );
        
    }

}
        
add_action( 'semperfi_woo_commerce_after_header' , 'semperfi_woo_commerce_display_products' );


function semperfi_woo_commerce_display_products_on_single_product() {
    
    if ( is_product() ) {

        require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );
        
    }

}
        
add_action( 'semperfi_woo_commerce_after_content' , 'semperfi_woo_commerce_display_products_on_single_product' );

    
function semperfi_woo_commerce_display_products_css() {

    wp_enqueue_style( 'semperfi-woo-commerce-display-products' , get_theme_file_uri( '/inc/store-front/style.css' ) , false , wp_get_theme()->get( 'Version' ) , 'all' );

}

add_action( 'semperfi_woo_commerce_the_header' , 'semperfi_woo_commerce_display_products_css', 9 );

add_action( 'semperfi_woo_commerce_the_content' , 'semperfi_woo_commerce_html' );


function semperfi_woo_commerce_display_products_front_page() {
    
    function semperfi_woo_commerce_display_products_front_page_html() {
    
        if ( !is_paged() ) {
        
            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );
            
        }

    }
    
    remove_action( 'semperfi_front_page_after_content', 'semperfi_store_front_html_front_page_after_content' , 5 );
    add_action( 'semperfi_front_page_after_content', 'semperfi_woo_commerce_display_products_front_page_html' , 5 );
    
    function semperfi_woo_commerce_display_products_front_page_before_footer() {
    
        if ( is_paged() ) {
        
            require get_parent_theme_file_path( '/inc/woo-commerce-display-products/html.php' );
            
        }

    }
    
    remove_action( 'semperfi_front_page_before_footer', 'semperfi_store_front_html_front_page_before_footer' , 15 );
    //add_action( 'semperfi_front_page_before_footer', 'semperfi_woo_commerce_display_products_front_page_before_footer' , 15 );
    
    //add_action( 'semperfi_page_after_footer', 'semperfi_woo_commerce_display_products_css' );
    
}

add_action( 'functions-hook', 'semperfi_woo_commerce_display_products_front_page' );