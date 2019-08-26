<?php
/**
 * The template for displaying the footer.
 * @package Automobile Car Dealer
 */
?>
    <footer>
        <?php //Set widget areas classes based on user choice
            $widget_areas = get_theme_mod('footer_widget_areas', '3');
            if ($widget_areas == '3') {
                $cols = 'col-md-4';
            } elseif ($widget_areas == '4') {
                $cols = 'col-md-3';
            } elseif ($widget_areas == '2') {
                $cols = 'col-md-6';
            } else {
                $cols = 'col-md-12';
            }
        ?>
        <aside id="sidebar-footer" class="footer-wp" role="complementary">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-1'); ?>
                        </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-2'); ?>
                        </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-3'); ?>
                        </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                            <?php dynamic_sidebar( 'footer-4'); ?>
                        </div>
                    <?php endif; ?>
                </div> 
            </div>  
        </aside>
    	<div class="copyright-wrapper">
            <div class="container">
                <p><?php echo esc_html(get_theme_mod('automobile_car_dealer_footer_copy',__('Theme Design & Developed By','automobile-car-dealer'))); ?> <?php automobile_car_dealer_credit(); ?></p>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
        
        <?php wp_footer(); ?>

</body>
</html>