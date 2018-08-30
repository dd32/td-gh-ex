<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package advance-ecommerce-store
 */
?>
    <div id="footer" class="copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-1');?>
                    </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p><?php echo esc_html(get_theme_mod('advance_ecommerce_store_footer_copy', __('Ecommerce WordPress Theme By', 'advance-ecommerce-store')));?> <?php advance_ecommerce_store_credit();?></p>
    </div>
    <?php wp_footer();?>
    </body>
</html>