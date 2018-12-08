<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_template_part( 'framework/admin/animate' );
get_template_part( 'framework/admin/kirki/kirki' );
get_template_part( 'framework/admin/customizer' );
get_template_part( 'framework/admin/about' );

/**
 * Agama Upgrade Discount
 *
 * @since 1.3.9
 */
function agama_upgrade_discount_notice() {
    echo '<div class="notice notice-info is-dismissible">';
        echo '<p>Upgrade to <strong>Agama PRO</strong> today and get <strong>20%</strong> discount on your purchase with next promo code: <strong>agama20</strong> <a href="https://theme-vision.com/product/agama-pro-theme/" target="_blank">UPGRADE NOW</a> (limited offer)</p>';
    echo '</div>';
}
add_action( 'admin_notices', 'agama_upgrade_discount_notice' );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
