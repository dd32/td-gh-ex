<?php
/**
 * The template for displaying the footer.
 * @package Automobile Car Dealer
 */
?>
    <div class="footer-wp">
        <div class="container">
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
	<div class="inner">
        <div class="copyright-wrapper">
            <p><?php echo esc_html(get_theme_mod('automobile_car_dealer_footer_copy',__('Automobile Theme Design & Developed By','automobile-car-dealer'))); ?> <?php automobile_car_dealer_credit(); ?></p>
        </div>
        <div class="clear"></div>
    </div>
        
    <?php wp_footer(); ?>

</body>
</html>