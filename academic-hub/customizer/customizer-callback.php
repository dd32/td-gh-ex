<?php
/** Products Tab Title */
if( ! function_exists( 'academic_hub_products_tabs_title' ) ) {
    /**
     * Display product tab
    */
    function academic_hub_products_tabs_title(){
        return get_theme_mod( 'products_tabs_title', esc_html__( 'POPULOR PRODUCTS', 'academic-hub' ) );
    }
}

/** Slider All Category Section */
if( ! function_exists( 'academic_hub_slider_category_list_header_text' ) ) {
    /**
     * Display product tab
    */
    function academic_hub_slider_category_list_header_text(){
        return get_theme_mod( 'academic_hub_slider_category_list_header_text', esc_html__( 'ALL CATEGORYES', 'academic-hub' ) );
    }
}


/** Slider All Category Section */
if( ! function_exists( 'slider_button_text_change_callback' ) ) {
    /**
     * Display product tab
    */
    function slider_button_text_change_callback(){
        return get_theme_mod( 'slider_button_text_change', esc_html__( 'Buy Now', 'academic-hub' ) );
    }
}


/** Top Header Address */
if( ! function_exists( 'academic_hub_top_header_address_callback' ) ) {
    /**
     * Display Top Address
    */
    function academic_hub_top_header_address_callback(){
        return get_theme_mod( 'academic_hub_top_header_address' );
    }
}



/** Top Header Phone */
if( ! function_exists( 'academic_hub_top_header_phone_callback' ) ) {
    /**
     * Display Top Phone
    */
    function academic_hub_top_header_phone_callback(){
        return get_theme_mod( 'academic_hub_top_header_phone' );
    }
}


/** Top Header email */
if( ! function_exists( 'academic_hub_top_header_email_callback' ) ) {
    /**
     * Display Top email
    */
    function academic_hub_top_header_email_callback(){
        return get_theme_mod( 'academic_hub_top_header_email' );
    }
}

