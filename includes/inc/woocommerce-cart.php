<?php
// Ensure cart contents update when products are added to the cart via AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'conica_wc_header_add_to_cart_fragment' );
 
function conica_wc_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    ob_start(); ?>
        <a class="header-cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'conica' ); ?>">
            <span class="header-cart-amount">
                <?php echo sprintf( _n( '(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'conica' ), $woocommerce->cart->cart_contents_count ); ?> <?php echo $woocommerce->cart->get_cart_total(); ?>
            </span>
            <span class="header-cart-checkout <?php echo ( $woocommerce->cart->cart_contents_count > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
                <i class="fa <?php echo ( get_theme_mod( 'conica-cart-icon' ) ) ? sanitize_html_class( get_theme_mod( 'conica-cart-icon' ) ) : sanitize_html_class( 'fa-shopping-cart' ); ?>"></i>
            </span>
        </a>
    <?php
    $fragments['a.header-cart-contents'] = ob_get_clean();
    
    return $fragments;
}
