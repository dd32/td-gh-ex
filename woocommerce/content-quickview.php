<div class="col-lg-5 col-12">
    <div class="qwick-view-left">
        <?php
            /**
             * woocommerce_before_single_product_summary hook.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
        ?>
    </div>
</div>
<div class="col-lg-7 col-12">
    <div class="qwick-view-right">
        <div class="qwick-view-content">
            <h3><?php echo esc_html( $product->get_title() ); ?></h3>
            <?php woocommerce_template_loop_price(); ?>

            <?php woocommerce_template_loop_rating(); ?>
                        
            <p><?php echo esc_html( $product->get_short_description() ); ?></p>

            <?php woocommerce_template_single_add_to_cart(); ?>
        </div>
    </div>
</div>