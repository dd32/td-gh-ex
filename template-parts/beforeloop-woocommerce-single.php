<?php
$absolutte_shop_single_product_layout = get_theme_mod( 'absolutte_shop_single_product_layout', 'product-fullwidth' );
if ( isset( $_GET[ 'single_product_layout' ] ) ) {
    $absolutte_shop_single_product_layout = sanitize_text_field( wp_unslash( $_GET[ 'single_product_layout' ] ) );
}
if ( 'product-fullwidth' == $absolutte_shop_single_product_layout ) {
?>
<div class="absolutte-product-view product">
    <?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
        <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="absolutte-product-view-exit"><i class="absolutte-icon-arrow-left"></i></a>
    <?php endif; ?>

    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>

    <div class="absolutte-product-desc">
        <div class="summary entry-summary">

            <?php do_action( 'woocommerce_single_product_summary' ); ?>
            
        </div>
    </div><!-- /absolutte-product-desc -->

</div><!-- /absolutte-product-view -->
<?php } ?>
	

<main id="main" class="site-main ">

        <div id="container" class="<?php echo esc_attr( absolutte_container_css_class() ); ?>">

            <div class="<?php echo esc_attr( absolutte_main_css_class() ); ?>">

                <div id="content" class="<?php echo esc_attr( absolutte_content_css_class() ); ?>">
