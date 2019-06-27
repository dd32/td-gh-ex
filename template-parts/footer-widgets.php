<?php
/**
 * Footer widgets.
 *
 * @package Agency_Ecommerce
 */

if (is_active_sidebar('top-footer-1') ||
    is_active_sidebar('top-footer-2') ||
    is_active_sidebar('top-footer-3') ||
    is_active_sidebar('top-footer-4')) :


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
            <div class="ae-inner">
                <?php
                $column_class = 'widget-column top-footer-' . absint($column_count);
                for ($i = 1; $i <= 4; $i++) {
                    if (is_active_sidebar('top-footer-' . $i)) {
                        ?>
                        <div class="<?php echo $column_class; ?>">
                            <?php dynamic_sidebar('top-footer-' . $i); ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div><!-- .ae-inner -->
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
