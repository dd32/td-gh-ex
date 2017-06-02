<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ecommerce Store
 */
?>
            <div class="copyright-wrapper">
            	<div class="inner">
                    <div class="copyright">
                        <p><?php echo esc_html( get_theme_mod('bb_ecommerce_store_footer_copy','') ); ?></p>
                        <?php echo esc_html(bb_ecommerce_store_credit()); ?>
                    </div><!-- copyright -->
                    <div class="clear"></div>
                </div><!-- inner -->
            </div>
        </div>
    <?php wp_footer(); ?>

    </body>
</html>