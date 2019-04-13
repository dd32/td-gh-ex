<?php
/**
 * Footer widgets.
 *
 * @package Agency_Ecommerce
 */

if (is_active_sidebar('footer-1') ||
    is_active_sidebar('footer-2') ||
    is_active_sidebar('footer-3') ||
    is_active_sidebar('footer-4')) :


    /**
     * Hook - agency_ecommerce_before_footer_widget_area.
     *
     * @hooked agency_ecommerce_before_footer_widget_area_action - 10
     */
    do_action('agency_ecommerce_before_footer_widget_area');
    ?>

    <aside id="footer-widgets" class="widget-area" role="complementary">
        <div class="container">
            <?php
            $column_count = 0;
            for ($i = 1; $i <= 4; $i++) {
                if (is_active_sidebar('footer-' . $i)) {
                    $column_count++;
                }
            }
            ?>
            <div class="inner-wrapper">
                <?php
                $column_class = 'widget-column footer-active-' . absint($column_count);
                for ($i = 1; $i <= 4; $i++) {
                    if (is_active_sidebar('footer-' . $i)) {
                        ?>
                        <div class="<?php echo $column_class; ?>">
                            <?php dynamic_sidebar('footer-' . $i); ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div><!-- .inner-wrapper -->
        </div><!-- .container -->
    </aside><!-- #footer-widgets -->

    <?php

    /**
     * Hook - agency_ecommerce_after_footer_widget_area.
     *
     * @hooked agency_ecommerce_after_footer_widget_area_action - 10
     */
    do_action('agency_ecommerce_after_footer_widget_area');

endif;
