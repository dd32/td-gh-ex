<?php 
/**
 * Set import files
 */
function absolutte_import_files() {
    return array(
        array(
            'import_file_name'           => esc_attr__( 'Demo 1 - Default', 'absolutte' ),
            'categories'                 => array(),
            'import_file_url'            => 'http://www.quemalabs.com/files/import-files/absolutte/demo-1/content.xml',
            'import_widget_file_url'     => 'http://www.quemalabs.com/files/import-files/absolutte/demo-1/widgets.wie',
            'import_customizer_file_url' => 'http://www.quemalabs.com/files/import-files/absolutte/demo-1/customizer.dat',
            'import_preview_image_url'   => 'http://www.quemalabs.com/files/import-files/absolutte/demo-1/screenshot.jpg',
            'import_notice'              => esc_html__( 'Click on "Import Demo Data" to start importing. Images were replaced by a placeholder to avoid long waits.', 'absolutte' ),
        ),        
    );
}
add_filter( 'pt-ocdi/import_files', 'absolutte_import_files' );

// Disable Proteus branding
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Assign Menus, Front adn Blog page
 */
function absolutte_after_import_setup( $import_files ) {

    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Nav', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );
    $social_menu = get_term_by( 'name', 'Social', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'footer-menu' => $footer_menu->term_id,
            'social' => $social_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $shop_page_id = get_page_by_title( 'Shop' );
    $blog_page_id  = get_page_by_title( 'Blog' );
    $woocommerce_cart_page_id = get_page_by_title( 'Cart' );
    $woocommerce_checkout_page_id = get_page_by_title( 'Checkout' );
    $woocommerce_myaccount_page_id = get_page_by_title( 'My Account' );

    switch ( $import_files['import_file_name'] ) {

        case 'Demo 1 - Default':
            break;

    }

    update_option( 'show_on_front', 'page' );

    //Front Page and Blog Page
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

    //WooCommerce
    update_option( 'woocommerce_shop_page_id', $shop_page_id->ID );
    update_option( 'woocommerce_cart_page_id', $woocommerce_cart_page_id->ID );
    update_option( 'woocommerce_checkout_page_id', $woocommerce_checkout_page_id->ID );
    update_option( 'woocommerce_myaccount_page_id', $woocommerce_myaccount_page_id->ID );



}
add_action( 'pt-ocdi/after_import', 'absolutte_after_import_setup' );


/**
 * Export Custom Options
 */
function absolutte_export_option_keys( $keys ) {
    $keys[] = 'absolutte_hero_color';
    $keys[] = 'absolutte_logo_color';
    $keys[] = 'absolutte_headings_color';
    $keys[] = 'absolutte_text_color';
    $keys[] = 'absolutte_link_color';
    $keys[] = 'absolutte_footer_background';
    $keys[] = 'absolutte_header_bck_color';
    $keys[] = 'absolutte_header_lines_color';
    $keys[] = 'absolutte_shop_options';
    $keys[] = 'absolutte_shop_categories';
    $keys[] = 'absolutte_shop_categories';
    $keys[] = 'absolutte_shop_products_amount';
    $keys[] = 'absolutte_shop_columns';
    $keys[] = 'absolutte_shop_pre_page';
    $keys[] = 'absolutte_shop_post_page';
    $keys[] = 'absolutte_shop_page_layout';
    $keys[] = 'absolutte_shop_product_layout';
    $keys[] = 'absolutte_shop_second_image';
    $keys[] = 'absolutte_shop_quick_view';
    $keys[] = 'absolutte_shop_login_icon';
    $keys[] = 'absolutte_shop_quick_view_bck';
    $keys[] = 'absolutte_shop_infinitescroll_enable';
    $keys[] = 'absolutte_blog_layout';
    $keys[] = 'absolutte_site_layout';
    $keys[] = 'absolutte_site_animations';
    $keys[] = 'absolutte_site_not_kirki';
    $keys[] = 'absolutte_typography_font_family';
    $keys[] = 'absolutte_typography_font_family_headings';
    $keys[] = 'absolutte_typography_subsets';
    $keys[] = 'absolutte_typography_font_size';
    $keys[] = 'absolutte_topbar_enable';
    $keys[] = 'absolutte_topbar_text';
    $keys[] = 'absolutte_topbar_color';
    $keys[] = 'absolutte_topbar_menu';
    $keys[] = 'absolutte_header_layout';
    $keys[] = 'woocommerce_shop_page_id';
    $keys[] = 'woocommerce_cart_page_id';
    $keys[] = 'woocommerce_checkout_page_id';
    $keys[] = 'woocommerce_myaccount_page_id';

    return $keys;
}

add_filter( 'cei_export_option_keys', 'absolutte_export_option_keys' );
